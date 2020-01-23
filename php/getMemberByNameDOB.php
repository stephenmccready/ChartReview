<?php
include ("mysqli.php");

$q="SELECT P.*, M.SourcePersonKey As MemberID, MBI.SourcePersonKey As MBI, HICN.SourcePersonKey As HICN
FROM factPerson As P 
JOIN luPersonXref As M on M.MasterPersonID = P.MasterPersonId And M.PersonTypeCode = 'L' And M.SystemSourceCode = 'CT'
JOIN luPersonXref As MBI on MBI.MasterPersonID = P.MasterPersonId And MBI.PersonTypeCode = 'B'
JOIN luPersonXref As HICN on HICN.MasterPersonID = P.MasterPersonId And HICN.PersonTypeCode = 'R'
WHERE P.PersonLastName = '" . $_GET['mnamelast'] . "'"
. " AND P.PersonFirstName = '" . $_GET['mnamefirst'] . "'" 
. " AND P.PersonDateOfBirth = '" . $_GET['mdob'] . "'";
$result = $connect->query($q);

if ($result->num_rows == 1)
{
	while($record = $result->fetch_assoc())
	{
		echo $record['ID'] . '|' . $record['MemberID'] . '|' . $record['MBI'] . '|' . $record['HICN'] . '|' . $record['MasterPersonID'] . '|' . $record['PersonLastName'] . '|' . $record['PersonFirstName'] . '|';
	}
} else {
	echo 0;
}
