<?php
	require_once 'controllers/authController.php';
    require 'controllers/accessController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title> Faculty </title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
	
		<link rel="icon" type="image/x-icon" href="styles/favicon.ico"/>
		
		<!-- CUSTOM STYLESHEET -->
        <link rel="stylesheet" href="styles/facultyLoad-style.css">
		
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
		<script src="https://kit.fontawesome.com/575abfd474.js" crossorigin="anonymous"></script>
		<!-- BOOTSRAP -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>

    <style>
        .view {
            color: blue;
            text-decoration: none;
        }

    </style>
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
                            <span><i class="fas fa-users"></i>Faculty</span>
                        </a>
                    </li>
					<li class="item">
                        <a href="courses-module.php" class="menu-btn">
                            <i class="fas fa-clipboard-list"></i>Courses
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
					<p>Faculty Module / Faculty Loads</p>
				</div>
				<h3>Instructor's List of Loads</h3>
				<hr></hr>
				
                <form action="facultyLoad.php" method="POST">
                    <?php
                        $id = $_GET['id'];

                        error_reporting(E_ERROR | E_PARSE);

                        //Faculty Details
                        $res = mysqli_query ($connection, "SELECT * FROM faculty WHERE id='$id'");
                        while ($row = mysqli_fetch_array($res)) 
                        {
                            $id = $row['id'];
                            $faculty_id = $row['faculty_id'];
                            $fullname = $row['fullname'];
                            $special = $row['special'];
                            $status = $row['status'];
                            $email = $row['email'];
                            $username = $row['username'];
                            $reg_date = $row['reg_date'];
                        }
                    ?>
                    <div class="facultyinfo">
                        <label>Faculty ID : </label><?php echo " " . $faculty_id; ?>
                        <br>
                        <label>Name : </label><?php echo " " . $fullname; ?>
                        <br>
                        <label>Email/Username : </label><?php echo " " . $username; ?>
                        <br>
                        <label>Status : </label><?php echo " " . $status; ?>
                        <br>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#assignLoads">Assign Loads
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <hr></hr>
                    
                    <div class="table">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> No.		        </th>
                                    <th> Course Name		</th>
                                    <th> Students	        </th>
                                </tr>
                            </thead>

                            
                            <tbody>
                                <?php
                                error_reporting(E_ERROR | E_PARSE);

                                //Faculty Assign Loads
                                $sql = mysqli_query ($connection, "SELECT * FROM faculty_loads 
                                    WHERE faculty_id='$faculty_id'");
                                while ($rows = mysqli_fetch_array($sql)) { 
                                ?>
                                <tr>
                                    <td><?php echo $rows['id']; ?></td>
                                    <td><?php echo $rows['course_name']; ?></td>

                                    <td>
                                        <a class="view" href="view-my-students.php?id=<?php echo $rows['id']; ?>">
                                            View enrolled students
                                        </a>
                                    </td>
                                </tr>

                                <?php } ?>              
                            </tbody>  
                        </table>
                    </div>

                </form>

                <form id="assignLoadSelect" action="facultyLoad.php" method="POST">
					<!-- Assign Course Modal -->
					<div class="modal fade" id="assignLoads" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="exampleModalLabel">List of Course</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<input hidden name="id" value="<?php echo $id; ?>" >
                                    <input hidden name="faculty_id" value="<?php echo $faculty_id; ?>" >
									<input hidden name="fullname" value="<?php echo $fullname; ?>" >

									<div class="table">
										<table class="table table-striped">
											<thead>
											<tr>
												<th><input style="height: 12px; width: 12px;" type="checkbox" id="select-all"></th>
												<th> Course Code 	</th>
												<th> Course Name	</th>
												<th> Year			</th>
												<th> Program		</th>
												<th> Units			</th>
											</tr>
											</thead>

											<?php
											error_reporting(E_ERROR | E_PARSE);
									
											$course = mysqli_query ($connection, "SELECT * FROM courses");
											while ($rows = mysqli_fetch_array($course)) {?>

											<tbody>
												<td><input style="height: 12px; width: 12px;" type="checkbox" name="check[]" value="<?php echo $rows['course_name']; ?>"></td>
												<td><?php echo $rows['course_code']; ?>		</td>
												<td><?php echo $rows['course_name']; ?></td>
												<td><?php echo $rows['entlev']; ?></td>
												<td>
													<?php
													$expr = '/(?<=\s|^)[A-Z]/';
													preg_match_all($expr, $rows['program'], $matches);    
													$rprogram = implode('', $matches[0]);
													echo $rprogram;
													?>
												</td>
												<td><?php echo $rows['units']; ?></td>
											</tbody>

											<?php }
											?>
										</table>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
									
									<button type="submit" name="facultyLoads" class="btn btn-danger">
										<i class="fas fa-sign-out-alt"></i>Assign Selected
									</button>
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

        $(document).ready(function(){
			$("#assignLoadSelect #select-all").click(function(){
                $("#assignLoadSelect input[type='checkbox']").prop('checked', this.checked);
            });
        });
        </script>

    </body>
</html>
      