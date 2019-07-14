
<?php
include_once "pconfig.php";
include_once "F:/xampp/htdocs/practice/helveticab.php";
require "fpdf.php" ;

if(isset($_REQUEST['msg']))
{
    $user = $_REQUEST['msg'];
}

$sql_sal = "select employee.id AS ID,CONCAT(employee.fname,' ',employee.lname) AS Name, 
            employee.address AS Address,employee.contact_no AS contact_info,employee.designation AS des, salary.amount AS Basic_Pay,
            CAST((salary.bonus*salary.amount)/100 AS UNSIGNED) AS bonus ,
            CAST((salary.amount*salary.overtime)/600 AS UNSIGNED) AS Overtime_pay, CAST(((incentives.HRA+incentives.TA+incentives.DA+incentives.medical)*salary.amount)/100 AS UNSIGNED)AS Incentives, CAST((((salary.bonus*salary.amount)/100)+((salary.amount*salary.overtime)/600)+ ((incentives.HRA+incentives.TA+incentives.DA+incentives.medical)*salary.amount)/100) AS UNSIGNED) AS Increment,
            CAST(IF(loan.status= 'unpaid',loan.installment,0) AS UNSIGNED)AS Loan,
            fund.fund_type AS ft,
            fund.fund_amount as Fund,
            advance.ad_amount as Advance_Pay,
            CAST(((leave_table.total_days*salary.amount)/25) AS UNSIGNED)AS Leave_ded, 
            CAST((IF(loan.status= 'unpaid' , loan.installment,0)+ fund.fund_amount+advance.ad_amount+((leave_table.total_days*salary.amount)/25)) AS UNSIGNED) AS Decrement, 
            CAST((salary.amount - (IF(loan.status= 'unpaid' , loan.installment,0)+ fund.fund_amount+advance.ad_amount+((leave_table.total_days*salary.amount)/25)) + ((salary.bonus*salary.amount)/100)+((salary.amount*salary.overtime)/600)+ ((incentives.HRA+incentives.TA+incentives.DA+incentives.medical)*salary.amount)/100) AS UNSIGNED) AS net   from employee,salary,incentives,loan,fund,advance,leave_table  where  employee.id = salary.empid and employee.id=incentives.empid AND employee.id=loan.empid AND employee.id=fund.empid AND employee.id = advance.empid and employee.id = leave_table.empid and employee.id = '$user'";
            
            $query_sal = mysqli_query($conn, $sql_sal);
 $hand = (mysqli_fetch_array($query_sal));

$name = $hand['Name'];
$add  = $hand['Address'];
$con = $hand['contact_info'];
$des = $hand['des'];
$sal = $hand['Basic_Pay'];
$bon = $hand['bonus'];
$Over = $hand['Overtime_pay'];
$incen = $hand['Incentives'];
$in = $hand['Increment'];
$laon = $hand['Loan'];
$fund = $hand['Fund'];
$ad = $hand['Advance_Pay'];
$leave = $hand['Leave_ded'];
$dec= $hand['Decrement'];
$net = $hand['net'];
$ft= $hand['ft'];









$pdf=new FPDF();
$pdf->AddPage();
//$pdf->Image('Texture-Background.jpg', 0, 0,$size[0], $size[1]);

$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,10,'Company Name',0,1,"C");
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,10,'Company Address',0,1,"C");



$pdf->SetFont('Arial','B',13);
$pdf->Cell(0,10,'Payslip',0,1,"C");

$pdf->SetFont('Arial','B',13);
$pdf->Cell(50,10,'',0,1);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(50,10,'',0,1);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(50,10,'',0,1);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(50,7,'Employee Name:  '.$name ,0,1);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(50,7,'Designation:  '.$des,0,1);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(50,7,'Address/Contact:   '.$add.' ,'.$con ,0,1);


$pdf->SetFont('Arial','B',16);
$pdf->Cell(50,10,'',0,1);
$pdf->SetFont('Arial','B',16);
$pdf->Cell(50,10,'',0,1);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(96,10,'Earnings',1,0);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(96,10,'Deduction',1,1);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,'Basic Salary',1,0);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,$sal,1,0,"R");
$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,'Loan',1,0);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,$laon,1,1,"R");

$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,'Incentives',1,0);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,$incen,1,0,"R");
$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,$ft.' Fund',1,0);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,$fund,1,1,"R");

$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,'Bonus',1,0);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,$bon,1,0,"R");
$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,'Advance Pay',1,0);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,$ad,1,1,"R");

$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,'Overtime Pay',1,0);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,$Over,1,0,"R");
$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,'Leave Deduction',1,0);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,$leave,1,1,"R");

$pdf->Cell(48,10,'',1,0);
$pdf->Cell(48,10,'',1,0);
$pdf->Cell(48,10,'',1,0);
$pdf->Cell(48,10,'',1,1);

$pdf->Cell(48,10,'Total Increment',1,0);
$pdf->Cell(48,10,$in,1,0,"R");
$pdf->Cell(48,10,'Total Dncrement',1,0);
$pdf->Cell(48,10,$dec,1,1,"R");

$pdf->SetFont('Arial','B',18);
$pdf->Cell(96,10,'',1,0);
$pdf->Cell(48,10,'Net Salary',1,0);
$pdf->Cell(48,10,$net,1,1,"R");

$pdf->Cell(50,10,'',0,1);
$pdf->Cell(50,10,'',0,1);



$pdf->SetFont('Arial','B',13);
$pdf->Cell(48,10,'In Word: ______________________________________________________ ',0,1);
$pdf->Cell(50,10,'',0,1);
$pdf->Cell(50,10,'Cheque NO. : __________________________________________________',0,1);


$pdf->SetFont('Arial','B',10);
$pdf->Cell(50,10,'',0,1);
$pdf->Cell(50,10,'',0,1);
$pdf->Cell(105,10,"Employee's Signature___________________",0,0);
$pdf->Cell(50,10,"Director's Signature___________________",0,0);








$pdf->Output();

?>