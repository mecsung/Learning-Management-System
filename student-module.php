<?php
	require_once 'controllers/authController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title> Student </title>
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
					<p>Student Module / </p>
				</div>
				
				<hr></hr>
			
			<!--START OF FORM -->
			<form action="student-module.php" method="POST">
			
				<div class="search-box">
					<input type="text" name="search" class="search-box" placeholder="Type to search...">
					<button>
                        <i class="fas fa-search"></i>
					</button>
				</div>
				
				<h3>Student List</h3>
				
				<div class="button-enroll">
					<button type="submit" name="add" class="btn btn-danger">Enroll Student
						<i class="fas fa-user-plus"></i>
					</button>
					
					<button type="submit" class="btn btn-success">Download PDF
						<i class="fas fa-file-download"></i>
					</button>
				</div>
				
				<div class="table">
					<table class="table table-bordered">
						<thead>
						<tr>
							<th> Student no.  		</th>
							<th> Name				</th>
							<th> Program & Class	</th>
							<th> Year				</th>
							<th> Action				</th>
						</tr>
						</thead>
						<tbody>
					
					<?php
						error_reporting(E_ERROR | E_PARSE);
						
						$result = mysqli_query ($connection, "SELECT * FROM students");
						while ($rows = mysqli_fetch_array($result))
					{ ?>
						<tr>
							<td> <?php echo $rows['idnum']; ?> 	</td>
							<td>
								<a href="view-student.php?id=<?php echo $rows['id']; ?>">
									<?php echo $rows['fname'] ." ". substr($rows['mname'], 0, 1) .". ". $rows['lname']; ?> 
								</a>
							</td>
							<td> <?php echo $rows['program'] ." - ". $rows['class']; ?> </td>
							<td> <?php echo $rows['entlev']; ?> 						</td>
							<td>
								<a href="Delete.php?id=<?php echo $rows['id']; ?>" onclick="return checkdelete()">
									<i class="fas fa-trash-alt" aria-hidden="true" style="color: black;"></i>
								</a>
								
							</td>
						</tr>
					<?php }
						
						?>
					</table>
				</div>
				
				<div class="showEntry">
					<p>Showing
					<input type="text" class="entry-box" name="entry" size="1px">
					of 1 entries</p>
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
      