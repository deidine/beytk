$(document).ready(function(){
	var clientRecords = $('#clientListing').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,		
		"bFilter": false,
		'serverMethod': 'post',		
		"order":[],
		"ajax":{
			url:"buy_action.php",
			type:"POST",
			data:{action:'listhouses'},
			dataType:"json"
		},
		"columnDefs":[
			{
				"targets":[0, 5, 6, 7],
				"orderable":false,
			},
		],
		"pageLength": 10
	});	
	
$("#clientListing").on('click', '.buy', function(){
		$('#clientModal').modal({
			backdrop: 'static',
			keyboard: false
		});
		$('#clientForm')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add Client");
		$('#action').val('addClient');
		$('#save').val('Save');
	});		
	$("#clientModal").on('submit','#clientForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"buy_action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#clientForm')[0].reset();
				$('#clientModal').modal('hide');				
				$('#save').attr('disabled', false);
				clientRecords.ajax.reload();
			}
		})
	});	
	
	});