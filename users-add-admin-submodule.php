<?php
	require_once 'controllers/authController.php';
    require 'controllers/accessController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title> Users </title>
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

    <style>
        .wrapper .content .list-1 .list {
            float: right;
        }
        .wrapper .content .hr {
           margin-top: 42px;
        }
        .wrapper .content .list-1 .list button {
            border: none;
            background: none;
            color: #000;
            border-radius: 0em;
            padding: 6px;
            margin-left: 25px;
        }
        .wrapper .content .list-1 .list span button {
            border: none;
            background: none;
            color: red;
            border-radius: 0em;
            padding: 6px;
            margin-left: 25px;
        }
        .wrapper .content .list-1 .list button:hover {
            color: red;
            border-bottom: 1px solid red;
            transition: width 0.3s ease 0s, left 0.3s ease 0s;
        }
        .modal .modal-dialog .modal-content .modal-body .body{
            padding: 20px;
            margin-left: 50px;
        }
        .modal .modal-dialog .modal-content .modal-body .body button{
            margin-top: 10px;
            font-size: 14px;
            width: 300px;
        }
        .modal .modal-dialog .modal-content .modal-body .body input{
            border: 1px solid black;
        }
        .modal .modal-dialog .modal-content .modal-body .body input:hover {
            border: 1px solid red;
        }
        .wrapper .content .admin-1 .admin-2 .admin-form {
            padding: 10px;
            height: 400px;
        }
        .wrapper .content .admin-1 .admin-2 .admin-form label {
            font-size: 14px;
        }
        .wrapper .content .admin-1 .admin-2 .admin-form input {
            padding: 20px;
            height: 40px;
            width: 250px;
            border: 1px solid #DCDCDC;
            border-radius: 2em;
        }
        .wrapper .content .admin-1 .admin-2 .admin-form input:hover {
            border: 1px solid red;
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
                            <span><i class="fas fa-users-cog"></i>Users</span>
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
					<p>Users Module / Add New Admin</p>
				</div>
				
				<hr></hr>
				<h3>Add New Admin</h3>
                <div class="list-1">
                    <div class="list">
                        <a href="users-module.php" style="text-decoration: none;">
                            <button type="button" name="" class="btn btn-danger">List Preview
                                <i class="fas fa-list"></i>
                            </button>
                        </a>
                        <button type="submit" name="" class="btn btn-danger">Settings
                            <i class="fas fa-cog"></i>
                        </button>
                        <span>
                            <button type="button"data-bs-toggle="modal" data-bs-target="#sudoMode">Add Admin
                                <i class="fas fa-user-plus"></i>
                            </button>
                        </span>
                        
                    </div>
                </div>
                <div class="hr">
                    <hr></hr>
                </div>            

                <div class="admin-1">
                    <div class="admin-2">
                        <div class="admin-form">
                            <form action="users-add-admin-submodule.php" method="POST">
                                <!-- FIRST NAME -->
                                <label>First Name:</label><br>
                                <input type="text" name="fname" value="<?php echo $fname; ?>" class="form-input"
                                placeholder="First name" maxlength="20" minlength="2">
                                <br>
                                <label>Middle Name:</label><br>
                                <!-- MIDDLE NAME -->
                                <input type="text" name="mname" value="<?php echo $mname; ?>" class="form-input"
                                placeholder="Middle name" maxlength="20" minlength="2">
                                <br>
                                <label>Last Name:</label><br>
                                <!-- LAST NAME -->
                                <input type="text" name="lname" value="<?php echo $lname; ?>" class="form-input"
                                placeholder="Last name" maxlength="20" minlength="2">
                                <br>
                                <label>Email:</label><br>
                                <!-- EMAIL -->
                                <input type="text" name="email" value="<?php echo $email; ?>" class="form-input"
                                placeholder="Email" maxlength="50" minlength="2">
                                <br>
                                <label>Password:</label><br>
                                <!-- PASSWORD -->
                                <input type="password" name="pass" value="<?php echo $pass; ?>" class="form-input"
                                placeholder="password" maxlength="50" minlength="2">
                                <br>
                                <label>Confirm Password:</label><br>
                                <!-- CONFIRM PASSWORD -->
                                <input type="password" name="passConf" value="<?php echo $pass; ?>" class="form-input"
                                placeholder="confirm password" maxlength="50" minlength="2">
                                <br><br>
                                <button type="submit" name="addNewAdmin" class="btn btn-danger">Add New Admin
                                    <i class="fas fa-list"></i>
                                </button>
                                <?php
                                    foreach ($errors as $error) {
                                        echo $error;
                                    }
                                ?>
                            </form>
                            
                        </div>
                    </div>
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

        <!-- Sudo Mode Modal -->
        <div class="modal fade" id="sudoMode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Access</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form action="users-module.php" method="POST" class="sudoMode">
                        <div class="modal-body">
                            <div class="body">
                                <label>Password: </label><br>
                                <input type="password" name="password">
                                <br>
                                
                                <button type="submit" name="sudoPassword" class="btn btn-danger">Confrim password
                                    <i class="fas fa-sign-in-alt"></i>
                                </button>
                                <br>
                            </div>
                            <hr></hr>
                            <center>
                                <label>
                                    Kindly confirm your password to proceed.
                                </label>
                            </center>
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
      