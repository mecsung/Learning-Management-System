<?php
	require_once 'controllers/authController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title> View Student </title>
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
						<a href="view-student.php?logout=1" class="menu-btn">
							<i class="fas fa-sign-out-alt"></i>Logout
						</a>
					</li>
                </div>
            </div>
            <!--sidebar end-->
            <!--main container start-->
            <div class="content">
				<div class="directory">
					<p>Student Module / View Student</p>
				</div>
				
				<hr></hr>
			
			<!--START OF FORM -->
			<form action="view-student.php" method="POST" enctype="multipart/form-data">
			
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
					$gender = $row['gender'];
					$cnum = $row['cnum'];
					$email = $row['email'];
					$prevschool = $row['prevschool'];
					$hea = $row['hea'];
					$img = $row['img'];
					$g_moral = $row['g_moral'];
					$NSO = $row['NSO'];
				}
			?>
			
			
				<div class="back-btn">
					<button type="submit" name="enroll-backbtn" class="btn btn-danger">Back
						<i class="fas fa-backspace"></i>
					</button>
					
					<a href="">
						<button type="button" class="btn btn-success">Download PDF 
							<i class="fas fa-file-download"></i>
						</button>
					</a>
					
					<a href="">
						<button type="button" class="btn btn-success">Sample
							<i class="fas fa-file-download"></i>
						</button>
					</a>
				</div>
				<!-- REGISTRATION FORM -->
				<div class="registration">
					<h4>View Student Information</h4>
					<hr></hr>
					
					<div class="view-flex">
						<div class="student-requirements">
						<center>
							<img src="data/images/<?php echo $img; ?>" alt="">
							<br>
							<h4>Primary</h4>
							<b>Student number:</b><?php echo "\t" . $idnum; ?>
							<br>
							<b>First name:</b><?php echo "\t" . $fname; ?>
							<br>
							<b>Middle name:</b><?php echo "\t" . $mname; ?>
							<br>
							<b>Last name:</b><?php echo "\t" . $lname; ?>
							<br>
						</center>
						</div>
						
						<div class="student-info">
						<h4>Contact</h4>
							<b>Email Address:</b><?php echo "\t" . $email; ?>
							<br>
							<b>Contact no:</b><?php echo "\t" . $cnum; ?>
							<br>
							<hr></hr>
						<h4>Personal</h4>
							<b>Gender:</b><?php echo "\t" . $gender; ?>
							<br>
							<b>Highest Education:</b><?php echo "\t" . $hea; ?>
							<br>
							<b>Last School Attended:</b><?php echo "\t" . $prevschool; ?>
							<br>
							<hr></hr>
						<h4>Other</h4>
							<input type="checkbox" checked disabled="disabled" >
							<b>Good Moral:</b>
							<a href="data/files/GMORAL/<?php echo $row['g_moral']; ?>"><?php echo $g_moral; ?></a>
							<br>
							<input type="checkbox" checked disabled="disabled" >
							<b>NSO:</b>
							<a href="data/files/NSO/<?php echo $row['NSO']; ?>"><?php echo $NSO; ?></a>
						</div>
						
						<div class="student-acad">
						<h4>Student Information</h4>
							<?php
								$id = $_GET['id'];
							
								error_reporting(E_ERROR | E_PARSE);
								$res = mysqli_query ($connection, "SELECT * FROM students WHERE id='$id'");
								while ($row = mysqli_fetch_array($res))
								{
									$id = $row['id'];
									$year = $row['entlev'];
									$term = $row['term'];
									$program = $row['program'];
									$class = $row['class'];
								}
							?>
						
						
							<b>Year:</b><br>
								<input type="text" value="<?php echo $year; ?>" class="form-input" disabled>
							<br>
							<b>Term:</b><br>
								<input type="text" value="<?php echo $term; ?>" class="form-input"disabled>	
							<br>
							<b>Program:</b><br>
								<input type="text" value="<?php echo $program; ?>" class="form-input" disabled>
							<br>
							<b>Class:</b><br>
								<input type="text" value="<?php echo $class; ?>" class="form-input" disabled>
							<br><br>

							<a href="student-records.php?id=<?php echo $id; ?>">
								<button type="button" name="student-recordbtn" class="btn btn-danger">Student Records
										<i class="fas fa-eye"></i>
								</button>
							</a>
							
						
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
      