<?php
	require_once 'controllers/authController.php';
	require_once 'FPDF/fpdf.php';
	
	$sql = "SELECT * FROM students";
	$data = mysqli_query($connection, $sql);
	
	
	//******************** DOWNLOAD PDF BUTTON *******************************
	class PDF extends FPDF
	{
		// Page header
		function Header()
		{
			// Logo
			$this->Image('logo.png',15,10,20);
			// Font
			$this->SetFont('Arial','B',22);
			// Move to the right
			$this->Cell(30);
			// Title
			$this->Cell(30,10,'Harvard University',0,0);
			// Font
			$this->SetFont('Arial','',10);
			// Move to the right
			$this->Cell(200);
			// SY
			$this->Cell(30,10,'SY : ' .  date("Y"),0,1);
				
			// Font
			$this->SetFont('Arial','',15);
			// Move to the right
			$this->Cell(30);
			// Sub Title
			$this->Cell(30,10,'Student List Record',0,0);
			// Font
			$this->SetFont('Arial','',10);
			// Move to the right
			$this->Cell(200);
			// Admin
			$this->Cell(30,10,'Admin : ' . $_SESSION['email'],0,1);
			// Font
			$this->SetFont('Arial','',10);
			// Move to the right
			$this->Cell(260);
			// Date
			$this->Cell(30,10,'Date : ' . date("F j\, Y"),0,0);
				
			// Line break
			$this->Ln(20);
		}
		// Page footer
		function Footer()
		{
				// Position at 1.5 cm from bottom
				$this->SetY(-15);
				// Arial italic 8
				$this->SetFont('Arial','I',8);
				// Page number
				$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
		}
	}
		
	$pdf = new PDF('L','mm','Legal');
	$pdf->SetFont('Arial','B',10);
	$pdf->AddPage();
	$pdf->Cell(30,10,'ID number',1,0,'C');
	$pdf->Cell(60,10,'Name',1,0,'C');
	$pdf->Cell(60,10,'Reg. Date',1,0,'C');
	$pdf->Cell(60,10,'Email',1,0,'C');
	$pdf->Cell(30,10,'Level',1,0,'C');
	$pdf->Cell(70,10,'Program and Class',1,0,'C');
	$pdf->Cell(30,10,'Term',1,1,'C');
		
		
	while($row = mysqli_fetch_assoc($data))
	{
		$name = strtoupper($row['lname']) .", ".$row['fname'] .", ". substr($row['mname'], 0, 1) .".";
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(30,10,$row['idnum'],1,0,'C');
		$pdf->Cell(60,10,$name,1,0,'C');
		$pdf->Cell(60,10,$row['reg_date'],1,0,'C');
		$pdf->Cell(60,10,$row['email'],1,0,'C');
		$pdf->Cell(30,10,$row['entlev'],1,0,'C');
		$pdf->Cell(70,10,$row['program'] . " - " .$row['class'],1,0,'C');
		$pdf->Cell(30,10,$row['term'],1,1,'C');
	}
	$pdf->Output();
?>