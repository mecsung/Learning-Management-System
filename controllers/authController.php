<?php
	
	session_start();
	
	require 'config/db.php';
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
			$counter++;
		}
		if (empty($fname)) {
			$errors['1'] = "All field is required";
			$counter++;
		}
		if (empty($mname)) {
			$errors['1'] = "All field is required";
			$counter++;
		}
		if (empty($lname)) {
			$errors['1'] = "All field is required";
			$counter++;
		}
		if (empty($gender)) {
			$errors['1'] = "All field is required";
			$counter++;
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
			$reg_date = date("F j\, Y \| g:i A", time());
			
			$sql = "INSERT INTO students (idnum, fname, mname, lname, entlev,
				gender, cnum, email, prevschool, hea, img, g_moral, NSO)
			VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = $connection->prepare($sql);
			$stmt->bind_param('sssssssssssss', $idnum, $fname, $mname, $lname, 
				$entlev, $gender, $cnum, $email, $prevschool, $hea, $image, 
				$g_moral, $NSO);
			
			move_uploaded_file($_FILES['image']['tmp_name'], $target);
			move_uploaded_file($_FILES['g_moral']['tmp_name'], "data/files/GMORAL/".$g_moral);
			move_uploaded_file($_FILES['NSO']['tmp_name'], "data/files/NSO/".$NSO);
			
			if ($stmt->execute()) {
				// LOGIN USER
				$user_id = $connection->insert_id;
				$_SESSION['id'] = $user_id;
				$_SESSION['email'] = $email;
				
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
		$enroll_date = date("F j\, Y \| g:i A", time());
		
		// VALIDATION IF EMPTY
		if (empty($entlev)) {
			$errors['1'] = "All field is required";
			$counter++;
		}
		if (empty($term)) {
			$errors['1'] = "All field is required";
			$counter++;
		}
		if (empty($program)) {
			$errors['1'] = "All field is required";
			$counter++;
		}
		if (empty($class)) {
			$errors['1'] = "All field is required";
			$counter++;
		}
		
		if (count($errors) == 0) {
			
			$sql = "INSERT INTO studentRecords (idnum, name, entlev, term, program,
				class, enroll_date) VALUES ('$idnum', '$name', '$entlev', '$term', 
				'$program', '$class', '$enroll_date');";
			
			$newsql = "UPDATE students SET entlev='$entlev', term='$term', program='$program', 
			class='$class' WHERE idnum='$idnum'";
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

?>