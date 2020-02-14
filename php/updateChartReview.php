<?php
include ("mysqli.php");

$mysqltime = date ("Y-m-d H:i:s"); 
$mysqlDOS = date ("Y-m-d H:i:s", strtotime($_GET['dateOfService'])); 

$qA="UPDATE factChartReview SET MasterPersonId=" . $_GET['MasterPersonId'] . ", MasterProviderId=" . $_GET['MasterProviderId'] . ", dateOfService='" . $mysqlDOS . "', procedureCode='" . $_GET['procedureCode'] . "',notes='" . urlencode($_GET['notes']) . "',dateLastUpdated='" . $mysqltime . "', lastUpdatedBy='" . $_GET['lastUpdatedBy'] . "' WHERE ChartReviewID=" . $_GET['chartReviewID'];

$resultA = $connect->query($qA);

$x=1;

while($x <= 20) {
	$diag='diag' . $x;
	$holdDiag='holdDiag' . $x;
	$ChartReviewDiagnosisID='ChartReviewDiagnosisID' . $x;
	$HCC='HCC' . $x;
//	echo $x . " : ". $_GET[$diag] . " - " . $_GET[$holdDiag];
	if($_GET[$diag] == $_GET[$holdDiag] || ($_GET[$diag]=="" && $_GET[$holdDiag] =="")) {
		// Do nothing
		$q="";
//		echo " = Do nothing<br/>";
	} else {
		if($_GET[$diag] != "" && $_GET[$holdDiag] == "") {
			// New Diagnoses
			$q="INSERT INTO factChartReviewDiagnosis" 
				. "(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code,"
				. " dateCreated, createdBy, dateLastUpdated, lastUpdatedBy)"
				. " VALUES (" . $_GET['chartReviewID'] . ",'" . $_GET[$diag] . "','10','" . $_GET[$HCC] . "',"
				. "'" . $mysqltime . "','" . $_GET['lastUpdatedBy'] ."',null,null)";
//			echo " = Insert<br/>";
		} else {
			if($_GET[$diag] == "" && $_GET[$holdDiag] != "") {
				// Delete Diagnoses
				$q="DELETE FROM factChartReviewDiagnosis" 
					. " WHERE ChartReviewDiagnosisID=" . $_GET[$ChartReviewDiagnosisID];
//				echo " = Delete" . $q . "<br/>";
			} else {
				// Update Diagnoses
				$q="UPDATE factChartReviewDiagnosis" 
					. " SET DiagnosisCode='" . $_GET[$diag] . "'"
					. ", HCC_Code='" . $_GET[$HCC] . "'"
					. ", dateLastUpdated='" . $mysqltime . "'"
					. ", lastUpdatedBy='" . $_GET['lastUpdatedBy'] . "'"
					. " WHERE ChartReviewDiagnosisID=" . $_GET[$ChartReviewDiagnosisID];
//				echo " = Update<br/>";
			}
		}
		$result = $connect->query($q);
	}
    $x++;
}
