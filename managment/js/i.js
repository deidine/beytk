$(document).ready(function(){	

	var clientRecords = $('#houseListing').DataTable({
		"lengthChange": false,
		"processing":true,
		"serverSide":true,		
		"bFilter": false,
		'serverMethod': 'post',		
		"order":[],
		"ajax":{
			url:"i_action.php",
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
	
	$('#addHouse').click(function(){
		$('#houseModal').modal('show');
		$('#houseForm')[0].reset();
		$('.modal-title').html("<i class='fa fa-plus'></i> Add house");
		$('#image_id').val('');
		$('#action').val('addHouse');
		$('#save').val('envoiyer');
	});		
	$("#houseListing").on('click', '.update', function(){
		var id = $(this).attr("id");
		var action = 'gethouse';
		$.ajax({
			url:'i_action.php',
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data){				
				$("#houseModal").on("shown.bs.modal", function () { 
					$('#id').val(data.id);
					$('#type').val(data.type);
					$('#choix').val(data.choix);
					$('#prix').val(data.prix);
					$('#image').val(data.image);				
					$('#lieu').val(data.lieu);
					$('.modal-title').html("<i class='fa fa-plus'></i> Edit Client");
					$('#action').val('updatehouse');
					$('#save').val('Save');
				}).modal({
					backdrop: 'static',
					keyboard: false
				});			
			}
		});
	});
	
	$("#houseModal").on('submit','#houseForm', function(event){
		event.preventDefault();
		$('#save').attr('disabled','disabled');
		var formData = $(this).serialize();
		$.ajax({
			url:"i_action.php",
			method:"POST",
			data:formData,
			success:function(data){				
				$('#houseForm')[0].reset();
				$('#houseModal').modal('hide');				
				$('#save').attr('disabled', false);
				clientRecords.ajax.reload();
			}
		})
	});	
	
	$("#houseListing").on('click', '.delete', function(){
		var id = $(this).attr("id");		
		var action = "deletehouse";
		if(confirm("tu veux vraiment suprimer?")) {
			$.ajax({
				url:"i_action.php",
				method:"POST",
				data:{id:id, action:action},
				success:function(data) {					
					clientRecords.ajax.reload();
				}
			})
		} else {
			return false;
		}
	});	
	
	$("#houseListing").on('click', '.view', function(){
		var id = $(this).attr("id");
		var action = 'gethouse';
		$.ajax({
			url:'i_action.php',
			method:"POST",
			data:{id:id, action:action},
			dataType:"json",
			success:function(data){				
				$("#houseDetails").on("shown.bs.modal", function () { 					
					$('#type').html(data.type);
					$('#prix').html(data.prix);
					$('#lieu').html(data.lieu);
					$('#image').html(data.image);				
					$('#choix').html(data.choix);				
				}).modal();			
			}
		});
	});
	
});