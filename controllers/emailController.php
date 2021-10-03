<?php
	
	require_once 'vendor/autoload.php';
	require_once 'config/constants.php';

	// Create the Transport
	$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
		->setUsername('aobajohsaiacademy101@gmail.com')
		->setPassword('aobajohsai101');

	// Create the Mailer using your created Transport
	$mailer = new Swift_Mailer($transport);

	function sendVerificationEmail($userEmail, $token, $OTP)
	{
		global $mailer;
		
		$body = '<!DCTYPE HTML>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Verify email</title>
		</head>
		<body>
			<div class="wrapper">
			<p>
				Thank you for signing up on our website.
				Your verification code is ' . $OTP . ' .
				Please click on the link below
				to verify your email.
			</p>
			<a href="localhost/LegaspiInformationSecurity/Prototype3/#.php?token=' . $token . '">
				Verify your email address
			</a>
			</div>
			
		</body>
		</html>';
	
		// Create a message
		$message = (new Swift_Message('Verify your email address'))
			->setFrom(EMAIL)
			->setTo($userEmail)
			->setBody($body, 'text/html');

		// Send the message
		$result = $mailer->send($message);
	}

	//************* SEND VERIFICATION CODE FOR ADMIN *********************/
	function SendCode($email, $OTP) {
		global $mailer;
		
		$body = '<!DCTYPE HTML>
		<html lang="en">
		<head>
			<meta charset="UTF-8">
			<title>Verify email</title>
		</head>
		<body>
			<div class="wrapper">
			<p>
				Welcome new Admin.
				Your verification code is ' . $OTP . '
			</div>
			
		</body>
		</html>';
	
		// Create a message
		$message = (new Swift_Message('Verification Code for new Admin'))
			->setFrom(EMAIL)
			->setTo($email)
			->setBody($body, 'text/html');

		// Send the message
		$result = $mailer->send($message);
	}





	function sendPasswordResetLink($userEmail, $token) {
		global $mailer;
		
		$body = '<!DCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Verify email</title>
</head>
<body>
	<div class="wrapper">
	<p>
		Hello there,
		
		Please click on the link below to reset your password.
	</p>
	<a href="localhost/LegaspiInformationSecurity/Prototype3/landing-page.php?password-token=' . $token . '">
		Reset your password
	</a>
	</div>
	
</body>
</html>';
	
		// Create a message
		$message = (new Swift_Message('Reset your password'))
			->setFrom(EMAIL)
			->setTo($userEmail)
			->setBody($body, 'text/html');

		// Send the message
		$result = $mailer->send($message);
	}


























?>