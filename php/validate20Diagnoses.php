<?php
include ("mysqli.php");

$q="Select DiagnosisDescr From luDiagnosis Where DiagnosisCode='" . $_GET['diag1'] . "'";
$result = $connect->query($q);

$resultTab="|";
$diagAllOkay="1";

if ($result->num_rows > 0)
{
	$record = $result->fetch_assoc();
	
	if($record['DiagnosisDescr']=='?') {
		$resultTab .= "1|0|Unknown diagnosis description";
	} else {
		$resultTab .= "1|1|" . $record['DiagnosisDescr'];
	}
	
} else {
	$resultTab .= "1|0|Unknown diagnosis code";
	$diagAllOkay="0";
}


$x=2;

while($x <= 20) {
	$diag='diag'.$x;
	if($_GET[$diag] != "") {
		$q="Select DiagnosisDescr From luDiagnosis Where DiagnosisCode='" . $_GET[$diag] . "'";
		$result = $connect->query($q);

		if ($result->num_rows > 0) {
			$record = $result->fetch_assoc();
	
			if($record['DiagnosisDescr']=='?') {
				$resultTab .= "|" . $x . "|0|Unknown diagnosis description";
			} else {
				$resultTab .= "|" . $x . "|1|" . $record['DiagnosisDescr'];
			}
	
		} else {
			$resultTab .= "|" . $x . "|0|Unknown diagnosis code";
			$diagAllOkay="0";
		}
	}
    $x++;
}

echo $diagAllOkay . $resultTab;
