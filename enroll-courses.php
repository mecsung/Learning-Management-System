<?php
	require_once 'controllers/authController.php';
	require 'controllers/accessController.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title> Student Courses </title>
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
		.wrapper .content .enroll-course .student-records .enroll1 {
			border-bottom: 1px solid grey;
			width: 100%;
			margin-bottom: 10px;
			padding: 10px;
		}
		.wrapper .content .enroll-course .student-records .enroll1 button {
			float: right;
			width: 150px;
		}
		.wrapper .content .enroll-course .student-records .enroll1 label {
			font-size: 14px;
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
					<p>Student Module / View Student / Student Academic Records / Student Courses </p>
				</div>
				<hr></hr>
				<form action="enroll-courses.php" method="POST">
					<?php
						$id = $_GET['id'];
						$year_term = $_GET['yt_id'];

						error_reporting(E_ERROR | E_PARSE);
						$res = mysqli_query ($connection, "SELECT * FROM students WHERE id='$id'");
						while ($row = mysqli_fetch_array($res))
						{
							$id = $row['id'];
							$idnum = $row['idnum'];
							$fname = $row['fname'];
							$mname = $row['mname'];
							$lname = $row['lname'];
							$entlev = $row['entlev'];
							$name = strtoupper($lname) .", ". $fname ." ". substr($mname, 0, 1) . ".";
						}
						
						$results = mysqli_query ($connection, "SELECT * FROM studentRecords where idnum='$idnum' ");
						while ($rows = mysqli_fetch_array($results))
						{
							$term = $rows['term'];
							$enroll_date = $rows['enroll_date'];
							$program = $rows['program'];
							$class = $rows['class'];
							
						}

						$ay = mysqli_query ($connection, "SELECT * FROM studentRecords where idnum='$idnum' ");
						while ($rows = mysqli_fetch_array($ay))
						{
							$term = $rows['term'];
							$enroll_date = $rows['enroll_date'];
							$program = $rows['program'];
							$class = $rows['class'];

							$expr = '/(?<=\s|^)[A-Z]/';
							preg_match_all($expr, $program, $matches);    
							$rprogram = implode('', $matches[0]);
							
						}
						
					?>
					<div class="error-handling">
						<!-- DISPLAY ERRORS -->
						<?php if (count($errors) > 0 ): ?>
							<?php if (count($errors) == 11): ?>
								<div class="">
									<?php
										echo "<br>The following error(s) occurred:<p>";
										echo "All fields must be fileld out<br><br>";
									?>
								</div>
										
							<?php else: ?>
								<div class="">
									<?php
										echo "<br>The following error(s) occurred:<p>";
										foreach ($errors as $error):
									?>
									<li><?php echo $error; ?></li>
										<?php endforeach; echo "<br>"; ?>
								</div>
							<?php endif; ?>
						<?php endif; ?>
					</div>
								
					<div class="back-btn">
						<a style="text-decoration: none;" href="student-records.php?id=<?php echo $id; ?>">
							<button type="button" class="btn btn-danger">Back 
								<i class="fas fa-backspace"></i>
							</button>
						</a>

						<button type="submit" class="btn btn-success" name="print-grades">
							<a style="text-decoration: none; color: white;" href="PrintCOR-student.php?id=<?php echo $idnum; ?>" 
								target="_blank">Print Grades
								<i class="fas fa-file-download"></i>
							</a>
						</button>
					</div>
			
					<!-- REGISTRATION FORM -->
					<div class="enroll-course">
						<h4>Enrolled Courses by the Student</h4>
						<hr></hr>
						
						<div class="student-records">
							<div class="enroll1">
								<label>
								<b>ID Number: </b><?php echo $idnum;?><br>
								<b>Name: </b><?php echo $name;?><br>
								<b>Program/Class: </b>
								<?php echo $rprogram . " - " . $class;?><br>

								<b>Year/Term: </b><?php echo $year_term;?>
								</label>
								<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#enrollCourseModal">Assign Course
									<i class="fas fa-plus"></i>
								</button>
							</div>
							
							<div class="enroll2">
							<div class="table">
								<table class="table table-striped">
									<thead>
									<tr>
										<th> Courses 		</th>
										<th> Interim 1		</th>
										<th> Midterm		</th>
										<th> Interim 2		</th>
										<th> Final			</th>
										<th> Grade			</th>
										<th> Remarks		</th>
									</tr>
									</thead>

									<tbody>
										<?php
										error_reporting(E_ERROR | E_PARSE);
										$year_term = $_GET['yt_id'];
										
										$sql = mysqli_query($connection, "SELECT * FROM course_enrolled WHERE idnum='$idnum' AND
											year_term='$year_term' ");
										while ($res = mysqli_fetch_array($sql)) {?>
											<tr>
												<td><?php echo $res['course']; ?></td>
												<td><i><?php 
													if ($res['Interim1'] == NULL) {
														echo "No grade yet";
													}
													else {
														echo $res['Interim1']; 
													}
												?></i></td>
												<td><i><?php
													if ($res['Midterm'] == NULL) {
														echo "No grade yet";
													}
													else {
														echo $res['Midterm']; 
													}
												?></i></td>
												<td><i><?php
													if ($res['Interim2'] == NULL) {
														echo "No grade yet";
													}
													else {
														echo $res['Interim2']; 
													}
												?></i></td>
												<td><i><?php
													if ($res['Final'] == NULL) {
														echo "No grade yet";
													}
													else {
														echo $res['Final']; 
													}
												?></i></td>
												<td><i><?php
													if ($res['Grade'] == NULL) {
														echo "No grade yet";
													}
													else {
														echo $res['Grade']; 
													}
												?></i></td>
												<td><i><?php
													if ($res['Remarks'] == NULL) {
														echo "No grade yet";
													}
													else {
														echo $res['Remarks']; 
													}
												?></i></td>
											</tr>
										<?php }
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</form>

				<form id="enrollcourseSelect" action="enroll-courses.php" method="POST">
					<!-- Enroll Course Modal -->
					<div class="modal fade" id="enrollCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="exampleModalLabel">List of Course</h4>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<input hidden name="id" value="<?php echo $id; ?>" >
									<input hidden name="idnum" value="<?php echo $idnum; ?>" >
									<input hidden name="fullname" value="<?php echo $name; ?>" >
									<input hidden name="year_term" value="<?php echo $entlev . " ". $term; ?>" >
									<input hidden name="program_class" value="<?php echo $rprogram . 
									$class; ?>" >
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
									
									<button type="submit" name="courseSelect" class="btn btn-danger">
										<i class="fas fa-sign-out-alt"></i>Assign Selected
									</button>
								</div>
							</div>
						</div>
					</div>
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

		$(document).ready(function(){
			$("#enrollcourseSelect #select-all").click(function(){
                $("#enrollcourseSelect input[type='checkbox']").prop('checked', this.checked);
            });
        });
        </script>

    </body>
</html>
      