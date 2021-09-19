<?php
	require_once 'controllers/authController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title> Student Records </title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
	
		<link rel="icon" type="image/x-icon" href="favicon.ico"/>
		
		<!-- CUSTOM STYLESHEET -->
        <link rel="stylesheet" href="admin-dashboard.css">
		
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
		<script src="https://kit.fontawesome.com/575abfd474.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	</head>
    <body>

        <!--wrapper start-->
        <div class="wrapper">
            <!--header menu start-->
            <div class="header">
                <div class="header-menu">
                    <div class="title">Harvard University</div>
                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <center class="profile">
                        <img src="logo.png" alt="">
                        <p><?php echo $_SESSION['username']; ?></p>
                    </center>
					<hr></hr>
                    <li class="item">
                        <a href="admin-dashboard.php" class="menu-btn">
                            <i class="fas fa-desktop"></i>Dashboard
                        </a>
                    </li>
                    <li class="item">
                        <a href="student-module.php" class="menu-btn">
                            <span><i class="fas fa-graduation-cap"></i>Student</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="#.php" class="menu-btn">
                            <i class="fas fa-users"></i>Faculty
                        </a>
                    </li>
					<li class="item">
                        <a href="#.php" class="menu-btn">
                            <i class="fas fa-clipboard-list"></i>Courses
                        </a>
                    </li>
                    <li class="item">
                        <a href="#.php" class="menu-btn">
                            <i class="fas fa-clipboard-list"></i>Classes
                        </a>
                    </li>
					<li class="item">
                        <a href="#.php" class="menu-btn">
                            <i class="fas fa-file-excel"></i>Grading
                        </a>
                    </li>
					<li class="item">
                        <a href="#.php" class="menu-btn">
                            <i class="fas fa-users-cog"></i>Users
                        </a>
                    </li>
					
					</li>
					<li class="item">
						<a href="student-records.php?logout=1" class="menu-btn">
							<i class="fas fa-sign-out-alt"></i>Logout
						</a>
					</li>
                </div>
            </div>
            <!--sidebar end-->
            <!--main container start-->
            <div class="content">
				<div class="directory">
					<p>Student Module / View Student / Student Academic Records </p>
				</div>
				
				<hr></hr>
			
			<!--START OF FORM -->
			<form action="student-records.php" method="POST" enctype="multipart/form-data">
			
			<?php
				$id = $_GET['id'];
				
				error_reporting(E_ERROR | E_PARSE);
				$res = mysqli_query ($connection, "SELECT * FROM students WHERE id='$id'");
				while ($row = mysqli_fetch_array($res))
				{
					$id = $row['id'];
					$idnum = $row['idnum'];
					$fname = $row['fname'];
					$mname = $row['mname'];
					$lname = $row['lname'];
					$entlev = $row['entlev'];
					$name = strtoupper($lname) .", ". $fname ." ". substr($mname, 0, 1) . ".";
				}
				
				$results = mysqli_query ($connection, "SELECT * FROM studentRecords where idnum='$idnum' ");
				while ($rows = mysqli_fetch_array($results))
				{
					$term = $rows['term'];
					$enroll_date = $rows['enroll_date'];
					$program = $rows['program'];
					$class = $rows['class'];
					
				}
				
			?>
				<div class="error-handling">
					<!-- DISPLAY ERRORS -->
					<?php if (count($errors) > 0 ): ?>
						<?php if (count($errors) == 11): ?>
							<div class="">
								<?php
									echo "<br>The following error(s) occurred:<p>";
									echo "All fields must be fileld out<br><br>";
								?>
							</div>
									
						<?php else: ?>
							<div class="">
								<?php
									echo "<br>The following error(s) occurred:<p>";
									foreach ($errors as $error):
								?>
								<li><?php echo $error; ?></li>
									<?php endforeach; echo "<br>"; ?>
							</div>
						<?php endif; ?>
					<?php endif; ?>
				</div>
							
				<div class="back-btn">
					<a href="view-student.php?id=<?php echo $id; ?>">
						<button type="button" class="btn btn-danger">Back 
							<i class="fas fa-backspace"></i>
						</button>
					</a>
				</div>
			
				<!-- REGISTRATION FORM -->
				<div class="registration">
					<h4>Student Academic Records</h4>
					<hr></hr>
					
					<div class="student-records">
						<div class="record-1">
							<input type="hidden" name="id" value="<?php echo $id; ?>" />
							<b>ID number:</b><br><?php echo "\t". $idnum; ?>
								<input type="text" name="idnumber" value="<?php echo $idnum; ?>" class="form-input" hidden>
							<br>
							<b>Student name:</b><br><?php echo "\t". $name; ?>
								<input type="text" name="wholename" value="<?php echo $name ?>" class="form-input" hidden>
							<br>
							<hr></hr>

							<b>Year:</b><br>
							<div class="year">
								<select name="entlev" class="form-input">
									<option value="" selected disabled>-- Year --</option>
									<option
									<?php if (isset($entlev) && $entlev=="1st Year") echo "selected";?>
									value="1st Year">1st Year</option>
									<option
									<?php if (isset($entlev) && $entlev=="2nd Year") echo "selected";?>
									value="2nd Year">2nd Year</option>
									<option
									<?php if (isset($entlev) && $entlev=="3rd Year") echo "selected";?>
									value="3rd Year">3rd Year</option>
									<option
									<?php if (isset($entlev) && $entlev=="4th Year") echo "selected";?>
									value="4th Year">4th Year</option>
								</select>
								<br>
							</div>
							
							<b>Term:</b><br>
							<select name="term" class="form-input">
								<option value="" selected disabled>-- Term --</option>
								<option
								<?php if (isset($term) && $term=="1st Term") echo "selected";?>
								value="1st Term">1st Term</option>
								<option
								<?php if (isset($term) && $term=="2nd Term") echo "selected";?>
								value="2nd Term">2nd Term</option>
								<option
								<?php if (isset($term) && $term=="3rd Term") echo "selected";?>
								value="3rd Term">3rd Term</option>
							</select>
							<br>
							
							
							
							
							<b>Program:</b><br>
								<input type="text" name="program" value="<?php echo $program; ?>" class="form-input" placeholder="program">
							<br>
							<b>Class:</b><br>
								<input type="text" name="class" value="<?php echo $class; ?>" class="form-input" placeholder="class">
							<br><br>
							
							<button type="submit" name="addrecord" class="btn btn-success">Add 
								<i class="fas fa-plus"></i>
							</button>
							

						</div>
						
						<div class="record-2">
							<div class="table">
								<table class="table table-bordered">
									<thead>
									<tr>
										<th> Year and Term		</th>
										<th> Date Enrolled		</th>
										<th> Program and Class	</th>
										<th> Action				</th>
									</tr>
									</thead>
									<tbody>
								
								
									<tr>
										<td> <?php echo $entlev . " " . $term; ?> 		</td>
										<td> <?php echo $enroll_date; ?>						</td>
										<td> <?php echo $program . " - " . $class; ?>	</td>
										<td>
										
										<a href="enroll-courses.php?id=<?php echo $id; ?>">View Enrolled Courses</a>
										
										</td>
									</tr>
								
								</table>
							</div>
						</div>
						
					</div>
				</div>
			
			</form>
			<!--END OF FORM -->
			
			</div>
            <!--main container end-->
        </div>
        <!--wrapper end-->

		<div>
			<?php
				include("preloader.php")
			?>
		</div>
		
        <script type="text/javascript">
        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
        </script>

    </body>
</html>
      