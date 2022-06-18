$(document).ready(function(){	

	var clientRecords = $('#clientListing').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,		
		"bFilter": false,
		'serverMethod': 'post',		
		"order":[],
		"ajax":{
			url:"clien_action.php",
			type:"POST",
			data:{action:'listClients'},
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
			var id = $(this).attr("id");
			var numero = $(this).attr("numero");
			var action = 'getClient';
		$.ajax({
			url:'client_action.php',
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data){				
				$("#clientModal").on("shown.bs.modal", function () { 
					$('#id').val(data.id);
					$('#numero').val(data.numero);
				
	$('.modal-title').html("<i class='fa fa-plus'></i> Edit Client");
					$('#action').val('addClient');
					$('#save').val('Save');
				}).modal({
					backdrop: 'static',
					keyboard: false
				});			
			}
		});
	// 		$('#clientModal').modal({
	// 		backdrop: 'static',
	// 		keyboard: false
	// 	});
	// 	$('#clientForm')[0].reset();
	// 	$('.modal-title').html("<i class='fa fa-plus'></i> Add Client");
	// 	$('#action').val('addClient');
	// $('#save').val('Save');
	});		
	
	$("#clientModal").on('submit','#clientForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"clien_action.php",
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
	
	$("#clientListing").on('click', '.view', function(){
		var id = $(this).attr("id");
		var action = 'getClient';
		$.ajax({
			url:'clien_action.php',
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data){				
				$("#clientDetails").on("shown.bs.modal", function () { 					
					$('#cname').html(data.name);
					$('#cprenom').html(data.prenom);
					$('#cdescription').html(data.description);				
					$('#cphone').html(data.phone);
					$('#caddress').html(data.address);
				}).modal();			
			}
		});
	});
	
});