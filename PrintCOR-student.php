<?php
	require_once 'controllers/authController.php';
	require_once 'FPDF/fpdf.php';
	
	$id = $_GET['id'];
	$data = mysqli_query ($connection, "SELECT * FROM course_enrolled WHERE idnum='$id'");
	$student = mysqli_query ($connection, "SELECT * FROM course_enrolled WHERE idnum='$id'");
	
	
	//******************** DOWNLOAD PDF BUTTON *******************************
	class PDF extends FPDF
	{
		// Page header
		function Header()
		{
			// Logo
			$this->Image('styles/logo.png',15,10,20);
			// Font
			$this->SetFont('Arial','B',22);
			// Move to the right
			$this->Cell(30);
			// Title
			$this->Cell(30,10,'Aoba Johsai Academy',0,0);
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
			$this->Cell(30,10,'Course List Record',0,0);
			// Font
			$this->SetFont('Arial','',10);
			// Move to the right
			$this->Cell(200);
			// Admin
			$this->Cell(30,10,'Admin : ' . $_SESSION['username'],0,1);
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
	$pdf->SetFont('Arial','',10);
	$pdf->AddPage();

	while($row = mysqli_fetch_assoc($student))
	{
		$idnum = $row['idnum'];
		$fullname = $row['fullname'];
		$year_term = $row['year_term'];
		$program_class = $row['program_class'];

	}

	$pdf->Cell(40,10,'ID Number : ',0,0);
	$pdf->Cell(30,10,$idnum,0,1);
	$pdf->Cell(40,10,'Student Name : ',0,0);
	$pdf->Cell(30,10,$fullname,0,1);
	$pdf->Cell(40,10,'Program and Class : ',0,0);
	$pdf->Cell(30,10,$program_class,0,1);
	$pdf->Cell(40,10,'Year & Term : ',0,0);
	$pdf->Cell(30,10,$year_term,0,1);
	

	$pdf->Cell(100,10,'Course Name',1,0,'C');
	$pdf->Cell(40,10,'Interim 1',1,0,'C');
	$pdf->Cell(40,10,'Midterm',1,0,'C');
	$pdf->Cell(40,10,'Interim 2',1,0,'C');
	$pdf->Cell(40,10,'Final',1,0,'C');
	$pdf->Cell(40,10,'Grade',1,0,'C');
	$pdf->Cell(40,10,'Remarks',1,1,'C');
		
	while($res = mysqli_fetch_assoc($data))
	{
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(100,10,$res['course'],1,0,'C');
		$pdf->Cell(40,10,$res['Interim1'],1,0,'C');
		$pdf->Cell(40,10,$res['Midterm'],1,0,'C');
		$pdf->Cell(40,10,$res['Interim2'],1,0,'C');
		$pdf->Cell(40,10,$res['Final'],1,0,'C');
		$pdf->Cell(40,10,$res['Grade'],1,0,'C');
		$pdf->Cell(40,10,$res['Remarks'],1,1,'C');
	}
	$pdf->Output();
?>