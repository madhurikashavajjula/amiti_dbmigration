<?php 
include_once 'config/database.php';
include_once "model/db.php";
include('pdf_mc_table.php');
//$data = json_decode(file_get_contents("php://input"));
//make new object
$pdfData=$_GET['prescription'];
$data = json_decode($pdfData);
//var_dump($data);
$current_date=date("d/m/Y");
$current_time=date("h:i:sa");
foreach($data as $item){
$patient_name=$item->patient_name;
$patient_age=$item->patient_age;
$patient_weight=$item->patient_weight;
$patient_height=$item->patient_height;
$patient_temp=$item->patient_temp;


//echo "name".$patient_name;
}
$pdf = new PDF_MC_Table();


//add page, set font
$pdf->AddPage();
$pdf->SetFont('Arial','',14);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(140, 5, 'Dr. M. Suresh Kumar MD DPM MPH(USA)', 0, 0);

$pdf->Cell(100, 5, 'Consultation', 0, 1);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(140, 5, 'Consultant Psychiatrist', 0, 0);


$pdf->Cell(100, 5, '24/36, Thanikachalam Road', 0, 1);
$pdf->Cell(140, 5, '', 0, 0);
$pdf->Cell(100, 5, 'B/2, Ground Floor, ', 0, 1);
$pdf->Cell(140, 5, '', 0, 0);
$pdf->Cell(100, 5, 'Silver Park Apartments,', 0, 1);
$pdf->Cell(140, 5, '', 0, 0);
$pdf->Cell(100, 5, 'T. Nagar, Chennai-600017', 0, 1);
$pdf->Cell(140, 5, '', 0, 0);
$pdf->Cell(100, 5, 'Tel. No: +91 4424328979', 0, 1);
$pdf->SetFont('Arial','U',8);
$pdf->SetTextColor(0,0,255);

$pdf->Cell(140, 5, '', 0, 0);

$pdf->Cell(100, 5, 'msuresh1955@gmail.com', 0, 1);
$pdf->Cell(140, 5, '', 0, 0);
$pdf->Cell(100, 5, 'www.drmsureshkumar.com', 0, 1);

$pdf->Line(10, 55, 200, 55);
$pdf->Ln(10);
$pdf->SetFont('Arial','B',8);
$pdf->SetTextColor(0,0,0);

$pdf->Cell(165, 5,'' , 0, 0);
$pdf->Image('assets/rximg.png',10,60,-300);
$pdf->Cell(10, 5, 'Date:', 0, 0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(0, 5, $current_date, 0, 1);
$pdf->Cell(165, 5, '', 0, 0);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(10, 5, 'Time:', 0, 0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(0, 5, $current_time, 0, 1);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);

$pdf->Cell(50	,5,'NAME',0,0);
$pdf->Cell(45	,5,'AGE',0,0);
$pdf->Cell(40	,5,'WT.(IN KG)',0,0);
$pdf->Cell(35	,5,'HEIGHT(IN CM)',0,0);
$pdf->Cell(35	,5,'TEMP(IN F)',0,1);

$pdf->Line(10, 80, 200, 80);
$pdf->SetFont('Arial','',8);


$pdf->Ln(2);
$pdf->Cell(50	,5,$patient_name,0,0);
$pdf->Cell(45	,5,$patient_age,0,0);
$pdf->Cell(40	,5,$patient_weight,0,0);
$pdf->Cell(35	,5,$patient_height,0,0);
$pdf->Cell(35	,5,$patient_temp,0,0);

$pdf->Ln(10);//Line break
$pdf->Cell(150, 5, 'POST NASAL DRIP', 0, 0);
$pdf->Ln(10);

//set width for each column (7 columns)
$pdf->SetWidths(Array(50,30,20,20,20,30,30));

//set alignment
//$pdf->SetAligns(Array('','R','C','','',''));

//set line height. This is the height of each lines, not rows.
$pdf->SetLineHeight(5);

//load json data
//$json = file_get_contents('MOCK_DATA.json');
//$data = json_decode($json,true);

//add table heading using standard cells
//set font to bold
$pdf->SetFont('Arial','B',8);
$pdf->Cell(50	,5,'TABLET NAME',0,0);
$pdf->Cell(30	,5,'QUANTITY',0,0);
$pdf->Cell(20	,5,'BREAKFAST',0,0);
$pdf->Cell(20	,5,'LUNCH',0,0);
$pdf->Cell(20	,5,'SUPPER',0,0);
$pdf->Cell(30	,5,'INTAKE',0,0);
$pdf->Cell(30	,5,'NO OF DAYS',0,1);
//end of line
$pdf->Line(10, 107, 200, 107);
$pdf->Ln();

//reset font
$pdf->SetFont('Arial','',8);
//loop the data
foreach($data as $item){
	//write data using Row() method containing array of values.
	$medicine_id=$item->medicine_id;
	$medicine_name;
	$medicine_combination;
	$medicine_type;
	$medicine_data;
	$query = "SELECT name,combination,type FROM medicine  WHERE id =$medicine_id";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	$i = 1;
	while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
		$medicine_name=$result['name'];
		$medicine_combination=$result['combination'];
		$medicine_type=$result['type'];
		$medicine_data=$medicine_type." ".$medicine_name.'\n'.$medicine_combination;
		//echo($medicine_data);
	}
	$intake=$item->intake.'\n'.$item->instruction;
	$pdf->Row(Array(
		$medicine_data,
		$item->quantity,
		$item->breakfast,
		$item->lunch,
		$item->supper,
		$intake,
        $item->no_days,
	));
	$pdf->Ln();
}

$pdf->Ln(20);
$pdf->SetFont('Arial','B',8);
//$pdf->Line(10, 150, 205, 150);
//$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(15, 5, 'Next Visit:', 0, 0);
$pdf->SetFont('Arial','',8);
$pdf->Cell(125, 5, '27-01-2020', 0, 0);
$pdf->Cell(0, 5, 'Dr. M. Suresh Kumar MD DPM MPH(USA)', 0, 1);
$pdf->Cell(173, 5, '', 0, 0);
$pdf->Cell(10, 5, 'Reg. No: 71050', 0, 1);
$pdf->Ln(2);
//$pdf->Cell(0, 5, 'PLEASE SMS CHILDREN NAME/AGE TO 9047048344 TO GET YOUR APPOINTMENT. PLEASE BE AT OUR CLINIC AT LEAST 15 MINUTES BEFORE ', 0, 1);
//$pdf->Cell(0, 5, 'THE SCHEDULED TIME. EMERGENCY CASES WILL BE PRIORITIZED.', 0, 0);
//$pdf->Ln(10);
//$pdf->Cell(0, 5, 'EXCLUSIVE BREAST FEEDING IS VERY ESSENTIAL FOR BABIES UNDER 6 MONTHS.', 0, 1);

$pdf->output('Prescription.pdf', 'D');

?>