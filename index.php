<!DOCTYPE html>
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Chart Review</title>
  <link href='images/favicon.ico' type='image/x-icon' rel='shortcut icon' />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/d6add3d246.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <script src="js/chartreview.js"></script>
</head>
<body>
<div class="container-fluid" id="wholepage">
<form id="listForm">

<!-- Modal -->
<div class="modal fade" id="voidModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Void</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<i class="fas fa-exclamation-triangle"></i>&nbsp;
        Are you sure you want to VOID chart review <span id="voidChartReview"></span>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="voidNoCancel">No, Cancel the void</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="voidYesVoidIT">Yes, Void it</button>
      </div>
    </div>
  </div>
</div>

  <div id="chartReviewList">
    <div class="row">
	  <div class="col">
		<h4><!--<i class="fas fa-notes-medical"></i> -->Chart Reviews</h4>
<!--		<?php echo "User: " . $_SERVER['AUTH_USER']; ?>	-->
<!--		<?php echo "User: " . $_SERVER['USERNAME']; ?>	-->
		<div class="form-inline float-right">
			<i class="fas fa-filter align-middle"></i>&nbsp;&nbsp;
			<label for="filterYear">Dates of Service </label>&nbsp;&nbsp;
			<select class="form-control" id="filterYear" name="filterYear">
<?php
for ($year=date("Y"); $year>2017; $year--) {
    echo "<option value='" . $year. "'>" . $year. "</option>";
}
?>
			</select>&nbsp;&nbsp;
			<select class="form-control" id="filterMonth" name="filterMonth">
				<option value="All" selected="selected">All Months</option>
				<option value="1">January</option>
				<option value="2">February</option>
				<option value="3">March</option>
				<option value="4">April</option>
				<option value="5">May</option>
				<option value="6">June</option>
				<option value="7">July</option>
				<option value="8">August</option>
				<option value="9">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select>&nbsp;&nbsp;
			<i class="fas fa-filter align-middle"></i>&nbsp;
			<label for="filterStatus">Status </label>&nbsp;
			<select class="form-control" id="filterStatus" name="filterStatus">
				<option value="All" selected="selected">All</option>
				<option value="InProcess" >In Process</option>
				<option value="Processed" >Processed</option>
				<option value="Void" >Void</option>
			</select>
		</div>
	</div>
  </div>
	
  <div class="row">
	<div class="col">
		<div id="crListHeader" class="d-flex">
			<span class="crID">ID</span>
			<span class="crDate">DOS</span>
			<span class="crName">Member</span>
			<span class="crProvider">Provider</span>
			<span class="badge"></span>
		</div>
		<div class="list-group overflow-auto" id="crList"></div>
	</div>
  </div>
	
  <div class="row">
	<div class="col">
		<button type="button" class="btn btn-success" id="newChartReview">New Chart Review <i class="fa fa-plus"></i></button>
	</div>
  </div>
  
  </div> <!-- chartReviewList -->
 </form>
 
<form id="crForm">
  <div id="chartReviewForm">
  	<div id="hideme">
		<input type="text" id="MasterPersonID">
		<input type="text" id="MasterProviderID">
		<input type="text" id="chartReviewID">
  		<input type="text" id="ChartReviewDiagnosisID1">
  		<input type="text" id="ChartReviewDiagnosisID2">
  		<input type="text" id="ChartReviewDiagnosisID3">
  		<input type="text" id="ChartReviewDiagnosisID4">
  		<input type="text" id="ChartReviewDiagnosisID5">
  		<input type="text" id="ChartReviewDiagnosisID6">
  		<input type="text" id="ChartReviewDiagnosisID7">
  		<input type="text" id="ChartReviewDiagnosisID8">
  		<input type="text" id="ChartReviewDiagnosisID9">
  		<input type="text" id="ChartReviewDiagnosisID10">
  		<input type="text" id="ChartReviewDiagnosisID11">
  		<input type="text" id="ChartReviewDiagnosisID12">
  		<input type="text" id="ChartReviewDiagnosisID13">
  		<input type="text" id="ChartReviewDiagnosisID14">
  		<input type="text" id="ChartReviewDiagnosisID15">
  		<input type="text" id="ChartReviewDiagnosisID16">
  		<input type="text" id="ChartReviewDiagnosisID17">
  		<input type="text" id="ChartReviewDiagnosisID18">
  		<input type="text" id="ChartReviewDiagnosisID19">
  		<input type="text" id="ChartReviewDiagnosisID20">
  		<input type="text" id="HoldDiag1">
  		<input type="text" id="HoldDiag2">
  		<input type="text" id="HoldDiag3">
  		<input type="text" id="HoldDiag4">
  		<input type="text" id="HoldDiag5">
  		<input type="text" id="HoldDiag6">
  		<input type="text" id="HoldDiag7">
  		<input type="text" id="HoldDiag8">
  		<input type="text" id="HoldDiag9">
  		<input type="text" id="HoldDiag10">
  		<input type="text" id="HoldDiag11">
  		<input type="text" id="HoldDiag12">
  		<input type="text" id="HoldDiag13">
  		<input type="text" id="HoldDiag14">
  		<input type="text" id="HoldDiag15">
  		<input type="text" id="HoldDiag16">
  		<input type="text" id="HoldDiag17">
  		<input type="text" id="HoldDiag18">
  		<input type="text" id="HoldDiag19">
  		<input type="text" id="HoldDiag20">
  		<input type="text" id="HCC1">
  		<input type="text" id="HCC2">
  		<input type="text" id="HCC3">
  		<input type="text" id="HCC4">
  		<input type="text" id="HCC5">
  		<input type="text" id="HCC6">
  		<input type="text" id="HCC7">
  		<input type="text" id="HCC8">
  		<input type="text" id="HCC9">
  		<input type="text" id="HCC10">
  		<input type="text" id="HCC11">
  		<input type="text" id="HCC12">
  		<input type="text" id="HCC13">
  		<input type="text" id="HCC14">
  		<input type="text" id="HCC15">
  		<input type="text" id="HCC16">
  		<input type="text" id="HCC17">
  		<input type="text" id="HCC18">
  		<input type="text" id="HCC19">
  		<input type="text" id="HCC20">
  	</div>
  	
  <div class="row">
	<div class="col">
		<h4><span id="crHeader"></span>&nbsp;</h4>
		<div class="fa-div"><i class="fa fa-user"></i> Member&nbsp;<i class="fas fa-check-circle" id="memberOK"></i><i class="fas fa-times-circle" id="memberNOTOK"></i>&nbsp;<span id="memberErrorMessage" class="errorMessage"></span></div>
	</div>
  </div>
	
  <div class="row">
	<div class="col">
	  <div class="form-group">
			<div class="input-group mb-3">
				<div class="input-group-prepend"><div class="input-group-text">Name</div></div>
				<input type="text" class="form-control valid" id="mname" placeholder="Last name, First name" name="mname" required>	
				<div class="input-group-append"><div class="input-group-text">Date of Birth</div></div>
				<input type="date" class="form-control valid" id="mdob" name="mdob" required>
				<div class="input-group-append"><button type="button" class="btn btn-outline-secondary" id="lookUpMemberNameDOB"><i class="fa fa-binoculars" data-toggle="tooltip" data-placement="top" title="Search Member by Name + DOB"></i></button></div>
			</div>
	  </div>
	</div>
  </div>
  
  <div id="memberPickList" class="row">
	<div class="col">
		<div class="fa-div"><i class="far fa-list-alt"></i> Select a member&nbsp;</div>
	</div>
  </div>

  <div class="row">
	<div class="col">
	  <div class="form-group">
			<div class="input-group mb-3">
				<div class="input-group-prepend"><div class="input-group-text">ID</div></div>
				<input type="text" class="form-control valid" id="memberid" placeholder="Member's ID" name="memberid">
				<div class="input-group-append"><button type="button" class="btn btn-outline-secondary" id="lookUpMemberID"><i class="fa fa-binoculars" data-toggle="tooltip" data-placement="top" title="Search Member by Member ID"></i></button></div>
			</div>
			<div class="valid-feedback">Valid.</div>
			<div class="invalid-feedback">Please enter a valid Member ID.</div>
	  </div>
	</div>
	<div class="col">
	  <div class="form-group">
			<div class="input-group mb-3">
				<div class="input-group-prepend"><div class="input-group-text">MBI</div></div>
				<input type="text" class="form-control valid" id="mbi" placeholder="Member's MBI" name="mbi">
				<div class="input-group-append"><button type="button" class="btn btn-outline-secondary" id="lookUpMemberMBI"><i class="fa fa-binoculars" data-toggle="tooltip" data-placement="top" title="Search Member by MBI"></i></button></div>
			</div>
			<div class="valid-feedback">Valid.</div>
			<div class="invalid-feedback">Please enter an 11 character MBI.</div>
	  </div>
	</div>
	<div class="col">
	  <div class="form-group">
			<div class="input-group mb-3">
				<div class="input-group-prepend"><div class="input-group-text">HICN</div></div>
				<input type="text" class="form-control valid" id="hicn" placeholder="Member's HICN" name="hicn">
				<div class="input-group-append"><button type="button" class="btn btn-outline-secondary" id="lookUpMemberHICN"><i class="fa fa-binoculars" data-toggle="tooltip" data-placement="top" title="Search Member by HICN"></i></button></div>
			</div>
			<div class="valid-feedback">Valid.</div>
			<div class="invalid-feedback">Please enter a valid HICN.</div>
	  </div>
	</div>
  </div>
  
  <div class="row">
	<div class="col">
		<div class="fa-div"><i class="fa fa-user-md"></i> Provider&nbsp;<i class="fas fa-check-circle" id="providerOK"></i><i class="fas fa-times-circle" id="providerNOTOK"></i>&nbsp;<span id="providerErrorMessage" class="errorMessage"></span></div>
	</div>
  </div>
  
  <div class="row">
	<div class="col">  
	  <div class="form-group">
		 <div class="input-group mb-3">
			<div class="input-group-prepend"><div class="input-group-text">Name</div></div>
				<input type="text" class="form-control valid" id="pname" placeholder="Last name, First name" aria-label="Provider's Name (last,first)" name="pname" required>
				<div class="input-group-append"><button type="button" class="btn btn-outline-secondary" id="lookUpNPI"><i class="fa fa-binoculars" data-toggle="tooltip" data-placement="top" title="Search Provider by Name"></i></button></div>
			</div>
			<div class="valid-feedback">Valid.</div>
			<div class="invalid-feedback">Please fill out this field.</div>
	  	</div>
	</div>
	<div class="col">  
	  <div class="form-group">
			<div class="input-group mb-3">
				<div class="input-group-prepend"><div class="input-group-text">NPI</div></div>
				<input type="text" class="form-control valid" id="npi" placeholder="Provider's NPI" aria-label="Provider's NPI" name="npi" required>
				<div class="input-group-append"><button type="button" class="btn btn-outline-secondary" id="checkNPI"><i class="fa fa-binoculars" data-toggle="tooltip" data-placement="top" title="Search Member by NPI"></i></button></div>
			</div>
			<div class="valid-feedback">Valid.</div>
			<div class="invalid-feedback">Please enter a valid NPI.</div>
	  </div>
	</div>
  </div>
  
  <div id="providerPickList" class="row">
	<div class="col">
	<div class="fa-div"><i class="far fa-list-alt"></i> Select a provider&nbsp;</div>
		<div id="providerPickListContainer" >
		<table id="providerTable"></table>
		</div>
	</div>
  </div>
 
  <div class="row">
	<div class="col">
	<div class="fa-div"><i class="fa fa-file-text"></i> Encounter&nbsp;<i class="fas fa-check-circle" id="encounterOK"></i><i class="fas fa-times-circle" id="encounterNOTOK"></i>&nbsp;<span id="encounterErrorMessage" class="errorMessage"></span></div>
	</div>
  </div>
  
  <div class="row">
	<div class="col-3">  
	  <div class="form-group">
          	Date of Service<br/>
		<input type="date" class="form-control valid" id="dos" name="dos" required>
	  </div>
	</div>
	
	<div class="col-9">  
	  <div class="form-group">
          	Procedure<br/>
			<select class="form-control" id="procedureCode" name="procedureCode">
				<option value="99304">99304 New or Established Patient Comprehensive Nursing Facility Assessments</option>
				<option value="99305" selected="selected">99305 New or Established Patient Comprehensive Nursing Facility Assessments</option>
				<option value="99357">99357 Prolonged service in the inpatient or observation setting, requiring unit/floor time beyond the usual service</option>
				<option value="99358">99358 Prolonged evaluation and management service before and/or after direct patient care</option>
				<option value="99359">99359 Prolonged evaluation and management service before and/or after direct patient care</option>
				<option value="99456">99456 Work Related or Medical Disability Evaluation Service</option>
			</select>
	  </div>
	</div>
  </div>
  
  <div class="form-group"> <!-- DiagnosisCodes -->
   	<span>Diagnoses Codes:</span>&nbsp;<span id="diagnosisErrorMessage" class="errorMessage"></span>
   	<div class="row diag">
		<div class="col">
<!--			<div class="input-group mb-3">	-->
				<input type="text" class="form-control valid" id="diag1" placeholder="1" name="diag1" required>
<!--				<div class="input-group-append"><button type="button" class="btn btn-outline-secondary" id="lookUpDiagnosis"><i class="fa fa-binoculars" data-toggle="tooltip" data-placement="top" title="Search for Diagnosis Code"></i></button></div>
				</div>	-->
			<div class="valid-feedback">Valid.</div>
			<div class="invalid-feedback">Please fill out this field.</div>
		</div>
		<div class="col"><input type="text" class="form-control valid" id="diag2" placeholder="2" name="diag2"></div>
		<div class="col"><input type="text" class="form-control valid" id="diag3" placeholder="3" name="diag3"></div>
		<div class="col"><input type="text" class="form-control valid" id="diag4" placeholder="4" name="diag4"></div>
		<div class="col"><input type="text" class="form-control valid" id="diag5" placeholder="5" name="diag5"></div>
  	</div>
  	<div class="row diag">
		<div class="col"><input type="text" class="form-control valid" id="diag6" placeholder="6" name="diag6"></div>
		<div class="col"><input type="text" class="form-control valid" id="diag7" placeholder="7" name="diag7"></div>
		<div class="col"><input type="text" class="form-control valid" id="diag8" placeholder="8" name="diag8"></div>
		<div class="col"><input type="text" class="form-control valid" id="diag9" placeholder="9" name="diag9"></div>
		<div class="col"><input type="text" class="form-control valid" id="diag10" placeholder="10" name="diag10"></div>
  	</div>
  	<div class="row diag">
		<div class="col"><input type="text" class="form-control valid" id="diag11" placeholder="11" name="diag11"></div>
		<div class="col"><input type="text" class="form-control valid" id="diag12" placeholder="12" name="diag12"></div>
		<div class="col"><input type="text" class="form-control valid" id="diag13" placeholder="13" name="diag13"></div>
		<div class="col"><input type="text" class="form-control valid" id="diag14" placeholder="14" name="diag14"></div>
		<div class="col"><input type="text" class="form-control valid" id="diag15" placeholder="15" name="diag15"></div>
  	</div>
  	<div class="row diag">
		<div class="col"><input type="text" class="form-control valid" id="diag16" placeholder="16" name="diag16"></div>
		<div class="col"><input type="text" class="form-control valid" id="diag17" placeholder="17" name="diag17"></div>
		<div class="col"><input type="text" class="form-control valid" id="diag18" placeholder="18" name="diag18"></div>
		<div class="col"><input type="text" class="form-control valid" id="diag19" placeholder="19" name="diag19"></div>
		<div class="col"><input type="text" class="form-control valid" id="diag20" placeholder="20" name="diag20"></div>
  	</div>
  
  </div> <!-- DiagnosisCodes -->
<!--  
  	<div class="row">
		<div class="col"><span>Notes:</span><input type="text" class="form-control valid" id="notes" placeholder="Notes" name="notes" maxlength="255"></div>
  	</div>
-->
  	<div class="buttonDiv">
  		<button type="button" class="btn btn-success valid" id="save">Save <i class="fa fa-bullseye"></i></button>
  		<button type="button" class="btn btn-warning valid" id="clearForm">Clear form <i class="fa fa-refresh"></i></button>
  		<button type="button" class="btn btn-danger valid" id="cancel">Cancel <i class="fa fa-times-circle"></i></button>
  		<button type="button" class="btn btn-danger valid" id="void" data-toggle="modal" data-target="#voidModal">Void <i class="fas fa-trash-alt"></i></button>
  	</div>
  </div> <!-- chartReviewForm -->
  
</form>

  <div id="viewOnlyForm">
	<div class="fa-div"><i class="fas fa-lock"></i>&nbsp;Chart Review <span id="viewOnlyChartReviewID"></span></div>
	<div id="viewOnlyMember" class="confirmation"></div>
	<div id="viewOnlyProvider" class="confirmation"></div>
	<div id="viewOnlyEncounter" class="confirmation"></div>
	<div id="viewOnlyDiagnosis" class="confirmation"></div>
	<div id="viewOnlyDiag1"></div><div id="viewOnlyDiag2"></div><div id="viewOnlyDiag3"></div><div id="viewOnlyDiag4"></div>
	<div id="viewOnlyDiag5"></div><div id="viewOnlyDiag6"></div><div id="viewOnlyDiag7"></div><div id="viewOnlyDiag8"></div>
	<div id="viewOnlyDiag9"></div><div id="viewOnlyDiag10"></div><div id="viewOnlyDiag11"></div><div id="viewOnlyDiag12"></div>
	<div id="viewOnlyDiag13"></div><div id="viewOnlyDiag14"></div><div id="viewOnlyDiag15"></div><div id="viewOnlyDiag16"></div>
	<div id="viewOnlyDiag17"></div><div id="viewOnlyDiag18"></div><div id="viewOnlyDiag19"></div><div id="viewOnlyDiag20"></div>
	<hr/>
	<button type="button" class="btn btn-primary" id="close">Close <i class="far fa-times-circle"></i></button>
  </div> <!-- viewOnlyForm -->
  
  
  <div id="confirmForm">
	<div class="fa-div"><i class="fa fa-pencil"></i> Confirm Chart Review <span id="confirmChartReviewID"></span></div>
	<div id="confirmMember" class="confirmation"></div>
	<div id="confirmProvider" class="confirmation"></div>
	<div id="confirmEncounter" class="confirmation"></div>
	<div id="confirmDiagnosis" class="confirmation"></div>
	<div id="confirmDiag1"></div><div id="confirmDiag2"></div><div id="confirmDiag3"></div><div id="confirmDiag4"></div>
	<div id="confirmDiag5"></div><div id="confirmDiag6"></div><div id="confirmDiag7"></div><div id="confirmDiag8"></div>
	<div id="confirmDiag9"></div><div id="confirmDiag10"></div><div id="confirmDiag11"></div><div id="confirmDiag12"></div>
	<div id="confirmDiag13"></div><div id="confirmDiag14"></div><div id="confirmDiag15"></div><div id="confirmDiag16"></div>
	<div id="confirmDiag17"></div><div id="confirmDiag18"></div><div id="confirmDiag19"></div><div id="confirmDiag20"></div>
	<div id="confirmNotes"></div>
	<hr/>
	<button type="button" class="btn btn-warning" id="edit">Back to Editing <i class="fa fa-pencil"></i></button>
	<button type="button" class="btn btn-success" id="confirm">Confirm <i class="fa fa-check"></i></button>
	<button type="button" class="btn btn-danger" id="cancelChanges">Cancel <i class="fa fa-times-circle"></i></button>
  </div> <!-- confirm -->
</div> <!-- container -->
</body>
</html>
