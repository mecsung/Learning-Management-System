<?php
	require_once 'controllers/authController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title> Courses </title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		
		<link rel="icon" type="image/x-icon" href="favicon.ico"/>
		
		<!-- CUSTOM STYLESHEET -->
        <link rel="stylesheet" href="admin-dashboard.css">
		
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
		<script src="https://kit.fontawesome.com/575abfd474.js" crossorigin="anonymous"></script>
		<!-- BOOTSRAP -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                            <i class="fas fa-graduation-cap"></i>Student
                        </a>
                    </li>
                    <li class="item">
                        <a href="faculty-module.php" class="menu-btn">
                            <i class="fas fa-users"></i>Faculty
                        </a>
                    </li>
					<li class="item">
                        <a href="courses-module.php" class="menu-btn">
                            <span><i class="fas fa-clipboard-list"></i>Courses</span>
                        </a>
                    </li>
                    <li class="item">
                        <a href="classes-module.php" class="menu-btn">
                            <i class="fas fa-clipboard-list"></i>Classes
                        </a>
                    </li>
					<li class="item">
                        <a href="grading-module.php" class="menu-btn">
                            <i class="fas fa-file-excel"></i>Grading
                        </a>
                    </li>
					<li class="item">
                        <a href="users-module.php" class="menu-btn">
                            <i class="fas fa-users-cog"></i>Users
                        </a>
                    </li>
					
					</li>
					<li class="item">
						<a href="student-module.php?logout=1" class="menu-btn">
							<i class="fas fa-sign-out-alt"></i>Logout
						</a>
					</li>
                </div>
            </div>
            <!--sidebar end-->
			
            <!--main container start-->
            <div class="content">
				<div class="directory">
					<p>Courses Module / </p>
				</div>
				
				<hr></hr>
				
				<div class="course-pdf">
					<button type="submit" class="btn btn-success">Download PDF
						<i class="fas fa-file-download"></i>
					</button>
				</div>

				<!--START OF FORM -->
				<form action="courses-module.php" method="POST">

					<div class="courses">
						<div class="add-courses">
							<div class="courses-1">
								<h4>Register new course</h4>
								<b>Course name: </b><input type="text" name="course_name" placeholder="course name">
								<br>
								<b>Course code: </b><input type="text" name="course_code" placeholder="course code">
								<br>
								<b>Units: </b><input type="number" name="units" placeholder="units">
								
								<b>Year level: </b>
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
								<b>Program: </b><input type="text" name="program" placeholder="program">
								<br>
								
								<button type="submit" name="add-course" class="btn btn-danger">Add course
									<i class="fas fa-folder-plus"></i>
								</button>
							</div>
							
							
							
							
							<div class="courses-2">
								<div class="search">
									<button type="submit" name="search-course" class="">
										<i class="fas fa-search"></i>
									</button>
									<input type="text" name="search" placeholder="type here...">
								</div>
								
								<br>
								<div class="table">
									<table class="table table-bordered">
										<thead>
										<tr>
											<th> Course code  		</th>
											<th> Course name		</th>
											<th> Units				</th>
											<th> Year				</th>
											<th> Program			</th>
										</tr>
										</thead>
										<tbody>
										
										<?php
											error_reporting(E_ERROR | E_PARSE);
												
											$result = mysqli_query ($connection, "SELECT * FROM courses");
											while ($rows = mysqli_fetch_array($result))
										{ ?>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<?php }
											
											?>
									</table>
								</div>
							</div>
						</div>
					</div>	
				</form>
				
				
				
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
      