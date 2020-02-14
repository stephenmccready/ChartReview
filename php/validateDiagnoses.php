<?php
include ("mysqli.php");

$q ="Select DiagnosisDescr From luDiagnosis Where DiagnosisCode = '" . $_GET['diag'] . "'";
$result = $connect->query($q);

if ($result->num_rows > 0)
{
	while($record = $result->fetch_assoc())	{
		if($record['DiagnosisDescr']=='?') {
			echo "0|Unknown diagnosis description";
		} else {
			echo "1|" . $record['DiagnosisDescr'];
		}
	}
} else {
	echo "0|Unknown diagnosis code";
}
