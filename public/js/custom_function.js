function get_agreementlist()
{
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	$.ajax({
		type:'POST',
		url:"./agreementlist",
		dataType:'html',
		data: {_token: CSRF_TOKEN},
		success:function(response)
		{
		   $(".total_agreement_list").html(response);
		}
	});
}



function show_modal_agreement(id,type)
{
	$('#show_modal_agreement').modal('show');
	$('#employee_id_modal').val(id);  
	$('#agreement_type').val(type);
}

$(".nav_agreement").click(function(){
	get_agreementlist();
});	

$('#upload_agreement').submit(function(e)
{
    e.preventDefault();
    var form_data =  new FormData($("#upload_agreement")[0]);
	$.ajax({
		type:'post',
		url: './addagreement',		
		data:form_data,
		processData: false,
  		contentType: false,
		success:function(response)
		{
			$('#show_modal_agreement').modal('hide');
			get_agreementlist();
		  swal("Agreement Uploaded successfully","", "success");

		}
	});
});

function delete_agreement(id,type)
{
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
		type:'DELETE',
		url:"./delete_agreement/"+id+'/'+type,
		dataType:'json',
		data: {_token: CSRF_TOKEN,type:type},
		success:function(response)
		{
		   get_agreementlist();
		  swal("Delete successfully","", "success");
		}
	});
}


///////// Mileage List

$(".nav_mileage,.active_mileage").click(function(){
	get_mileagelist();
});	


function get_mileagelist()
{
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

	$.ajax({
		type:'POST',
		url:"./mileagelist",
		dataType:'html',
		data: {_token: CSRF_TOKEN},
		success:function(response)
		{
		   resp = JSON.parse(response);
	      $(".return_mileagelist").html(resp.data);

		}
	});
}





function addmileage_details()
{	
     form_data =  $('#employee_mileage').serialize();
    console.log(form_data);
	$.ajax({
		type:'post',
		url: './addmileage',		
		data:form_data,		
		success:function(response)
		{  
			$('#mileage-modal').modal('hide');
			get_mileagelist();
		  swal("Your information is submitted Successfully","", "success");

		}
	});
}

function edit_mileage(id)
{
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
		type:'post',
		url: './get_mileagedetails/'+id,
		dataType:'html',		
		data: {_token: CSRF_TOKEN},
		success:function(response)
		{
			$(".employeeagreements").html(response);
		}
	});
}


function employee_agreement()
{ var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
		type:'post',
		url: './employeeagreement',
		dataType:'html',		
		data: {_token: CSRF_TOKEN},
		success:function(response)
		{
			$(".employeeagreements").html(response);
		}
	});
}

function old_contracts()
{
	$("#old_contracts_agree").addClass("active-span");
            $("#active_contracts_agree").removeClass("active-span");
            $("#active_contracts_agreediv").hide();
            $("#old_contracts_agreediv").show();

}




// Expenses code
function expences_listed(){
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	$.ajax({
		type:'POST',
		url:"./expences_list",
		dataType:'html',
		data: {_token: CSRF_TOKEN},
		success:function(response)
		{
	   	  resp = JSON.parse(response);
	      $(".return_expence_ajax").html(resp.data);
		}
	});
}

$(".nav_expense").click(function(){
	expences_listed();
});	
$('.expences').submit(function(e)
{
    e.preventDefault();
    var form_data =  new FormData($(".expences")[0]);
	$.ajax({
		type:'post',
		url: './expences',		
		data:form_data,
		processData: false,
  		contentType: false,
		success:function(response)
		{
		  $("#expense-modal").modal("hide");
		  expences_listed();
		  swal("Expence Report Add Successfully","", "success");
		}
	});
});

