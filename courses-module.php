<?php
	require_once 'controllers/authController.php';
	require 'controllers/accessController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title> Courses </title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		
		<link rel="icon" type="image/x-icon" href="styles/favicon.ico"/>
		
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
					<div class="title">Aoba Johsai Academy</div>
                </div>
            </div>
            <!--header menu end-->
            <!--sidebar start-->
            <div class="sidebar">
                <div class="sidebar-menu">
                    <center class="profile">
                        <img src="styles/logo.png" alt="">
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
					
					<!-- Button trigger modal -->	
					<li class="item">
						<div class="menu-btn">
							<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
								<i class="fas fa-sign-out-alt"></i>Logout
							</button>
						</div>	
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
					<button class="btn btn-danger" type="button" data-bs-toggle="modal" 
					data-bs-target="#addCourse">Add course
						<i class="fas fa-folder-plus"></i>
					</button>
					
					<button type="submit" class="btn btn-success" name="pdf-btn">
						<a style="color: white; text-decoration: none;" href="DownloadPDF-course.php" target="_blank">Download PDF
							<i class="fas fa-file-download"></i>
						</a>
					</button>
				</div>

				<!--START OF FORM -->
				<form action="courses-module.php" method="POST">

					<div class="courses">
						<div class="add-courses">
							<div class="courses-2">
								<div class="search">
									<button type="submit" name="search-course" class="">
										<i class="fas fa-search"></i>
									</button>
									<input type="text" name="search" placeholder="filter search...">
								</div>
								
								<br>
								<div class="page">
									<label><?php
									if ( $_GET['page'] == ""){
										echo "Page 1";
									} else {
										echo "Page " . $_GET['page'];
									}
									?></label>
								</div>
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

											$page = $_GET['page'];
											if ($page == "" || $page == "1"){
												$page1 = 0;
											}
											else {
												$page1 = ($page*7)-7;
											}

											$result = mysqli_query ($connection, "SELECT * FROM courses Limit $page1,7");
											while ($rows = mysqli_fetch_array($result))
											
										{ ?>
										<tr>
											<td><?php echo $rows['course_name']; ?></td>
											<td><?php echo $rows['course_code']; ?></td>
											<td><?php echo $rows['units']; ?></td>
											<td><?php echo $rows['entlev']; ?></td>
											<td><?php echo $rows['program']; ?></td>
										</tr>

										<!-- Disable -->
										<div class="modal fade" id="turnOff<?php echo $rows['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
											<div class="modal-header">
												<h6 class="modal-title" id="exampleModalLabel">Are you sure you want to disable course?</h6>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<input hidden name="id" value="<?php echo $rows['id']; ?>" >
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
												
												<button type="submit" name="turnOff"  class="btn btn-danger">
													<i class="fas fa-sign-out-alt"></i>Yes
												</button>
											</div>
											</div>
										</div>
										</div>
										
										<?php }
											
											?>
									</table>
								</div>

								<nav aria-label="Page navigation example">
									<ul class="pagination justify-content-end">
										<?php
											$res1 = mysqli_query($connection, "SELECT * FROM students");
											$count = mysqli_num_rows($res1);
											$a = $count/7;
											$a = ceil($a);
											for ($b=1; $b<=$a; $b++) { ?>
												<li class="page-item"><a class="page-link" 
												href="courses-module.php?page=<?php echo $b ." " ;?>"><?php echo $b; ?></a>
												</li>
											
											<?php
											}
											?>
									</ul>
								</nav>
							</div>
						</div>
					</div>	
				</form>
			</div>
            <!--main container end-->
        </div>
        <!--wrapper end-->
		
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h6 class="modal-title" id="exampleModalLabel">Are you sure you want to logout?</h6>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				
				<button class="btn btn-danger">
					<a href="admin-dashboard.php?logout=1" class="menu-btn">
						<i class="fas fa-sign-out-alt"></i>Logout
					</a>
				</button>
			  </div>
			</div>
		  </div>
		</div>
		
		<!-- Add Course Modal -->
		<div class="modal fade" id="addCourse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Register New Course</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  
				<form action="courses-module.php" method="POST">
					<div class="modal-body">
						<label>Course name: </label><br>
						<input type="text" name="course_name" placeholder="course name">
						<br>
						<label>Course code: </label><br>
						<input type="text" name="course_code" placeholder="course code">
						<br>
						<label>Units: </label><br>
						<input type="number" name="units" placeholder="units">
						<br>
						<label>Year level: </label><br>
						<select name="entlev" class="form-input">
							<option value="" selected disabled>-- Year --</option>
							<option
								<?php if (isset($entlev) && $entlev=="1st Year") echo "selected";?>
								value="1st Year">1st Year
							</option>
							<option
								<?php if (isset($entlev) && $entlev=="2nd Year") echo "selected";?>
								value="2nd Year">2nd Year
							</option>
							<option
								<?php if (isset($entlev) && $entlev=="3rd Year") echo "selected";?>
								value="3rd Year">3rd Year
							</option>
							<option
								<?php if (isset($entlev) && $entlev=="4th Year") echo "selected";?>
									value="4th Year">4th Year
							</option>
						</select>
						<br>
						<label>Program: </label><br>
						<?php
							$output = mysqli_query ($connection, "SELECT * FROM classes");
						?>
						<select name="program" class="form-input">
							<option value="" selected disabled>-- Program --</option>
							<option value="General" >General</option>
							<?php while ($row1 = mysqli_fetch_array($output)):; ?>
							<option>
								<?php echo $row1[1]; ?>
							</option>
							<?php endwhile; ?>
						</select>
					</div>
				

					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					
					<button type="submit" name="add-course" class="btn btn-danger">Add course
						<i class="fas fa-folder-plus"></i>
					</button>
				</form>
			  </div>
			</div>
		  </div>
		</div>
		
		<div>
			<?php
				include("preloader.php")
			?>
		</div>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        
        <script type="text/javascript">
        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
        </script>
    </body>
</html>
      