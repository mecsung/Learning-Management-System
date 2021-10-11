<?php
	require_once 'controllers/authController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title> Classes </title>
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
                            <i class="fas fa-clipboard-list"></i>Courses
                        </a>
                    </li>
                    <li class="item">
                        <a href="classes-module.php" class="menu-btn">
                            <span><i class="fas fa-clipboard-list"></i>Classes</span>
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
					<p>Classes Module / </p>
				</div>
				
				<hr></hr>
				
				<div class="course-pdf">
					<button class="btn btn-danger" type="button" data-bs-toggle="modal" 
					data-bs-target="#addCourse">Create new Program
						<i class="fas fa-folder-plus"></i>
					</button>
					
					<button type="submit" class="btn btn-success" name="pdf-btn">
						<a style="color: white; text-decoration: none;" href="DownloadPDF-class.php" target="_blank">Download PDF
							<i class="fas fa-file-download"></i>
						</a>
					</button>
				</div>
				
				<form action="classes-module.php" method="POST">

					<div class="courses">
						<div class="add-courses">
							<div class="courses-2">
								<div class="search">
									<button type="submit" name="search-class" class="">
										<i class="fas fa-search"></i>
									</button>
									<input type="text" name="search" placeholder="type here...">
								</div>
								
								<br>
								<div class="table">
									<table class="table table-bordered">
										<thead>
										<tr>
											<th> Program name  		</th>
											<th> Prgram code		</th>
											<th> Date				</th>
										</tr>
										</thead>
										<tbody>
										
										<?php
											error_reporting(E_ERROR | E_PARSE);
												
											$result = mysqli_query ($connection, "SELECT * FROM classes");
											while ($rows = mysqli_fetch_array($result))
										{ ?>
										<tr>
											<td>
												<a title="view classes" href="view-program.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['program_name']; ?></a>
											</td>
											<td><?php echo $rows['program_code']; ?></td>
											<td><?php echo $rows['date_created']; ?></td>
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
		
		<!-- Add Class Modal -->
		<div class="modal fade" id="addCourse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Register New Program</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>

			  	<form action="classes-module.php" method="POST">
					<div class="modal-body">
						<label>Program name: </label><br>
						<input type="text" name="program_name" placeholder="course name">
						<br>
						<label>Program code: </label><br>
						<input type="text" name="program_code" placeholder="program code">
						<br>
						<label>Description: </label><br>
						<input type="text" name="pdescription" placeholder="description">
						<br>
					</div>
				
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					
						<button type="submit" name="add-class" class="btn btn-danger">Save
							<i class="fas fa-folder-plus"></i>
						</button>
					</div>
				<form>
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
      