<?php
include ("mysqli.php");

$q ="SELECT CR.*, P.PersonFirstName, P.PersonLastName, P.PersonDateOfBirth, PRV.NPI, PRV.ProviderFullName, CRS.ChartReviewStatus,
PRV.ProviderFirstName, PRV.ProviderLastName 
FROM factChartReview As CR 
Join factPerson As P on P.MasterPersonID = CR.MasterPersonId
Join factProvider As PRV on PRV.MasterProviderID = CR.MasterProviderId
Join luChartReviewStatus As CRS On CRS.ChartReviewStatusID = CR.ChartReviewStatusID
Where Year(CR.dateOfService) = " . $_GET['filterYear'] . 
" And ('" . $_GET['filterMonth'] . "' = 'All' Or Month(CR.dateOfService) = '" . $_GET['filterMonth'] . "')" .
" And ('" . $_GET['filterStatus'] . "' = 'All' Or CR.ChartReviewStatusID = '" . $_GET['filterStatus'] . "')" . 
" Order By CR.dateOfService Desc, CR.ChartReviewID Desc";
$result = $connect->query($q);

if ($result->num_rows > 0)
{
	while($record = $result->fetch_assoc())
	{
		switch ($record['ChartReviewStatusID']){
			case 0:	$badgeStatus = 'warning';	$onclick='onclick="editChartReview(' . $record['ChartReviewID'] . ')"';	$lock='<i class="fas fa-lock-open"></i>'; break;
			case 1:	$badgeStatus = 'success';	$onclick='';	$lock='<i class="fas fa-lock"></i>'; break;
			case 2:	$badgeStatus = 'danger';	$onclick='';	$lock='<i class="fas fa-lock"></i>'; break;
		}

		echo  '<a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" ' . $onclick . '>';
		$date=date_create($record['dateOfService']);
		echo  '<span class="crID">' . $record['ChartReviewID'] . '</span>';
		echo  '<span class="crDate">' . date_format($date, "m/d/Y") . '</span>';
		echo  '<span class="crName">' . $record['PersonFirstName'] . ' ' . $record['PersonLastName'] . '</span>';
		echo  '<span class="crProv">' . $record['ProviderFirstName'] . ' ' . $record['ProviderLastName'] . '</span>';
		echo  '<span class="badge badge-pill badge-' . $badgeStatus . '">' . $lock . ' ' . $record['ChartReviewStatus'] . '</span></a>';
	}
} else {
	echo 0;
}
