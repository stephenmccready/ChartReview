<?php
include ("mysqli.php");

$q="SELECT P.*, M.SourcePersonKey As MemberID, MBI.SourcePersonKey As MBI, HICN.SourcePersonKey As HICN
FROM factPerson As P 
JOIN luPersonXref As M on M.MasterPersonID = P.MasterPersonId And M.PersonTypeCode = 'L' And M.SystemSourceCode = 'CT'
JOIN luPersonXref As MBI on MBI.MasterPersonID = P.MasterPersonId And MBI.PersonTypeCode = 'B'
JOIN luPersonXref As HICN on HICN.MasterPersonID = P.MasterPersonId And HICN.PersonTypeCode = 'R'
WHERE HICN.SourcePersonKey = '" . $_GET['hicn'] . "'";
$result = $connect->query($q);

if ($result->num_rows == 1)
{
	while($record = $result->fetch_assoc())
	{
		$date=date_create($record['PersonDateOfBirth']);
		echo $record['ID'] . '|' . $record['PersonLastName'] . '|' . $record['PersonFirstName'] . '|' . $record['MemberID'] . '|' . $record['MBI'] . '|' . date_format($date, "Y-m-d") . '|' . $record['MasterPersonID'];
	}
} else {
	echo 0;
}
