<?php
	
	session_start();
	
	require 'config/db.php';
	require_once 'emailController.php';
	$errors = array();
	$username = "";
	$email = "";
	
	error_reporting(E_ERROR | E_PARSE);
	
	//************************* LOGIN *************************
	if (isset($_POST['login'])) {
		$username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
		$password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
		
		
		// VALIDATION
		if (empty($username) && empty($password)) {
			$errors['login'] = "Unknown user or password";
		}
		if (empty($username) || empty($password)) {
			$errors['login'] = "Unknown user or password";
		}
		//IF NO ERRORS
		if (count($errors) == 0) {
			$sql = "SELECT * FROM users WHERE email=? OR username=? Limit 1";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param('ss', $username, $username);
			$stmt->execute();
			$result = $stmt->get_result();
			$user = $result->fetch_assoc();
			
			if (password_verify($password, $user['password'])) {
				$_SESSION['id'] = $user['id'];
				$_SESSION['username'] = $user['username'];
				$_SESSION['email'] = $user['email'];
				// SET FLASH MESSAGE
				$_SESSION['message'] = "You are now logged in!";
				$_SESSION['alert-class'] = "alert-sucess";
				header('location: admin-dashboard.php');
				exit();
			}
			else if ($password == $user['password']) {
				$_SESSION['id'] = $user['id'];
				$_SESSION['username'] = $user['username'];
				$_SESSION['email'] = $user['email'];
				// SET FLASH MESSAGE
				$_SESSION['message'] = "You are now logged in!";
				$_SESSION['alert-class'] = "alert-sucess";
				header('location: admin-dashboard.php');
				exit();
			}
			else {
				$errors['login'] = "Unknown user or password";
			}
		}
	}
	
	/**************************** ENROLL BUTTON ***************************/
	if (isset($_POST['enroll-success'])) {
		
		$id =  htmlspecialchars($_POST['id']);
		$idnum =  htmlspecialchars($_POST['idnum']);
		$entlev = $_POST['entlev'];
		$fname = htmlspecialchars($_POST['fname']);
		$mname = htmlspecialchars($_POST['mname']);
		$lname = htmlspecialchars($_POST['lname']);
		$gender = $_POST['gender'];
		$cnum = htmlspecialchars($_POST['cnum']);
		$email = htmlspecialchars($_POST['email']);
		$prevschool = htmlspecialchars($_POST['prevschool']);
		$hea = $_POST['hea'];

		// FOR UPLOADING IMAGE
		$img = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		if (!empty($_FILES['image']['name'])) {
			if (!in_array($img, ["jpg", "png", "jpeg"])){
				$errors['file'] = "File type is Invalid";
			}
		} else { $errors['1'] = "All field is required"; }
		
		$image = time() . '_' . $_FILES['image']['name'];
		
		// FOR UPLOADING PDF FILES
		$upload_file = pathinfo($_FILES['g_moral']['name'], PATHINFO_EXTENSION);
		$upload_file1 = pathinfo($_FILES['NSO']['name'], PATHINFO_EXTENSION);
		
		if (!empty($_FILES['g_moral']['name'])) {
			if (!in_array($upload_file, ["pdf"])){
				$errors['file'] = "File type is Invalid";
			}
		} else { $errors['1'] = "All field is required"; }
		
		if (!empty($_FILES['NSO']['name'])) {
			if (!in_array($upload_file1, ["pdf"])){
				$errors['file1'] = "File type is Invalid";
			}
		} else { $errors['1'] = "All field is required"; }
		
		$g_moral = time() . '_' . $_FILES['g_moral']['name'];
		$NSO = time() . '_' . $_FILES['NSO']['name'];
		
		// IMAGE FILE DIR IN LOCAL
		$target = "data/images/".basename($image);
		
		// VALIDATION IF EMPTY
		if (empty($entlev)) {
			$errors['1'] = "All field is required";
			
		}
		if (empty($fname)) {
			$errors['1'] = "All field is required";
			
		}
		if (empty($mname)) {
			$errors['1'] = "All field is required";
			
		}
		if (empty($lname)) {
			$errors['1'] = "All field is required";
			
		}
		if (empty($gender)) {
			$errors['1'] = "All field is required";
			
		}
		if (empty($cnum)) {
			$errors['1'] = "All field is required";
		}
		if (empty($email)) {
			$errors['1'] = "All field is required";
			
		} else {
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = "Email address is invalid";
			}
		}
		if (empty($prevschool)) {
			$errors['1'] = "All field is required";
		}
		if (empty($hea)) {
			$errors['1'] = "All field is required";
		}
		
		
		//CHECK EMAIL IF EXISTING IN DATABASE
		$emailQuery = "SELECT * From students WHERE email=? Limit 1";
		$stmt = $connection->prepare($emailQuery);
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$result=$stmt->get_result();
		$userCount = $result->num_rows;
		$stmt->close();
		
		if ($userCount > 0) {
			$errors['email'] = "Email Error!";
		}
		//********************* IF NO ERRORS ***************************
		if (count($errors) == 0) {
			date_default_timezone_set('Asia/Manila');
			$reg_date = date("F j\, Y \| g:i A", time());
			
			$sql = "INSERT INTO students (idnum, fname, mname, lname, entlev,
				gender, cnum, email, prevschool, hea, img, g_moral, NSO, reg_date)
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param('ssssssssssssss', $idnum, $fname, $mname, $lname, 
				$entlev, $gender, $cnum, $email, $prevschool, $hea, $image, 
				$g_moral, $NSO, $reg_date);
			
			move_uploaded_file($_FILES['image']['tmp_name'], $target);
			move_uploaded_file($_FILES['g_moral']['tmp_name'], "data/files/GMORAL/".$g_moral);
			move_uploaded_file($_FILES['NSO']['tmp_name'], "data/files/NSO/".$NSO);
			
			if ($stmt->execute()) {
				// LOGIN USER
				$user_id = $connection->insert_id;
				$_SESSION['id'] = $user_id;
				
				// SEND VERIFICATION IN EMAIL
				//sendVerificationEmail($email, $token, $OTP);

				// SET FLASH MESSAGE
				$_SESSION['message'] = "New student successfully added!";
				$_SESSION['alert-class'] = "alert-sucess";
				header("location: student-module.php");
				exit();
			}
			else  {
				$errors['db_error'] = "Database error: failed to register";
			}
		}
		else {
			if ($counter == 9) {
				$errors['1'] = "All field is required";
			}
		}
		mysqli_close($connection);
	}
	
	
	
	
	
	
	//************************* LOGOUT ****************************
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['id']);
		unset($_SESSION['username']);
		unset($_SESSION['email']);
		unset($_SESSION['verified']);
		header('location: index.php');
	}
	
	
	
	//************************* ENROLLMENT BUTTON ****************************
	if (isset($_POST['add'])) {
		header('location: enroll-student-submodule.php');
	}
	if (isset($_POST['enroll-backbtn'])) {
		header('location: student-module.php');
	}
	
	
	//************************* ENROLLMENT COURSE ****************************
	if (isset($_POST['addrecord'])) {
		
		$id = htmlspecialchars($_POST['id']);
		$idnum = htmlspecialchars($_POST['idnumber']);
		$name = htmlspecialchars($_POST['wholename']);
		$entlev = htmlspecialchars($_POST['entlev']);
		$term = htmlspecialchars($_POST['term']);
		$program = htmlspecialchars($_POST['program']);
		$class = htmlspecialchars($_POST['class']);
		date_default_timezone_set('Asia/Manila');
		$enroll_date = date("F j\, Y");

		// VALIDATION SCHOOL YEAR
		$sql = mysqli_query ($connection, "SELECT * FROM academic_year ORDER BY id DESC LIMIT 1");
			while ($r = mysqli_fetch_array($sql)) {
				$sdate = $r['start_date'];
				$edate = $r['end_date'];
			}
			$academic_year = $sdate ." to ". $edate;

		//CHECK ACADEMIC YEAR IF EXISTING IN DATABASE
		$res = mysqli_query ($connection, "SELECT * FROM students WHERE id='$id'");
			while ($row = mysqli_fetch_array($res)){
				$ay = $row['academic_year'];
			}
			if ($ay == $academic_year) {
				$errors['AY'] = "Academic year is not yet ended";
			}

		// VALIDATION IF EMPTY
		if (empty($entlev)) {
			$errors['1'] = "All field is required";
		}
		if (empty($term)) {
			$errors['1'] = "All field is required";
		}
		if (empty($program)) {
			$errors['1'] = "All field is required";
		}
		if (empty($class)) {
			$errors['1'] = "All field is required";
		}
		
		if (count($errors) == 0) {
			$sql = "INSERT INTO studentRecords (idnum, name, entlev, term, program,
				class, enroll_date) VALUES ('$idnum', '$name', '$entlev', '$term', 
				'$program', '$class', '$enroll_date');";
			
			$newsql = "UPDATE students SET entlev='$entlev', term='$term', program='$program', 
			class='$class', academic_year='$academic_year' WHERE idnum='$idnum' ";
			mysqli_query($connection, $newsql);
			
			$result = mysqli_query($connection, $sql);
			if ($result == TRUE) 
				{
					header("location: student-records.php?id=$id");
					$_SESSION['message'] = "Successfully Saved!";
					$_SESSION['id'] = $id;
				}
		}
		else {
			header("location: student-records.php?id=$id");
		}
		mysqli_close($connection);
	}
	
	//************************* ADD NEW COURSE ****************************
	if (isset($_POST['add-course'])) {
		$course_name = htmlspecialchars($_POST['course_name']);
		$course_code = htmlspecialchars($_POST['course_code']);
		$units = htmlspecialchars($_POST['units']);
		$entlev = htmlspecialchars($_POST['entlev']);
		$program = htmlspecialchars($_POST['program']);
		date_default_timezone_set('Asia/Manila');
		$reg_date = date("F j\, Y \| g:i A", time());
		
		$sql = "INSERT INTO courses (course_name, course_code, units, entlev, program, reg_date)
			VALUES (?, ?, ?, ?, ?, ?)";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param('ssisss', $course_name, $course_code, $units, $entlev, 
				$program, $reg_date);
				
		if ($stmt->execute()) {
			header("location: courses-module.php");
			exit();
		}
		else  {
			$errors['db_error'] = "Database error: failed to register";
		}
	}

	//************************* ADD NEW CLASS ****************************
	if (isset($_POST['add-class'])) {
		$program_name = htmlspecialchars($_POST['program_name']);
		$program_code = htmlspecialchars($_POST['program_code']);
		$pdescription = htmlspecialchars($_POST['pdescription']);
		date_default_timezone_set('Asia/Manila');
		$reg_date = date("F j\, Y \| g:i A", time());
		
		$sql = "INSERT INTO classes (program_name, program_code, pdescription, date_created)
			VALUES (?, ?, ?, ?)";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param('ssss', $program_name, $program_code, $pdescription, $reg_date);
				
		if ($stmt->execute()) {
			header("location: classes-module.php");
			exit();
		}
		else  {
			$errors['db_error'] = "Database error: failed to register";
		}
	}
	//************************* ADD NEW SECTION ****************************
	if (isset($_POST['add-section'])) {
		$id = $_POST['id'];
		$program = htmlspecialchars($_POST['program']);
		$class_name = htmlspecialchars($_POST['class_name']);
		
		if (empty($class_name)) {
			$errors['class_name'] = "Input Class Name";
		}
		//CHECK SECTION IF EXISTING IN DATABASE
		$emailQuery = "SELECT * From sections WHERE class_name=? AND program=? Limit 1";
		$stmt = $connection->prepare($emailQuery);
		$stmt->bind_param('ss', $class_name, $program);
		$stmt->execute();
		$result=$stmt->get_result();
		$userCount = $result->num_rows;
		$stmt->close();
		
		if ($userCount > 0) {
			$errors['class_name'] = "Class Name Already Exist!";
		}

		//IF NO ERRORS
		if (count($errors) == 0) {
		$sql = "INSERT INTO sections (program, class_name)
				VALUES (?, ?)";
				$stmt = $connection->prepare($sql);
				$stmt->bind_param('ss', $program, $class_name);

			if ($stmt->execute()) {
				header("location: view-program.php?id=$id");
				exit();
			}
		}
		header("location: view-program.php?id=$id");
	}

	//************************* CONFRIM ADMIN ACCESS TO ADD NEW ADMIN ****************************
	if (isset($_POST['sudoPassword'])) {
		
		header('location: users-add-admin-submodule.php');
	}

	//************************* ADD NEW ADMIN ****************************
	if (isset($_POST['addNewAdmin'])) {
		$fname = htmlspecialchars($_POST['fname']); //XXS-Protection
		$mname = htmlspecialchars($_POST['mname']);
		$lname = htmlspecialchars($_POST['lname']);

		$admin_name = $lname . ", " . $fname . ", " . $mname;
		
		$email = htmlspecialchars($_POST['email']);

		if (empty($fname)) {
			$errors['fname'] = "1";
		}
		if (empty($mname)) {
			$errors['manme'] = "2";
		}
		if (empty($lname)) {
			$errors['lname'] = "3";
		}
		if (empty($email)) {
			$errors['email'] = "4";
		}
		
		$words = explode(" ", $fname);
		$acronym = "";
		foreach ($words as $w) {
			$acronym .= $w[0];
		}
		$initials = strtolower($acronym);
		$middle = strtolower($mname[0]);
		$username = $lname ."". $initials ."". $middle . "@admin-aja.edu.com";
		$id_user = date("Y")."-";

		date_default_timezone_set('Asia/Manila');
		$reg_date = date("F j\, Y");

		if (count($errors) == 0) {
			$verified = False;
			$acctype = 'admin';
			$OTP = rand(999999, 111111);
			$token = bin2hex(random_bytes(50));

			$sql = "INSERT INTO users (id_user, admin_name, username, email,
			acctype, verified, OTP, reg_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param('sssssbis', $id_user, $admin_name, $username,
			$email, $acctype, $verified, $OTP, $reg_date);
			
			if ($stmt->execute()) {
				// SEND VERIFICATION IN EMAIL
				sendVerificationEmail($email, $token, $OTP);
				SendCode($email, $OTP);

				header('location: users-add-admin-submodule.php');
			}
		}
	}
	
	//************************* ADD NEW FACULTY ****************************
	if (isset($_POST['add-faculty'])) {
		
		$fname = htmlspecialchars($_POST['fname']);
		$mname = htmlspecialchars($_POST['mname']);
		$lname = htmlspecialchars($_POST['lname']);
		$fullname = $fname . "" . $mname[0] . ". " . $lname;

		$gender = htmlspecialchars($_POST['gender']);
		$special = htmlspecialchars($_POST['special']);
		$status = htmlspecialchars($_POST['status']);
		$email = htmlspecialchars($_POST['email']);
		$pass = htmlspecialchars($_POST['pass']);
		$passConf = htmlspecialchars($_POST['passConf']);

		// VALIDATION IF EMPTY
		if (empty($fullname)) {
			$errors['fullname'] = "";
		}
		if (empty($gender)) {
			$errors['gender'] = "";
		}
		if (empty($special)) {
			$errors['special'] = "";
		}
		if (empty($status)) {
			$errors['status'] = "";
		}
		if (empty($email)) {
			$errors['email'] = "";
		}
		if (empty($pass)) {
			$errors['pass'] = "";
		}
		if (empty($passConf)) {
			$errors['passConf'] = "";
		}
		if ($pass != $passConf) {
			$errors['password'] = "Password do not match";
		}
		//CHECK EMAIL IF EXISTING IN DATABASE
		$emailQuery = "SELECT * From faculty WHERE email=? Limit 1";
		$stmt = $connection->prepare($emailQuery);
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$result=$stmt->get_result();
		$userCount = $result->num_rows;
		$stmt->close();
		
		if ($userCount > 0) {
			$errors['email'] = "";
		}
		
		if (count($errors) == 0) {
			$pass = password_hash($pass, PASSWORD_DEFAULT);
			$acctype = 'faculty';
			date_default_timezone_set('Asia/Manila');
			$reg_date = date("F j\, Y");

			$words = explode(" ", $fname);
			$acronym = "";
			foreach ($words as $w) {
				$acronym .= $w[0];
			}
			$initials = strtolower($acronym);
			$middle = strtolower($mname[0]);
			$username = $lname ."". $initials ."". $middle . "@faculty-aja.edu.com";
			$faculty_id = $id_user = date("Y")."-";

			$sql = "INSERT INTO faculty (fullname, gender, special, status,
			email, pass, username, faculty_id, reg_date)
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param('sssssssss', $fullname, $gender, $special, $status,
			$email, $pass, $username, $faculty_id, $reg_date);

			if ($stmt->execute()) {
				header('location: faculty-module.php');
			}
			else  {
				$errors['db_error'] = "Database error: failed to register";
			}
		}
	}
	
	//************************* ADD ANNOUNCEMENT FACULTY ****************************
	if (isset($_POST['announcce-btn'])) {
		$announcement = htmlspecialchars($_POST['announcement']);
		$admin_name = $_SESSION['username'];
		date_default_timezone_set('Asia/Manila');
		$post_date = date("F j\, Y");

		$sql = "INSERT INTO announcements (announcement, admin_name, post_date)
			VALUES (?, ?, ?)";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param('sss', $announcement, $admin_name, $post_date);

		if ($stmt->execute()) {
			header('location: admin-dashboard.php');
		}
	}

	//************************* ADD ANNOUNCEMENT FACULTY ****************************
	if (isset($_POST['add-ay'])) {
		$start_date = $_POST['school_year'];
		$end_date = $_POST['schoolyear'];

		$sql = "INSERT INTO academic_year (start_date, end_date)
			VALUES (?, ?)";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param('ss', $start_date, $end_date);

			if ($stmt->execute()) {
				header('location: admin-dashboard.php');
			}
	}

?>

