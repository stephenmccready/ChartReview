<?php
include ("mysqli.php");

$q="SELECT P.MasterProviderID, P.ProviderFirstName, P.ProviderLastName, P.ProviderFullName, P.NPI FROM factProvider As P 
WHERE P.NPI = '" . $_GET['npi'] . "' Order By P.ProviderLastName, P.ProviderFirstName";
$result = $connect->query($q);

if ($result->num_rows == 1) {
	$record = $result->fetch_assoc();
	echo $record['MasterProviderID'] . '|' . $record['ProviderFirstName'] . '|' . $record['ProviderLastName'] . '|' . $record['ProviderFullName'] . '|' . $record['NPI'];
} else if ($result->num_rows > 1)  {
	while($record = $result->fetch_assoc())
	{
		echo $record['MasterProviderID'] . '|' . $record['ProviderFirstName'] . '|' . $record['ProviderLastName'] . '|' . $record['ProviderFullName'] . '|' . $record['NPI'] . '~';
	}
}
else 
{
	echo 0;
}
