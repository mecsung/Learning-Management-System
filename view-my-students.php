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
					<p>Faculty Module / Faculty Loads / List of Students</p>
				</div>
				<h3>Instructor's List of Students</h3>
				<hr></hr>
				
                <form action="view-my-students.php" method="POST">
                    <?php
                        $id = $_GET['id'];

                        error_reporting(E_ERROR | E_PARSE);

                        //Faculty Details
                        $res = mysqli_query ($connection, "SELECT * FROM faculty_loads WHERE id='$id'");
                        while ($row = mysqli_fetch_array($res)) 
                        {
                            $id = $row['id'];
                            $faculty_id = $row['faculty_id'];
                            $fullname = $row['fullname'];
                            $course_name = $row['course_name'];
                        }
                    ?>
                    <div class="facultyinfo">
                        <label>Faculty ID : </label><?php echo " " . $faculty_id; ?>
                        <br>
                        <label>Name : </label><?php echo " " . $fullname; ?>
                        <br>
                        <label>Course : </label><?php echo " " . $course_name; ?>
                        <br>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#assignClass">Assign Class
                        <i class="fas fa-plus"></i>
                    </button>
                    </div>

                    <hr></hr>

                    <div class="table">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> Student Name           </th>
                                    <th> Program & Class		</th>
                                </tr>
                            </thead>
                            <?php
                                error_reporting(E_ERROR | E_PARSE);

                                $new = mysqli_query ($connection, "SELECT * FROM faculty_loads 
                                    WHERE id='$id'");
                                while ($q = mysqli_fetch_array($new)) { 
                                    $c_name = $q['course_name'];
                                    $c_class = $q['class'];
                                }

                                $student = mysqli_query ($connection, "SELECT * FROM course_enrolled 
                                    WHERE course='$c_name' AND
                                    program_class='$c_class'");
                                while ($s = mysqli_fetch_array($student)) { ?>
                                    <tbody>
                                        <td><?php echo $s['fullname']; ?></td>
                                        <td><?php echo $s['program_class']; ?></td>
                                    </tbody>
                                <?php }
                            ?>
                        </table>
                    </div>
                </form>
                          
                <!-- Assign Class Modal -->
                <div class="modal fade" id="assignClass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="view-my-students.php" method="POST">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">List of Course</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                
                                <input hidden name="id" value="<?php echo $id; ?>" >
                                <input  name="course_name" value="<?php echo $course_name; ?>" >
                                <input hidden name="faculty_id" value="<?php echo $faculty_id; ?>" >
                                <input hidden name="fullname" value="<?php echo $fullname; ?>" >

                                <div class="table">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th> Select     </th>
                                            <th> Program	</th>
                                            <th> Class		</th>
                                        </tr>
                                        </thead>

                                        <?php
                                            error_reporting(E_ERROR | E_PARSE);

                                            $sql = mysqli_query ($connection, "SELECT * FROM courses 
                                                WHERE course_name='$course_name'");
                                            while ($rows = mysqli_fetch_array($sql)) { 
                                                $program = $rows['program'];
                                            } 

                                        if ($program == 'General') {
                                            $string = mysqli_query ($connection, "SELECT * FROM sections");
                                            while ($sec = mysqli_fetch_array($string)) { ?>
                                                <tbody>
                                                    <td>
                                                        <input style="height: 12px; width: 12px;" type="radio"name="class"
                                                        value="<?php echo $sec['class_name']; ?>">
                                                    </td>
                                                    <td><?php echo $sec['program']; ?></td>
                                                    <td><?php echo $sec['class_name']; ?></td>
                                                </tbody>
                                            <?php }    
                                        }
                                        else {
                                            $stmt = mysqli_query ($connection, "SELECT * FROM sections 
                                                WHERE program='$program'");
                                            while ($r = mysqli_fetch_array($stmt)) { ?>
                                                <tbody>
                                                    <td>
                                                        <input style="height: 12px; width: 12px;" type="radio" name="class"
                                                        value="<?php echo $r['program'] .
                                                        "\t". $r['class_name'];?>">
                                                    </td>
                                                    <td><?php echo $r['program']; ?></td>
                                                    <td><?php echo $r['class_name']; ?></td>
                                                </tbody>
                                            <?php }
                                        } ?>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                
                                <button type="submit" name="assignfacultyClass" 
                                class="btn btn-danger">
                                    <i class="fas fa-sign-out-alt"></i>Assign Class
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
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
      