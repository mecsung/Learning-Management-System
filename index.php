<?php
	require_once 'controllers/authController.php';
?>

<!DCTYPE HTML>
<html>
<head>
	<title> Login </title>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	
	<link rel="icon" type="image/x-icon" href="styles/favicon.ico"/>
	<!-- CUSTOM STYLESHEET -->
	<link rel="stylesheet" href="styles/style.css">
	<!-- FONT AWESOME -->
	<script src="https://kit.fontawesome.com/575abfd474.js" crossorigin="anonymous"></script>
	<!-- BOOTSTRAP -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>

<div class="container">
	<form action="index.php" method="POST">
		<div class="box">
			<!-- Left side -->
			<div class="left">
				<div class="name">
					<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
						<div class="carousel-indicators">
							<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
							<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
							<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
						</div>
						<div class="carousel-inner">
							<div class="carousel-item active">
								<img src="https://www.harvardmagazine.com/sites/default/files/img/article/0720/harvardyard.jpg" height="100%" style="filter: brightness(80%);">
								<div class="carousel-caption d-none d-md-block">
									<h5>Register Now!</h5>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>
							</div>
							<div class="carousel-item">
								<img src="https://www.bostonmagazine.com/wp-content/uploads/sites/2/2014/09/HBS.jpg" height="100%" style="filter: brightness(50%);">
								<div class="carousel-caption d-none d-md-block">
									<h5>Why Harvard University?</h5>
									<p>Lorem Ipsum is simply dummy text of the printing and 
									typesetting industry.</p>
								</div>
							</div>
							<div class="carousel-item">
								  <img src="https://image.cnbcfm.com/api/v1/image/103932551-GettyImages-94953697.jpg?v=1630264559" height="100%" style="filter: brightness(50%);">
								  <div class="carousel-caption d-none d-md-block">
									<h5>Courses we have.</h5>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
								</div>
							</div>
						</div>
						
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div>
			</div>
			
			<!-- Right side -->
			<div class="right">
				<div class="form">
					<img src="logo.png" width="60px" height="60px">
					<h1><b>Harvard University</h1></b>
					<p><b>Information System</b></p>
					<p>
					<p><i>Harvard University is a private Ivy League research university in 
					Cambridge, Massachusetts. Founded in 1636 as Harvard College and named for 
					its first benefactor, the Puritan clergyman John Harvard, it is the oldest 
					institution of higher learning in the United States and among the most 
					prestigious in the world. </i></p>
					
					<!-- LOGIN MODULE -->
					Login
					<form action="index.php" method="POST">
						<div class="inputs">
							<i class="fas fa-user" fa-2x cust></i>
							<input type="text" name="username" class="form-control" placeholder="username or email">
							<i class="fas fa-lock"></i>
							<input type="password" name="password" class="form-control" placeholder="password">
						</div>
						<button type="submit" name="login" class="btn btn-Warning">LOGIN</button>
					</form>
					
					<!-- DISPLAY ERRORS -->
					<div class="alert">
						<?php if (count($errors) > 0): ?>
							<div class="alert alert-danger">
								<?php foreach ($errors as $error): ?>
									<li><?php echo $error; ?></li>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>




</body>
</html>