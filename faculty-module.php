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
					<p>Faculty Module / </p>
				</div>
				
				<hr></hr>
				
                <form action="faculty-module.php" method="POST">
                    <div class="search-box">
                        <input type="text" name="searchfaculty" class="search-box" placeholder="Type to search...">
                        <button type="submit" name="button-search-faculty" value="search">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>

                    <h3>Faculty List</h3>

                    <div class="button-enroll">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" 
					    data-bs-target="#addFaculty">Add New Faculty
                            <i class="fas fa-user-plus"></i>
                        </button>
					
                        <button type="submit" class="btn btn-success" name="pdf-btn">
                            <a href="DownloadPDF-faculty.php" target="_blank">Download PDF
                                <i class="fas fa-file-download"></i>
                            </a>
                        </button>
				    </div>
				
                    <div class="page">
                        <label><?php echo "Page " . $_GET['page']; ?></label>
                    </div>
				
                    <div class="table">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th> Faculty no.  		</th>
                                <th> Name				</th>
                                <th> Email				</th>
                                <th> Status				</th>
                                <th> Registration Date	</th>
                                <th> Action				</th>
                            </tr>
                            </thead>
                            <tbody>
                        
                        <?php
                            error_reporting(E_ERROR | E_PARSE);
                            
                            // if search button is clicked
                            if (isset($_POST['button-search-faculty'])) {
                                $search = $_POST['searchfaculty'];
                                
                                $result = mysqli_query($connection, "SELECT * FROM faculty");

                                if (mysqli_num_rows($result) == 0){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        Cannot find student.
                                    </div>
                                <?php }

                                while ($row = mysqli_fetch_array($result)) {
                                    $string1 = $row['fullname'];
                                    $string2 = $row['username'];
                                    if (preg_match("/{$search}/i", $string1) || preg_match("/{$search}/i", $string2)) {
                                        
                                    ?>
                                    <tr>
                                        <td> <?php echo $row['faculty_id']; ?> </td>
                                        <td>
                                            <a title="Assign Faulty Load" href="facultyLoad.php?id=<?php echo $rows['id']; ?>"><?php echo $row['fullname']; ?></a> 
                                        </td>
                                        <td> <?php echo $row['username']; ?>   </td>
                                        <td> <?php echo $row['status']; ?> 	</td>
                                        <td> <?php echo $row['reg_date']; ?>   </td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['faculty_id'];?>">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </a>
                                        </td>
                                    </tr>
                                    
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal<?php echo $row['faculty_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            
                                            <button class="btn btn-danger">
                                                <a href="delete.php?id=<?php echo $row['id']; ?>">Yes
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                        <?php }}
                            } else {
                                $page = $_GET['page'];
                                if ($page == "" || $page == "1"){
                                    $page1 = 0;
                                }
                                else {
                                    $page1 = ($page*5)-5;
                                }
                                
                                error_reporting(E_ERROR | E_PARSE);
                                
                                $res = mysqli_query ($connection, "SELECT * FROM faculty Limit $page1,5 ");
                                while ($rows = mysqli_fetch_array($res)) {
                            ?>
                                <tr>
                                    <td> <?php echo $rows['faculty_id']; ?> </td>
                                    <td>
                                        <a title="Assign Faulty Load" href="facultyLoad.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['fullname']; ?></a>
                                    </td>
                                    <td> <?php echo $rows['username']; ?>   </td>
                                    <td> <?php echo $rows['status']; ?> 	</td>
                                    <td> <?php echo $rows['reg_date']; ?>   </td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $rows['faculty_id'];?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </a>
                                    </td>
                                </tr>
                                
                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal<?php echo $rows['faculty_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    
                                    <button class="btn btn-danger">
                                        <a href="deleteFaculty.php?id=<?php echo $rows['id']; ?>">Yes
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </button>
                                </div>
                                </div>
                            </div>
                            </div>

                        <?php	}	
                            }
                        ?>
                        </tbody>
                        </table>
                    </div>

                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-end">
                            <?php
                                $res1 = mysqli_query($connection, "SELECT * FROM faculty");
                                $count = mysqli_num_rows($res1);
                                $a = $count/5;
                                $a = ceil($a);
                                for ($b=1; $b<=$a; $b++) { ?>
                                    <li class="page-item"><a class="page-link" 
                                    href="faculty-module.php?page=<?php echo $b ." " ;?>"><?php echo $b; ?></a>
                                    </li>
                                
                                <?php
                                }
                                ?>
                        </ul>
                    </nav>
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

        <!-- Add Faculty Modal -->
		<div class="modal fade" id="addFaculty" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered-scrollable">
			    <div class="modal-content">
			        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Register New Faculty</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
			  
                    <form action="faculty-module.php" method="POST">
                        <div class="modal-body">
                            <label>First Name: </label><br>
                            <input type="text" name="fname" placeholder="first name">
                            <br>
                            <label>Middle Name: </label><br>
                            <input type="text" name="mname" placeholder="middle name">
                            <br>
                            <label>Last Name: </label><br>
                            <input type="text" name="lname" placeholder="last name">
                            <br>

                            <label>Gender:</label><br>
                            <select name="gender">
                                <option value="" selected disabled>-- Gender --</option>
                                <option
                                <?php if (isset($gender) && $gender=="male") echo "selected";?>
                                value="male">Male</option>
                                <option
                                <?php if (isset($gender) && $gender=="female") echo "selected";?>
                                value="female">Female</option>
                            </select>
                            
                            <br>
                            <label>Specialization: </label><br>
                            <input type="text" name="special" placeholder="specialization">
                            <br>

                            <label>Employment Status: </label><br>
                            <select name="status">
                                <option value="" selected disabled>-- Status --</option>
                                <option
                                <?php if (isset($status) && $status=="Full-time") echo "selected";?>
                                value="Full-time">Full-time</option>
                                <option
                                <?php if (isset($status) && $status=="Part-time") echo "selected";?>
                                value="Part-time">Part-time</option>
                                <option
                                <?php if (isset($status) && $status=="Temporary") echo "selected";?>
                                value="Temporary">Temporary</option>
                                <option
                                <?php if (isset($status) && $status=="Seasonal") echo "selected";?>
                                value="Seasonal">Seasonal</option>
                            </select>

                            <br>
                            <label>Email: </label><br>
                            <input type="text" name="email" placeholder="email">
                            <br>
                            <label>Password: </label><br>
                            <input type="password" name="pass" placeholder="password">
                            <br>
                            <label>Confirm Password: </label><br>
                            <input type="password" name="passConf" placeholder="confirm password">
                            <br>
                        </div>
                    

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        
                        <button type="submit" name="add-faculty" class="btn btn-danger">Save
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
      