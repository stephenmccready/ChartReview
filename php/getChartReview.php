<?php
include ("mysqli.php");

$q="SELECT CR.*, P.PersonFirstName, P.PersonLastName, P.PersonDateOfBirth, PRV.NPI, PRV.ProviderFullName, CRS.ChartReviewStatus, L.SourcePersonKey As MemberID, MBI.SourcePersonKey As MBI, HICN.SourcePersonKey As HICN
FROM factChartReview As CR 
Join factPerson As P on P.MasterPersonID = CR.MasterPersonId 
Join factProvider As PRV on PRV.MasterProviderID = CR.MasterProviderId 
Join luChartReviewStatus As CRS On CRS.ChartReviewStatusID = CR.ChartReviewStatusID 
Join luPersonXref As L On L.MasterPersonID = CR.MasterPersonId And L.PersonTypeCode = 'L' And L.SystemSourceCode='CT' 
Join luPersonXref As MBI On MBI.MasterPersonID = CR.MasterPersonId And MBI.PersonTypeCode = 'B'
Join luPersonXref As HICN On HICN.MasterPersonID = CR.MasterPersonId And HICN.PersonTypeCode = 'R'
Where CR.ChartReviewID = " . $_GET['ChartReviewID'] .
" Order By CR.dateOfService Desc";
$result = $connect->query($q);

$output="";

if ($result->num_rows > 0)
{
	while($record = $result->fetch_assoc())
	{
		switch ($record['ChartReviewStatusID']){
			case 0:	$badgeStatus = 'warning';	break;
			case 1:	$badgeStatus = 'success';	break;
			case 2:	$badgeStatus = 'danger';	break;
		}
		$date=date_create($record['dateOfService']);
		$output .= date_format($date, "Y-m-d") . '|' . $record['PersonFirstName'] . '|' . $record['PersonLastName'] . '|';
		$date=date_create($record['PersonDateOfBirth']);
		$output .= date_format($date, "Y-m-d") . '|';
		$output .= $record['MemberID'] . '|' . $record['MBI'] . '|' . $record['HICN'] . '|';
		$output .= $record['ChartReviewStatus'] . '|' . $record['ProviderFullName'] . '|' . $record['NPI'] . '|' . $record['MasterPersonID'] . '|' . $record['ChartReviewID'] . '|';
	}
	
	$q2="SELECT DiagnosisCode, HCC_Code FROM factChartReviewDiagnosis Where ChartReviewID = " . $_GET['ChartReviewID'];
	$result2 = $connect->query($q2);
	
	if ($result2->num_rows > 0)
	{
		while($record2 = $result2->fetch_assoc())
		{
			$output .= $record2['DiagnosisCode'] . '|';
		}
	}
	echo $output;
} else {
	echo $result;
}
