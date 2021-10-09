<?php
	require_once 'controllers/authController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title> Student </title>
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
                            <span><i class="fas fa-graduation-cap"></i>Student</span>
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
					<p>Student Module / </p>
				</div>
				
				<hr></hr>
			
			<!--START OF FORM -->
			<form action="student-module.php" method="POST">
			
				<div class="search-box">
					<input type="text" name="search" class="search-box" placeholder="Type to search...">
					<button type="submit" name="button-search" value="search">
                        <i class="fas fa-search"></i>
					</button>
				</div>
				
				<h3>Student List</h3>
				
				<div class="button-enroll">
					<button type="submit" name="add" class="btn btn-danger">Enroll Student
						<i class="fas fa-user-plus"></i>
					</button>
					
					<button type="submit" class="btn btn-success" name="pdf-btn">
						<a href="downloadPDF.php" target="_blank">Download PDF
							<i class="fas fa-file-download"></i>
						</a>	
					</button>
				</div>
				
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
							<th> Student no.  		</th>
							<th> Name				</th>
							<th> Program & Class	</th>
							<th> Year				</th>
							<th> Registration Date	</th>
							<th> Action				</th>
						</tr>
						</thead>
						<tbody>
					
					<?php
						
						error_reporting(E_ERROR | E_PARSE);
						
						// if search button is clicked
						if (isset($_POST['button-search'])) {
							$search = $_POST['search'];
							
							$result = mysqli_query($connection, "SELECT * FROM students
							WHERE fname='$search' or lname='$search' or class='$search'
							or program='$search' or entlev='$search'
							or CONCAT(fname, ' ', mname, ' ', lname)='$search' or
							CONCAT(fname, ' ', lname)='$search' ");
							
							if (mysqli_num_rows($result) == 0){ ?>
								<div class="alert alert-danger" role="alert">
									Cannot find student.
								</div>
							<?php }
							
							while ($row = mysqli_fetch_array($result))
							{ ?>
								<tr>
									<td> <?php echo $row['idnum']; ?> 	</td>
									<td>
										<a title="view student" href="view-student.php?id=<?php echo $row['id']; ?>">
											<?php echo $row['fname'] ." ". substr($row['mname'], 0, 1) .". ". $row['lname']; ?> 
										</a>
									</td>
									<td> <?php echo $row['program'] ." - ". $row['class']; ?> </td>
									<td> <?php echo $row['entlev']; ?> 						</td>
									<td> <?php echo $row['reg_date']; ?>					</td>
									<td>
										<!-- Button trigger modal -->
										<button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id'];?>">
											<i class="fas fa-trash-alt"></i>
										</button>
									</td>
								</tr>
								
								<!-- Delete Modal -->
								<div class="modal fade" id="deleteModal<?php echo $row['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
					<?php }
						} else {
							$page = $_GET['page'];
							if ($page == "" || $page == "1"){
								$page1 = 0;
							}
							else {
								$page1 = ($page*5)-5;
							}
							
							error_reporting(E_ERROR | E_PARSE);
							
							$res = mysqli_query ($connection, "SELECT * FROM students Limit $page1,5");
							while ($rows = mysqli_fetch_array($res)) {
						?>
							<tr>
							<td> <?php echo $rows['idnum']; ?> 	</td>
							<td>
								<a title="view student" href="view-student.php?id=<?php echo $rows['id']; ?>">
									<?php echo $rows['fname'] ." ". substr($rows['mname'], 0, 1) .". ". $rows['lname']; ?> 
								</a>
							</td>
							<td> <?php echo $rows['program'] ." - ". $rows['class']; ?> </td>
							<td> <?php echo $rows['entlev']; ?> 						</td>
							<td> <?php echo $rows['reg_date']; ?>							</td>
							<td>
								<!-- Button trigger modal -->
								<button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $rows['id'];?>">
									<i class="fas fa-trash-alt"></i>
								</button>
							</a>
							</td>
						</tr>
							
						<!-- Delete Modal -->
						<div class="modal fade" id="deleteModal<?php echo $rows['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						  <div class="modal-dialog">
							<div class="modal-content">
							  <div class="modal-header">
								<h6 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this?</h6>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
								
								<button class="btn btn-danger">
									<a href="delete.php?id=<?php echo $rows['id']; ?>">Yes
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
						$res1 = mysqli_query($connection, "SELECT * FROM students");
						$count = mysqli_num_rows($res1);
						$a = $count/5;
						$a = ceil($a);
						for ($b=1; $b<=$a; $b++) { ?>
							<li class="page-item"><a class="page-link" 
							href="student-module.php?page=<?php echo $b ." " ;?>"><?php echo $b; ?></a>
							</li>
						
						<?php
						}
						?>
				  </ul>
				</nav>

			</form>
			<!--END OF FORM -->
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
        </script>

    </body>
</html>
      