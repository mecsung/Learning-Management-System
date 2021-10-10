<?php
	require_once 'controllers/authController.php';
	require 'controllers/accessController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title> Dashboard </title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
	
		<link rel="icon" type="image/x-icon" href="styles/favicon.ico"/>
		
		<!-- CUSTOM STYLESHEET -->
        <link rel="stylesheet" href="admin-dashboard.css">
		
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
		<!-- FONT ASWESOME -->
		<script src="https://kit.fontawesome.com/575abfd474.js" crossorigin="anonymous"></script>
		<!-- BOOTSRAP -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<style>
		.wrapper .content .sy {
			height: 40px;
			background: #FFF;
			border-radius: 0.5em;
			margin-bottom: 15px;
		}
		.wrapper .content .sy label {
			padding: 10px;
			font-size: 12px;
		}
		.wrapper .content .sy select {
			font-size: 12px;
			border: none;
			padding: 0px;
		}
		.wrapper .content .sy label:hover {
			color: red;
			cursor: pointer;
		}
		.wrapper .content .sy button {
			background: #FFF;
			border: none;
			transition: all ease-in-out 0.2s;
			cursor: pointer;
		}
		.wrapper .content .sy button:hover {
			color: red;
			font-size: 20px;
		}
		.wrapper .content .sy span {
			float: right;
			margin-right: 20px;
		}
		.wrapper {
			background: #F1F1F1;
		}
		.wrapper .content .objects .rows {
			display: flex;
			flex-direction: row;
			margin-bottom: 15px;
		}
		.wrapper .content .objects .rows label {
			font-size: 14px;
			float: center;
			margin-right: 30px;
			margin-top: 12px;
			padding: 10px;
			float: left;
		}
		.wrapper .content .objects .rows i {
			font-size: 35px;
			padding: 16px;
		}
		.wrapper .content .objects .rows button {
			border: none;
		}
		.wrapper .content .objects .rows button:hover {
			cursor: pointer;
			transition: all ease-in-out 0.2s;
			box-shadow: 0 10px 10px rgba(0, 0, 0, 0.3);
		}
		.wrapper .content .objects .rows .col-1{
			width: 24%;
			height: 70px;
			background: #FFF;
			border-left: 12px solid green;
			border-radius: 0.5em;
			margin-right: 15px;
		}
		.wrapper .content .objects .rows .col-1 i {
			float: left;
			color: green;
		}
		.wrapper .content .objects .rows .col-2{
			width: 24%;
			height: 70px;
			background: #FFF;
			border-left: 12px solid blue;
			border-radius: 0.5em;
			margin-right: 15px;
		}
		.wrapper .content .objects .rows .col-2 i {
			float: left;
			color: blue;
		}
		.wrapper .content .objects .rows .col-3{
			width: 24%;
			height: 70px;
			background: #FFF;
			border-left: 12px solid orange;
			border-radius: 0.5em;
			margin-right: 15px;
		}
		.wrapper .content .objects .rows .col-3 i {
			float: left;
			color: orange;
		}
		.wrapper .content .objects .rows .col-4{
			width: 24%;
			height: 70px;
			background: #FFF;
			border-left: 12px solid red;
			border-radius: 0.5em;
		}
		.wrapper .content .objects .rows .col-4 i {
			float: left;
			color: red;
		}
		.wrapper .content .outer .inner {
			display: flex;
			flex-direction: row;
			margin-bottom: 15px;
		}
		.announcements {
			margin-right: 20px;
			background: #FFF;
			width: 100%;
			padding: 20px;
		}
		.announcements label {
			border-bottom: 1px solid #DCDCDC;
			padding: 10px;
			margin-bottom: 10px;
			font-size: 12px;
		}
		.announcements button {
			border: 1px solid green;
			background: none;
			border-radius: 2em;
			width: 80px;
			height: 35px;
			float: right;
		}
		.announcements button:hover {
			color: #FFF;
			background: green;
			transition: all ease-in-out 0.2s;
		}
		.announcements input:hover {
			border: 1px solid green;
		}
		.announcements .save {
			border-radius: 0em;
			border: none;
			width: 50px;
			height: 38px;
			position: absolute;
			margin-left: 440px;
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
                            <span><i class="fas fa-desktop"></i>Dashboard</span>
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
					<p>Dashboard / </p>
				</div>
				<hr></hr>

				<?php date_default_timezone_set('Asia/Manila'); ?>
				<div class="sy">
					<label>Today is <?php echo date("F j\, Y "	); ?></label>
					<span>
						<label>School Year</label>
						<label title="current school year">
						<?php
							$sql = mysqli_query ($connection, "SELECT * FROM academic_year ORDER BY id DESC LIMIT 1");
							while ($r = mysqli_fetch_array($sql)) {
								$sdate = $r['start_date'];
								$edate = $r['end_date'];
							}
							echo $sdate ." to ". $edate;
						?>
						</label>
						<button title="create new school year" type="button" data-bs-toggle="modal" 
						data-bs-target="#addSY">
						<i class="fas fa-layer-group"></i>
						</button>	
					</span>
				</div>
				<div class="objects">
					<div class="rows">
						<button class="col-1">
							<i class="fas fa-user-circle"></i>
								<label>Admin</label>
								<label>
									<?php 
										$result = mysqli_query ($connection, "SELECT * FROM users WHERE acctype='admin' ");
										$rowcount=mysqli_num_rows($result);
										printf($rowcount);
									?>
								</label>
						</button>
						<button class="col-2">
							<i class="fas fa-chalkboard-teacher"></i>
							<label>Faculty</label>
							<label>
								<?php 
									$result = mysqli_query ($connection, "SELECT * FROM faculty");
									$rowcount=mysqli_num_rows($result);
									printf($rowcount);
								?>
							</label>
						</button>
						<button class="col-3">
							<i class="fas fa-graduation-cap"></i>
							<label>Student</label>
							<label>
								<?php 
									$result = mysqli_query ($connection, "SELECT * FROM students");
									$rowcount=mysqli_num_rows($result);
									printf($rowcount);
								?>
							</label>
						</button>
						<button class="col-4">
							<i class="fas fa-landmark"></i>
							<label>Courses</label>
							<label>
								<?php 
									$result = mysqli_query ($connection, "SELECT * FROM courses");
									$rowcount=mysqli_num_rows($result);
									printf($rowcount);
								?>
							</label>
						</button>
					</div>
				</div>
				<div class="outer">
					<div class="inner">
						<div class="announcements">
							<h5>Announcements</h5>
							<form action="admin-dashboard.php" method="POST">
								<button type="submit" name="announcce-btn" class="save">
									<i class="fas fa-plus"></i>
								</button>
								<input type="text" name="announcement" class="form-control" placeholder="type here...">

								<?php
									error_reporting(E_ERROR | E_PARSE);
												
									$result = mysqli_query ($connection, "SELECT * FROM announcements");
									while ($rows = mysqli_fetch_array($result)) { ?>
									<label><?php echo 
											  $rows['post_date'] . " | " 
											. $rows['announcement'] . " | <span style='color: blue;'>" 
											. $rows['admin_name'] ."</span>"; ?></label>
									<br>
								<?php }
								?>
								<button type="submit">View All</button>
							</form>
						</div>

						<div class="piediv">
							<div class="piechart" id="piechart_3d"></div>
						</div>
					</div>
				</dov>
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
		<div class="modal fade" id="addSY" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Create New Academic Year</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  
				<form action="admin-dashboard.php" method="POST">
					<div class="modal-body">
						<label>Academic Year: </label><br>
						<?php 
						date_default_timezone_set('Asia/Manila');
						$ay = date("Y-n-j");
						?>
						<input style="border: 1px solid green; width: 100px; text-align: center;" 
						type="text" name="school_year" value='<?php echo $ay; ?>' readonly> - 
						<input type="date" name="schoolyear">
					</div>

					<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					
					<button type="submit" name="add-ay" class="btn btn-danger">Confirm
						<i class="fas fa-layer-group"></i>
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

		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.js"></script>
		
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
        
		<script type="text/javascript">
        $(document).ready(function(){
            $(".sidebar-btn").click(function(){
                $(".wrapper").toggleClass("collapse");
            });
        });
        </script>
		
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
		  google.charts.load("current", {packages:["corechart"]});
		  google.charts.setOnLoadCallback(drawChart);
		  function drawChart() {
			var data = google.visualization.arrayToDataTable([
				<?php
					$res = mysqli_query($connection, "SELECT * FROM students");
					$count = mysqli_num_rows($res);
					
					$first = mysqli_query($connection, "SELECT * FROM students WHERE entlev='1st Year'");
					$c_first = mysqli_num_rows($first);
					
					$second = mysqli_query($connection, "SELECT * FROM students WHERE entlev='2nd Year'");
					$c_second = mysqli_num_rows($second);
					
					$third = mysqli_query($connection, "SELECT * FROM students WHERE entlev='3rd Year'");
					$c_third = mysqli_num_rows($third);
					
					$fourth = mysqli_query($connection, "SELECT * FROM students WHERE entlev='4th Year'");
					$c_fourth = mysqli_num_rows($fourth);
				?>
				['Task', 'Hours per Day'],
				['1st Year',	<?php echo $c_first; ?>],
				['2nd Year',  	<?php echo $c_second; ?>],
				['3rd Year', 	<?php echo $c_third; ?>],
				['4th Year',    <?php echo $c_fourth; ?>]
			]);
		
			var options = {
				title: 'Student Population',
				width: 500,
				height: 300,
				bar: {groupWidth: "95%"},
				is3D: true,
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
			chart.draw(data, options);
		  }
		</script>
    </body>
</html>