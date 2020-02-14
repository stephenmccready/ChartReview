<?php
include ("mysqli.php");

$mysqltime = date ("Y-m-d H:i:s"); 
$mysqlDOS = date ("Y-m-d H:i:s", strtotime($_GET['dateOfService'])); 

$qA="INSERT INTO factChartReview(MasterPersonId, MasterProviderId, dateOfService, procedureCode, procedureCodeType, ChartReviewStatusID, notes, dateVoided, voidedBy, RAPSSubmissionFlag, EDPSSubmissionFlag, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $_GET['MasterPersonId'] ."," . $_GET['MasterProviderId'] .",'" . $mysqlDOS ."','" . $_GET['procedureCode'] ."','" . $_GET['procedureCodeType'] . "'," . $_GET['ChartReviewStatusID'] . ",'" . urlencode($_GET['notes']) . "',null,null,null,null,'" . $mysqltime ."','" . $_GET['createdBy'] ."',null,null)";

$resultA = $connect->query($qA);

$qB="SELECT Max(ChartReviewID) AS ChartReviewID FROM factChartReview WHERE MasterPersonId=" . $_GET['MasterPersonId'] 
. " AND MasterProviderId=" . $_GET['MasterProviderId']
. " AND dateOfService='" . $mysqlDOS . "'";

$resultB = $connect->query($qB);
$record = $resultB->fetch_assoc();

$q1="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag1'] . "','10','" . $_GET['HCC1'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
$result1 = $connect->query($q1);

if($_GET['diag2'] != '') {
	$q2="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag2'] . "','10','" . $_GET['HCC2'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
	$result2 = $connect->query($q2);

	if($_GET['diag3'] != '') {
		$q3="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag3'] . "','10','" . $_GET['HCC3'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result3 = $connect->query($q3);

	if($_GET['diag4'] != '') {
		$q4="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag4'] . "','10','" . $_GET['HCC4'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result4 = $connect->query($q4);

	if($_GET['diag5'] != '') {
		$q5="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag5'] . "','10','" . $_GET['HCC5'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result5 = $connect->query($q5);

	if($_GET['diag6'] != '') {
		$q6="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag6'] . "','10','" . $_GET['HCC6'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result6 = $connect->query($q6);

	if($_GET['diag7'] != '') {
		$q7="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag7'] . "','10','" . $_GET['HCC7'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result7 = $connect->query($q7);

	if($_GET['diag8'] != '') {
		$q8="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag8'] . "','10','" . $_GET['HCC8'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result8 = $connect->query($q8);

	if($_GET['diag9'] != '') {
		$q9="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag9'] . " ','10','" . $_GET['HCC9'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result9 = $connect->query($q9);

	if($_GET['diag10'] != '') {
		$q10="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag10'] . "','10','" . $_GET['HCC10'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result10 = $connect->query($q10);

	if($_GET['diag11'] != '') {
		$q11="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag11'] . "','10','" . $_GET['HCC11'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result11 = $connect->query($q11);
		
	if($_GET['diag12'] != '') {
	$q12="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag12'] . "','10','" . $_GET['HCC12'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
	$result12 = $connect->query($q12);

	if($_GET['diag13'] != '') {
		$q13="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag13'] . "','10','" . $_GET['HCC13'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result13 = $connect->query($q13);

	if($_GET['diag14'] != '') {
		$q14="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag14'] . "','10','" . $_GET['HCC14'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result14 = $connect->query($q14);

	if($_GET['diag15'] != '') {
		$q15="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag15'] . "','10','" . $_GET['HCC15'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result15 = $connect->query($q15);

	if($_GET['diag16'] != '') {
		$q16="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag16'] . "','10','" . $_GET['HCC16'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result16 = $connect->query($q16);

	if($_GET['diag17'] != '') {
		$q17="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag17'] . "','10','" . $_GET['HCC17'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result17 = $connect->query($q17);

	if($_GET['diag18'] != '') {
		$q18="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag18'] . "','10','" . $_GET['HCC18'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result18 = $connect->query($q18);

	if($_GET['diag19'] != '') {
		$q19="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag19'] . "','10','" . $_GET['HCC19'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result19 = $connect->query($q19);

	if($_GET['diag20'] != '') {
		$q20="INSERT INTO factChartReviewDiagnosis(ChartReviewID, DiagnosisCode, DiagnosisCodeType, HCC_Code, dateCreated, createdBy, dateLastUpdated, lastUpdatedBy) VALUES (" . $record['ChartReviewID'] . ",'" . $_GET['diag20'] . "','10','" . $_GET['HCC20'] . "','" . $mysqltime . "','" . $_GET['createdBy'] ."',null,null)";
		$result20 = $connect->query($q20);
																		} //20
																	} //19
																} //18
															} //17
														} //16
													} //15
												} //14
											} //13
										} //12
									} //11
								} //10
							} //9
						} //8
					} //7
				} //6
			} //5
		} //4
	} //3
} //2
