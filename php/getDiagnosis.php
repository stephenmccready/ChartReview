<?php
include ("mysqli.php");

$q ="SELECT Dx.DiagnosisCode, Dx.DiagnosisDescr, X.HCC_Code, X.HCCDescr " .
"FROM luDiagnosis AS Dx " .
"LEFT OUTER JOIN luDiagnosisHCCXref AS X " .
"ON X.DiagnosisCode = Dx.DiagnosisCode And X.PlanYear='" . $_GET['PlanYear'] . "' " .
"WHERE Dx.DiagnosisCode = '" . $_GET['diag'] . "'";

$result = $connect->query($q);

if ($result->num_rows > 0)
{
	while($record = $result->fetch_assoc())	{
		echo $record['DiagnosisCode'] . "|" . $record['DiagnosisDescr'] . "|" . $_GET['i'] . "|" . $record['HCC_Code'] . "|" . $record['HCCDescr'];
	}
} else {
	echo $record['DiagnosisCode'] . "|Unknown diagnosis code||" . $_GET['i'];
}
