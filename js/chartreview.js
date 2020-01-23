$("#memberPickList").slideUp();
$("#providerPickList").slideUp();
$('#memberOK').hide();
$('#memberNOTOK').hide();
$('#providerOK').hide();
$('#providerNOTOK').hide();
$('#encounterOK').hide();
$('#encounterNOTOK').hide();
var error_free=true;

Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
});

var d = new Date();
//$('[name=filterYear]').val(d.getFullYear()-1);
$('[name=filterYear]').val(d.getFullYear());

// DOCUMENT READY
$(document).ready( function() {

	populateCRList();

	$('#chartReviewForm').slideUp();
	$('#confirmForm').slideUp();
    $('#dos').val(new Date().toDateInputValue());
    
	// Filter Year
	$("#filterYear").change(function(){
		populateCRList();
	});	

	// Filter Month
	$("#filterMonth").change(function(){
		populateCRList();
	});	

	// Filter Status
	$("#filterStatus").change(function(){
		populateCRList();
	});	

	// New Chart Review
	$("#newChartReview").click(function(){
		$('#crHeader').html("New Chart Review");
		$('#chartReviewList').slideUp();
		$('#chartReviewForm').slideDown();
		$('#clearForm').show();
		$('#void').hide();
		clearForm();
		$('#mname').val("Bloom, Xenon");
    	document.getElementById("mdob").value = '1960-10-10';

		$('#pname').val("young, george");
		$('#diag01').val("A88.1");
		$('#diag02').val("A01.03");
		$('#diag03').val("A01.04");
		$('#diag04').val("A01.05");
		$('#diag05').val("A02.1");
		$('#diag06').val("A02.22");
		$('#diag07').val("A02.23");
		$('#diag08').val("A02.24");
		$('#diag09').val("A06.5");
		$('#diag10').val("A07.2");
		$('#diag11').val("Z94.84");
		$('#diag12').val("Z95.811");
		$('#diag13').val("Z95.812");
		$('#diag14').val("Z99.11");
		$('#diag15').val("Z99.12");
		$('#diag16').val("Z99.2");
		$('#diag17').val("Z91.15");
		$('#diag18').val("Z93.0");
		$('#diag19').val("Z94.1");
		$('#diag20').val("Y62.2");
	});	
	
	// Lookup Member via name & DOB
	$("#lookUpMemberNameDOB").click(function(){
		var mname = $('#mname').val().replace(/ /g,"").split(',');
		var mnamelast = mname[0];
		var mnamefirst = mname[1];
	
		var Url='/ChartReview/php/getMemberByNameDOB.php?mnamelast=' + mnamelast + '&mnamefirst=' + mnamefirst + '&mdob=' + $('#mdob').val();
		$.ajax({
			url: Url,
			type:"GET",
			success: function(result){				
				if(result == "0") {
					$('#memberErrorMessage').html("Member " + $('#mname').val().replace(/ /g,"") + ' with DOB ' + $('#mdob').val() +  " does not exist");
					$('#memberid').val('');
					$('#mbi').val('');
					$('#hicn').val('');
					$('#MasterPersonID').val('');
					$('#memberOK').hide();
					$('#memberNOTOK').show();
				} else {
					$('#memberErrorMessage').html("");
					var resultArray = result.split("|");
					$('#mname').val(resultArray[5] + ', ' + resultArray[6]);
					$('#memberid').val(resultArray[1]);
					$('#mbi').val(resultArray[2]);
					$('#hicn').val(resultArray[3]);
					$('#MasterPersonID').val(resultArray[4]);
					$('#memberNOTOK').hide();
					$('#memberOK').show();
				}
			},
			error:function(error){
				console.log("Error in " + Url + " - report to IT Support - ${error}");
			}
		});	
	});	
	
	// Lookup Member via Member ID
	$("#lookUpMemberID").click(function(){
		var Url='/ChartReview/php/getMemberByMemberID.php?memberid=' + $('#memberid').val();
		$.ajax({
			url: Url,
			type:"GET",
			success: function(result){
				if(result == "0") {
					$('#memberErrorMessage').html("Member ID " + $('#memberid').val() +  " does not exist");
					$('#mname').val('');
					$('#mdob').val('');
					$('#mbi').val('');
					$('#hicn').val('');
					$('#MasterPersonID').val('');
					$('#memberOK').hide();
					$('#memberNOTOK').show();
				} else {
					$('#memberErrorMessage').html("");
					var resultArray = result.split("|");
					$('#mname').val(resultArray[1] + ', ' + resultArray[2]);
					$('#mbi').val(resultArray[3]);
					$('#hicn').val(resultArray[4]);
					$('#mdob').val(resultArray[5]);
					$('#MasterPersonID').val(resultArray[6]);
					$('#memberNOTOK').hide();
					$('#memberOK').show();
				}
			},
			error:function(error){
				console.log("Error in " + Url + " - report to IT Support - ${error}");
			}
		});	
	});	

	// Lookup Member via MBI
	$("#lookUpMemberMBI").click(function(){
		var Url='/ChartReview/php/getMemberByMBI.php?mbi=' + $('#mbi').val();
		$.ajax({
			url: Url,
			type:"GET",
			success: function(result){
				if(result == "0") {
					$('#memberErrorMessage').html("MBI " + $('#mbi').val() + " does not exist");
					$('#mname').val('');
					$('#mdob').val('');
					$('#memberid').val('');
					$('#hicn').val('');
					$('#MasterPersonID').val('');
					$('#memberOK').hide();
					$('#memberNOTOK').show();
				} else {
					$('#memberErrorMessage').html("");
					var resultArray = result.split("|");
					$('#mname').val(resultArray[1] + ', ' + resultArray[2]);
					$('#memberid').val(resultArray[3]);
					$('#hicn').val(resultArray[4]);
					$('#mdob').val(resultArray[5]);
					$('#MasterPersonID').val(resultArray[6]);
					$('#memberNOTOK').hide();
					$('#memberOK').show();
				}
			},
			error:function(error){
				console.log("Error in " + Url + " - report to IT Support - ${error}");
			}
		});	
	});	

	// Lookup Member via HICN
	$("#lookUpMemberHICN").click(function(){
		var Url='/ChartReview/php/getMemberByHICN.php?hicn=' + $('#hicn').val();
		$.ajax({
			url: Url,
			type:"GET",
			success: function(result){
				if(result == "0") {
					$('#memberErrorMessage').html("HICN " + $('#hicn').val() + " does not exist");
					$('#mname').val('');
					$('#mdob').val('');
					$('#memberid').val('');
					$('#mbi').val('');
					$('#MasterPersonID').val('');
					$('#memberOK').hide();
					$('#memberNOTOK').show();
				} else {
					$('#memberErrorMessage').html("");
					var resultArray = result.split("|");
					$('#mname').val(resultArray[1] + ', ' + resultArray[2]);
					$('#memberid').val(resultArray[3]);
					$('#mbi').val(resultArray[4]);
					$('#mdob').val(resultArray[5]);
					$('#MasterPersonID').val(resultArray[6]);
					$('#memberNOTOK').hide();
					$('#memberOK').show();
				}
			},
			error:function(error){
				console.log("Error in " + Url + " - report to IT Support - ${error}");
			}
		});	
	});

	// NPI Lookup Via Name	
	$("#lookUpNPI").click(function(){
		var providerFullName = $('#pname').val();
		var providerName = providerFullName.split(',');
		var providerLastName = providerName[0];
		var providerfirstName = "";
		if(providerName.length > 1) {
			providerfirstName = providerName[1];
		}
		var Url='/ChartReview/php/getProviderByName.php?first_name=' + providerfirstName.replace(/ /g, '') + '&last_name=' + providerLastName.replace(/ /g, '');
		$.ajax({
			url: Url,
			type:"GET",
			success: function(result){
				if(result == "0") {
					$('#providerErrorMessage').html("Provider with name " + $('#pname').val() + " does not exist");
					$('#providerOK').hide();
					$('#providerNOTOK').show();
					$('#npi').val('');
					$('#MasterProviderID').text('');
				} else {
					var recordArray = result.split("~");
					$('#providerErrorMessage').html("");
					$('#pname').removeClass("invalid").removeClass("error_show").addClass("valid");
					$('#npi').removeClass("invalid").removeClass("error_show").addClass("valid");
					$('#providerOK').show();
					$('#providerNOTOK').hide();
					if(recordArray.length > 1) {
						var table = document.getElementById("providerTable");
						for(var x=0; x+1<recordArray.length; x++) {
							var record = recordArray[x].split('|');
							var row = table.insertRow(0);
							var cell0 = row.insertCell(0);
							cell0.innerHTML = '<a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" onclick="providerChosen(\'' + record[0] + '\',\'' + record[1] + '\',\'' + record[2] + '\',\'' + record[4] + '\')">' 
							+ '<span class="prvID">' + record[0] + '</span>'
							+ '<span class="prvFirst">' + record[1] + '</span>'
							+ '<span class="prvLast">' + record[2] + '</span>'
							+ '<span class="prvNPI">' + record[4] + '</span></a>';
							$('#providerPickList').slideDown();
						}
					} else {
						var record = recordArray[0].split("|");
						$('#MasterProviderID').val(record[0]);
						$('#npi').val(record[4]);
						$('#providerPickList').slideUp();
					}
				}
			},
			error:function(error){
				alert('Error ${error}')
			}
		})
	});
	
	$("#checkNPI").click(function(){
		var providerNPI = $('#npi').val();
		var Url='/ChartReview/php/getProviderByNPI.php?npi=' + providerNPI.replace(/ /g, '');
		$.ajax({
			url: Url,
			type:"GET",
			success: function(result){
				if(result == "0") {
					$('#providerErrorMessage').html("Provider with NPI " + $('#npi').val() + " does not exist");
					$('#providerOK').hide();
					$('#providerNOTOK').show();
					$('#pname').val('');
					$('#MasterProviderID').val('');
				} else {
					var recordArray = result.split("~");
					$('#providerErrorMessage').html("");
					$('#pname').removeClass("invalid").removeClass("error_show").addClass("valid");
					$('#npi').removeClass("invalid").removeClass("error_show").addClass("valid");
					$('#providerOK').show();
					$('#providerNOTOK').hide();
					if(recordArray.length > 1) {
						var table = document.getElementById("providerTable");
						for(var x=0; x+1<recordArray.length; x++) {
							var record = recordArray[x].split('|');
							var row = table.insertRow(0);
							var cell0 = row.insertCell(0);
							cell0.innerHTML = '<a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" onclick="providerChosen(\'' + record[0] + '\',\'' + record[1] + '\',\'' + record[2] + '\',\'' + record[4] + '\')">' 
							+ '<span class="prvID">' + record[0] + '</span>'
							+ '<span class="prvFirst">' + record[1] + '</span>'
							+ '<span class="prvLast">' + record[2] + '</span>'
							+ '<span class="prvNPI">' + record[4] + '</span></a>';
							$('#providerPickList').slideDown();
						}
					} else {
						var record = recordArray[0].split("|");
						$('#MasterProviderID').val(record[0]);
						$('#pname').val(record[3]);
						$('#providerPickList').slideUp();
					}
				}
			},
			error:function(error){
				alert('Error ${error}')
			}
		})
	});
	
	// NPI Lookup Via Name
/*
	$("#lookUpNPI").click(function(){
		var providerFullName = $('#pname').val();
		var providerName = providerFullName.split(',');
		var Url='https://cors-anywhere.herokuapp.com/https://npiregistry.cms.hhs.gov/api/?version=2.1&first_name=' + providerName[1].replace(/ /g, '') + '&last_name=' + providerName[0].replace(/ /g, '');
		$.ajax({
			url: Url,
			type:"GET",
			success: function(result){
				if(result == "0") {
					$('#providerErrorMessage').html("Provider with name " + $('#pname').val() + " does not exist");
					$('#npi').val('');
					$('#MasterProviderID').val('');
					//???
					//$('#MasterProviderID').val('');
				} else {
					$('#providerErrorMessage').html("");
					$('#npi').val(result["results"][0]["number"]);
					$('#pname').removeClass("invalid").removeClass("error_show").addClass("valid");
					$('#npi').removeClass("invalid").removeClass("error_show").addClass("valid");
					//???
					//$('#MasterProviderID').val('');
				}
			},
			error:function(error){
				alert('Error ${error}')
			}
		})
	});
	
	// NPI# Check	
	$("#checkNPI").click(function(){
		var Url='https://cors-anywhere.herokuapp.com/https://npiregistry.cms.hhs.gov/api/?version=2.1&number=' + $('#npi').val();
		$.ajax({
			url: Url,
			type:"GET",
			success: function(result){
				if(result == "0") {
					$('#providerErrorMessage').html("Provider NPI " + $('#npi').val() + " does not exist");
					$('#pname').val('');
					//???
					//$('#MasterProviderID').val('');
				} else {
					$('#providerErrorMessage').html("");
					$('#pname').val(result["results"][0]["basic"]["name"]);
					$('#pname').removeClass("invalid").removeClass("error_show").addClass("valid");
					$('#npi').removeClass("invalid").removeClass("error_show").addClass("valid");
					//???
					//$('#MasterProviderID').val('');	
				}
			},
			error:function(error){
				alert('Error ${error}')
			}
		})
	});
*/
	// Submit
	$("#submitForm").click(function(){
		error_free=true;

    	// Confirm form sub-headings
    	$('#confirmMember').html("<h6>Member:</h6>");
    	$('#confirmProvider').html("<h6>Provider:</h6>");
    	$('#confirmEncounter').html("<h6>Encounter:</h6>");
    	$('#confirmDiagnosis').html("<h6>Diagnoses:</h6>");

		if($('#mname').val() != "") {
			$('#mname').removeClass("invalid").addClass("valid");
		} else {
			$('#mname').removeClass("valid").addClass("invalid");
			error_free=false;
		}
		if($('#mdob').val() != "") {
			$('#mdob').removeClass("invalid").addClass("valid");
		} else {
			$('#mdob').removeClass("valid").addClass("invalid");
			error_free=false;
		}
		if($('#memberid').val() != "") {
			$('#memberid').removeClass("invalid").addClass("valid");
		} else {
			$('#memberid').removeClass("valid").addClass("invalid");
			error_free=false;
		}
		if($('#mbi').val() != "") {
			$('#mbi').removeClass("invalid").addClass("valid");
		} else {
			$('#mbi').removeClass("valid").addClass("invalid");
			error_free=false;
		}
		if($('#hicn').val() != "") {
			$('#hicn').removeClass("invalid").addClass("valid");
		} else {
			$('#hicn').removeClass("valid").addClass("invalid");
			error_free=false;
		}
		if($('#pname').val() != "") {
			$('#pname').removeClass("invalid").addClass("valid");
		} else {
			$('#pname').removeClass("valid").addClass("invalid");
			error_free=false;
		}
		if($('#npi').val() != "") {
			$('#npi').removeClass("invalid").addClass("valid");
		} else {
			$('#npi').removeClass("valid").addClass("invalid");
			error_free=false;
		}
		if($('#dos').val() != "") {
			$('#dos').removeClass("invalid").addClass("valid");
		} else {
			$('#dos').removeClass("valid").addClass("invalid");
			error_free=false;
		}
		$('#procedureCode').removeClass("invalid").addClass("valid");
		if($('#diag01').val() != "") {
			$('#diag01').removeClass("invalid").addClass("valid");
		} else {
			$('#diag01').removeClass("valid").addClass("invalid");
			error_free=false;
		}
		
		// check diagnoses
		validateDiagnoses(displayConfirmForm);

	});

	// Clear Form
	$("#clearForm").click(function(){
		clearForm();
	});
	
	// Void
	$("#void").click(function(){
		
		// confirm box
		
		
		
		var Url='/ChartReview/php/insertChartReview.php?ChartReviewID=' + $('#chartReviewID').val()
				+ '&ChartReviewStatusID=2'
				+ '&lastUpdatedBy=' + 'smccready';
		$.ajax({
			url: Url,
			type:"GET",
			success: function(result){
				populateCRList();
			},
			error:function(error){
				alert('Error ${error}')
			}
		})
	});
	
	// Cancel Form
	$("#cancel").click(function(){
		$('#memberErrorMessage').html('');
		$('#providerErrorMessage').html('');
		$('#encounterErrorMessage').html('');
		$('#diagnosisErrorMessage').html('');
		$('#chartReviewForm').slideUp();
		$('#chartReviewList').slideDown();
		clearForm();
	});
	
	// Edit Form
	$("#edit").click(function(){
		$('#confirmForm').slideUp();
		$('#chartReviewForm').slideDown();
	});
	
	// Confirm Form
	$("#confirm").click(function(){
	
		$('#memberErrorMessage').html('');
		$('#providerErrorMessage').html('');
		$('#encounterErrorMessage').html('');
		$('#diagnosisErrorMessage').html('');
	
		if($('#confirmChartReviewID').val()==""){
			var Url='/ChartReview/php/insertChartReview.php?MasterPersonId=' + $('#MasterPersonID').val()
				+ '&MasterProviderId=' + $('#MasterProviderID').val()
				+ '&dateOfService=' + $('#dos').val()
				+ '&procedureCode=' + $('#procedureCode').val()
				+ '&procedureCodeType=1'
				+ '&ChartReviewStatusID=0'
				+ '&diag01=' + $('#diag01').val() + '&HCC01=' + $('#HCC01').val()
				+ '&diag02=' + $('#diag02').val() + '&HCC02=' + $('#HCC02').val()
				+ '&diag03=' + $('#diag03').val() + '&HCC03=' + $('#HCC03').val()
				+ '&diag04=' + $('#diag04').val() + '&HCC04=' + $('#HCC04').val()
				+ '&diag05=' + $('#diag05').val() + '&HCC05=' + $('#HCC05').val()
				+ '&diag06=' + $('#diag06').val() + '&HCC06=' + $('#HCC06').val()
				+ '&diag07=' + $('#diag07').val() + '&HCC07=' + $('#HCC07').val()
				+ '&diag08=' + $('#diag08').val() + '&HCC08=' + $('#HCC08').val()
				+ '&diag09=' + $('#diag09').val() + '&HCC09=' + $('#HCC09').val()
				+ '&diag10=' + $('#diag10').val() + '&HCC10=' + $('#HCC10').val()
				+ '&diag11=' + $('#diag11').val() + '&HCC11=' + $('#HCC11').val()
				+ '&diag12=' + $('#diag12').val() + '&HCC12=' + $('#HCC12').val()
				+ '&diag13=' + $('#diag13').val() + '&HCC13=' + $('#HCC13').val()
				+ '&diag14=' + $('#diag14').val() + '&HCC14=' + $('#HCC14').val()
				+ '&diag15=' + $('#diag15').val() + '&HCC15=' + $('#HCC15').val()
				+ '&diag16=' + $('#diag16').val() + '&HCC16=' + $('#HCC16').val()
				+ '&diag17=' + $('#diag17').val() + '&HCC17=' + $('#HCC17').val()
				+ '&diag18=' + $('#diag18').val() + '&HCC18=' + $('#HCC18').val()
				+ '&diag19=' + $('#diag19').val() + '&HCC19=' + $('#HCC19').val()
				+ '&diag20=' + $('#diag20').val() + '&HCC20=' + $('#HCC20').val()
				+ '&createdBy=' + 'smccready';
			$.ajax({
				url: Url,
				type:"GET",
				success: function(result){
					populateCRList();
				},
				error:function(error){
					alert('Error ${error}')
				}
			})	
		} else {
			var Url='/ChartReview/php/updateChartReview.php?MasterPersonId=' + $('#MasterPersonID').val()
				+ '&MasterProviderId=' + $('#MasterProviderID').val()
				+ '&dateOfService=' + $('#dos').val()
				+ '&procedureCode=' + $('#procedureCode').val()
				+ '&procedureCodeType=1'
				+ '&ChartReviewStatusID=0'
				+ '&diag01=' + $('#diag01').val() + '&HCC01=' + $('#HCC01').val()
				+ '&diag02=' + $('#diag02').val() + '&HCC02=' + $('#HCC02').val()
				+ '&diag03=' + $('#diag03').val() + '&HCC03=' + $('#HCC03').val()
				+ '&diag04=' + $('#diag04').val() + '&HCC04=' + $('#HCC04').val()
				+ '&diag05=' + $('#diag05').val() + '&HCC05=' + $('#HCC05').val()
				+ '&diag06=' + $('#diag06').val() + '&HCC06=' + $('#HCC06').val()
				+ '&diag07=' + $('#diag07').val() + '&HCC07=' + $('#HCC07').val()
				+ '&diag08=' + $('#diag08').val() + '&HCC08=' + $('#HCC08').val()
				+ '&diag09=' + $('#diag09').val() + '&HCC09=' + $('#HCC09').val()
				+ '&diag10=' + $('#diag10').val() + '&HCC10=' + $('#HCC10').val()
				+ '&diag11=' + $('#diag11').val() + '&HCC11=' + $('#HCC11').val()
				+ '&diag12=' + $('#diag12').val() + '&HCC12=' + $('#HCC12').val()
				+ '&diag13=' + $('#diag13').val() + '&HCC13=' + $('#HCC13').val()
				+ '&diag14=' + $('#diag14').val() + '&HCC14=' + $('#HCC14').val()
				+ '&diag15=' + $('#diag15').val() + '&HCC15=' + $('#HCC15').val()
				+ '&diag16=' + $('#diag16').val() + '&HCC16=' + $('#HCC16').val()
				+ '&diag17=' + $('#diag17').val() + '&HCC17=' + $('#HCC17').val()
				+ '&diag18=' + $('#diag18').val() + '&HCC18=' + $('#HCC18').val()
				+ '&diag19=' + $('#diag19').val() + '&HCC19=' + $('#HCC19').val()
				+ '&diag20=' + $('#diag20').val() + '&HCC20=' + $('#HCC20').val()
				+ '&lastUpdatedBy=' + 'smccready' 
				+ '&chartReviewID=' + $('#chartReviewID').val();
			$.ajax({
				url: Url,
				type:"GET",
				success: function(result){
					populateCRList();
				},
				error:function(error){
					alert('Error ${error}')
				}
			})
		}
		
		$('#confirmForm').slideUp();
		$('#chartReviewList').slideDown();
		clearForm();
	});
	
});

function populateCRList() {
	var Url='/ChartReview/php/getChartReviewList.php?filterYear=' + $('#filterYear').val() + '&filterMonth=' + $('#filterMonth').val() + '&filterStatus=' + $('#filterStatus').val();

	$.ajax({
		url: Url,
		type:"GET",
		success: function(result){
			if(result!='0') {
				$('#crList').html(result);
			} else {
				$('#crList').html("<p style='text-align:center'><i class='far fa-frown'></i><br/>No chart reviews meet the filter criteria: <br/>Year = " + $('#filterYear').val() + "<br/>Month = " + $('#filterMonth').val() + "<br/>Status = " + $('#filterStatus').val() + "</p>");
			}
		},
		error: function(error){
			console.log($('#crList').html("Error in " + Url + " - report to IT Support - ${error}"));
		}
	});
}

function clearForm() {
	$('#crForm')[0].reset();
	$('#memberOK').hide();
	$('#providerOK').hide();
	$('#encounterOK').hide();
	$('#memberNOTOK').hide();
	$('#providerNOTOK').hide();
	$('#encounterNOTOK').hide();
	$('#dos').val(new Date().toDateInputValue());
}

function validateDiagnoses (callback){
	var diagArray = [];
	
	if($('#diag01').val()!="") {diagArray.push(['#diag01', $('#diag01').val()]);}
	if($('#diag02').val()!="") {diagArray.push(['#diag02', $('#diag02').val()]);}
	if($('#diag03').val()!="") {diagArray.push(['#diag03', $('#diag03').val()]);}
	if($('#diag04').val()!="") {diagArray.push(['#diag04', $('#diag04').val()]);}
	if($('#diag05').val()!="") {diagArray.push(['#diag05', $('#diag05').val()]);}
	if($('#diag06').val()!="") {diagArray.push(['#diag06', $('#diag06').val()]);}
	if($('#diag07').val()!="") {diagArray.push(['#diag07', $('#diag07').val()]);}
	if($('#diag08').val()!="") {diagArray.push(['#diag08', $('#diag08').val()]);}
	if($('#diag09').val()!="") {diagArray.push(['#diag09', $('#diag09').val()]);}
	if($('#diag10').val()!="") {diagArray.push(['#diag10', $('#diag10').val()]);}
	if($('#diag11').val()!="") {diagArray.push(['#diag11', $('#diag11').val()]);}
	if($('#diag12').val()!="") {diagArray.push(['#diag12', $('#diag12').val()]);}
	if($('#diag13').val()!="") {diagArray.push(['#diag13', $('#diag13').val()]);}
	if($('#diag14').val()!="") {diagArray.push(['#diag14', $('#diag14').val()]);}
	if($('#diag15').val()!="") {diagArray.push(['#diag15', $('#diag15').val()]);}
	if($('#diag16').val()!="") {diagArray.push(['#diag16', $('#diag16').val()]);}
	if($('#diag17').val()!="") {diagArray.push(['#diag17', $('#diag17').val()]);}
	if($('#diag18').val()!="") {diagArray.push(['#diag18', $('#diag18').val()]);}
	if($('#diag19').val()!="") {diagArray.push(['#diag19', $('#diag19').val()]);}
	if($('#diag20').val()!="") {diagArray.push(['#diag20', $('#diag20').val()]);}
	
	if(diagArray.length == 0) {
		callback();
	} else {
	
		for (var i = 0; i < diagArray.length; i++) {
		(function(index) {
			var Url='/ChartReview/php/validateDiagnoses.php?diag=' + diagArray[i][1];
			var diag = diagArray[i][0];
			var diagnosis = diagArray[i][1];
			$.ajax({
				url: Url,
				type:"GET",
				success: function(result){
					var resultArray = result.split('|');
					if(resultArray[0]==0) {
						$(diag).removeClass("valid").addClass("invalid");
						error_free=false;
						$('#diagnosisErrorMessage').html("The highlighted diagnosis are not valid");
					} else  {
						$(diag).removeClass("invalid").addClass("valid");
						error_free=true;
						$('#diagnosisErrorMessage').html("");
//						$('#confirmDiagnosis').append(diag.substr(5,6) + ": " + diagnosis + " " + resultArray[1] + "<br/>");
					}
	
				},
				error:function(error){
					alert('Error ${error}')
				}
			})
		})(i);
	}	

	callback();

	}
}

function validateDiagnosis(diagnosisSequence, diagnosisCode) {
	var Url='/ChartReview/php/validateDiagnoses.php?diag=' + diagnosisCode;
	$.ajax({
		url: Url,
		type:"GET",
		success: function(result){
			checkDiagnosis(diagnosisSequence, diagnosisCode, result);
		},
		error:function(error){
			checkDiagnosis(diagnosisSequence, diagnosisCode, "0|Error in " + Url + " - report to IT Support - ${error}");
		}
	});
}

function checkDiagnosis (diagnosisSequence, diagnosisCode, result) {
	var resultArray = result.split('|');
	if(resultArray[0]==0) {
		$(diagnosisSequence).removeClass("valid").addClass("invalid");
		error_free=false;
		// ?? debug this
		// Displaying after --> submit --> change
		$('#diagnosisErrorMessage').html("The highlighted diagnosis are not valid");
	} else  {
		$(diagnosisSequence).removeClass("invalid").addClass("valid");
		error_free=true;
		$('#diagnosisErrorMessage').html("");
		$('#confirmDiag'+diagnosisSequence).append(diagnosisSequence.substr(5,6) + ": " + diagnosisCode + " " + resultArray[1] + "<br/>");
	}
}

function displayConfirmForm (){
	console.log('displayConfirmForm');
	var form_data=$("#crForm").serializeArray();

	for (var input in form_data){
		var element=$("#"+form_data[input]['name']);
		var valid=element.hasClass("valid");
		var error_element=$("span", element.parent());
		if (!valid && error_element != 'procedureCode'){
			error_element.removeClass("error").addClass("error_show");
			element.removeClass("error").addClass("error_show");
			error_free=false;
		} else {
			error_element.removeClass("error_show").addClass("error");
			element.removeClass("error_show").addClass("error");
		}
	}

	if (error_free){
		$('#memberErrorMessage').html("");
		$('#providerErrorMessage').html("");
		$('#encounterErrorMessage').html("");
		$('#diagnosisErrorMessage').html("");
			
		// Display confirmation
		$('#confirmMember').append($('#mname').val() + " (" + $('#mdob').val() + ")&nbsp;&nbsp;<strong>Member ID:</strong> " + $('#memberid').val() + "&nbsp;&nbsp;<strong>MBI:</strong> " + $('#mbi').val() + "&nbsp;&nbsp;<strong>HICN:</strong> " + $('#hicn').val());
		$('#confirmProvider').append($('#pname').val() + " (" + $('#npi').val() + ")");
		$('#confirmEncounter').append("<strong>Date of Service:</strong> " + $('#dos').val());
		$('#confirmEncounter').append("<br/><strong>Procedure:</strong> " + $('#procedureCode option:selected').text());
		
		var diagArray = [];
		
		diagArray.push($('#diag01').val());
		if($('#diag02').val()!=''){	diagArray.push($('#diag02').val());	}
		if($('#diag03').val()!=''){	diagArray.push($('#diag03').val());	}
		if($('#diag04').val()!=''){	diagArray.push($('#diag04').val());	}
		if($('#diag05').val()!=''){	diagArray.push($('#diag05').val());	}
		if($('#diag06').val()!=''){	diagArray.push($('#diag06').val());	}
		if($('#diag07').val()!=''){	diagArray.push($('#diag07').val());	}
		if($('#diag08').val()!=''){	diagArray.push($('#diag08').val());	}
		if($('#diag09').val()!=''){	diagArray.push($('#diag09').val());	}
		if($('#diag10').val()!=''){	diagArray.push($('#diag10').val());	}
		if($('#diag11').val()!=''){	diagArray.push($('#diag11').val());	}
		if($('#diag12').val()!=''){	diagArray.push($('#diag12').val());	}
		if($('#diag13').val()!=''){	diagArray.push($('#diag13').val());	}
		if($('#diag14').val()!=''){	diagArray.push($('#diag14').val());	}
		if($('#diag15').val()!=''){	diagArray.push($('#diag15').val());	}
		if($('#diag16').val()!=''){	diagArray.push($('#diag16').val());	}
		if($('#diag17').val()!=''){	diagArray.push($('#diag17').val());	}
		if($('#diag18').val()!=''){	diagArray.push($('#diag18').val());	}
		if($('#diag19').val()!=''){	diagArray.push($('#diag19').val());	}
		if($('#diag20').val()!=''){	diagArray.push($('#diag20').val());	}
		
		$('#confirmDiag1').html('');
		$('#confirmDiag2').html('');
		$('#confirmDiag3').html('');
		$('#confirmDiag4').html('');
		$('#confirmDiag5').html('');
		$('#confirmDiag6').html('');
		$('#confirmDiag7').html('');
		$('#confirmDiag8').html('');
		$('#confirmDiag9').html('');
		$('#confirmDiag10').html('');
		$('#confirmDiag11').html('');
		$('#confirmDiag12').html('');
		$('#confirmDiag13').html('');
		$('#confirmDiag14').html('');
		$('#confirmDiag15').html('');
		$('#confirmDiag16').html('');
		$('#confirmDiag17').html('');
		$('#confirmDiag18').html('');
		$('#confirmDiag19').html('');
		$('#confirmDiag20').html('');
		
		for (var i = 0; i < diagArray.length; i++) {
			(function(index) {
				var j = i + 1;
				var planYear = $('#dos').val();
				var Url='/ChartReview/php/getDiagnosis.php?diag=' + diagArray[i] + '&i=' + j.toString() + '&PlanYear=' + planYear.substring(0,4);
				$.ajax({
					url: Url,
					type:"GET",
					success: function(result){
						var resultArray=result.split("|");
						$('#confirmDiag'+resultArray[2]).html(resultArray[2]  + '. ' + resultArray[0] + ' ' + resultArray[1]);
						if(resultArray[3]!=''){
							$('#confirmDiag'+resultArray[2]).append(' (<strong>HCC: ' + resultArray[3] + '</strong> - ' + resultArray[4] + ')');
						}
						//$('#confirmDiag'+resultArray[2]).append('<br/>');
					},
					error:function(error){
						alert('Error ${error}')
					}
				})
			})(i);
		}	
	
		$('#chartReviewForm').slideUp();
		$('#confirmForm').slideDown();
	} else {
		if($('#mname').val()=="" || $('#mdob').val()=="" || $('#memberid').val()=="" || $('#mbi').val()=="" || $('#hicn').val()) {
			$('#memberErrorMessage').html("The highlighted member fields are required");
		}
		if($('#pname').val()=="" || $('#npi').val()=="") {
			$('#providerErrorMessage').html("The highlighted provider fields are required");
		}
		if($('#dos').val()=="") {
			$('#encounterErrorMessage').html("The date of service is required");
		}
		if($('#diag01').val()=="") {
			$('#diagnosisErrorMessage').html("At least 1 diagnosis is required");
		}
	}
}

function editChartReview(ChartReviewID) {
	var Url='/ChartReview/php/getChartReview.php?ChartReviewID='+ChartReviewID;
	$('#confirmChartReviewID').text(ChartReviewID);
	$('#chartReviewID').val(ChartReviewID);
	$.ajax({
		url: Url,
		type:"GET",
		success: function(result){
			var crArray = result.split('|');
			$('#mname').val(crArray[2] + ', ' + crArray[1]);
			$('#mdob').val(crArray[3]);
			$('#memberid').val(crArray[4]);
			$('#mbi').val(crArray[5]);
			$('#hicn').val(crArray[6]);
			$('#pname').val(crArray[8]);
			$('#npi').val(crArray[9]);
			$('#dos').val(crArray[0]);
			// Get Diagnoses
			$('#diag01').val(crArray[12]);
			//Other Diagnosis
			for(var x=13;x<=crArray.length;x++){
				var diagSeq = x-11;
				var zeroOrBlank = '0'
				if(diagSeq>=10){
					zeroOrBlank = '';
				}
				$('#diag'+zeroOrBlank+diagSeq).val(crArray[x]);
			}
			$('#MasterPersonID').text(crArray[10]);
			$('#crHeader').text("Editing Chart Review " + crArray[11]);
			$('#memberOK').show();
			$('#memberNOTOK').hide();
			$('#providerOK').show();
			$('#providerNOTOK').hide();
			$('#encounterOK').show();
			$('#encounterNOTOK').hide();
			$('#clearForm').hide();
			$('#void').show();
		},
		error:function(error){
			alert("Error in " + Url + " - report to IT Support - ${error}");
		}
	});
	
	$('#chartReviewList').slideUp();
	$('#chartReviewForm').slideDown();
}

function providerChosen(providerID, pfirstname, plastname, NPI){
	$('#MasterProviderID').val(providerID);
	$('#pname').val(pfirstname + ' ' + plastname);
	$('#npi').val(NPI);
	$('#providerPickList').slideUp();
	$('#providerOK').show();
	$('#providerNOTOK').hide();
}
