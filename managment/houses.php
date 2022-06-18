<?php
include_once 'config/Database.php';
include_once 'class/house.php';


$database = new Database();
$db = $database->getConnection();

$user = new House($db);

// if(!$user->loggedIn()) {
// 	header("Location: index.php");
// }
include('inc/header.php');
?>
<title>beytek v eydk</title>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/house.js"></script>	
<script src="js/general.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" >  
<?php include('inc/container.php');?>
<div class="container">  
	<?php include('top_menus.php'); ?>	
	<div> 	
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-10">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-2" align="right">
					<button type="button" id="addHouse" class="btn btn-info" title="Add house">
						<span class="glyphicon glyphicon-plus"></span></button>
				</div>
			</div>
		</div>
		<table id="houseListing" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>type</th>					
					<th>choix</th>
					<th>prix</th>										
					<th>lieu</th>					
					<!-- <th>image</th> -->
					<th>detail</th>	
					<th>editer</th>	
					<th>suprimer</th>	    

				</tr>
			</thead>
		</table>
	</div>
	
	<div id="houseModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="houseForm" enctype="multipart/form-data">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Record</h4>
    				</div>
    				<div class="modal-body">
						<div class="form-group">
							<label for="name" class="control-label">type</label>
							<input type="text" class="form-control" id="type" name="type" placeholder="type" required>			
						</div>
						<div class="form-group">
							<label for="choix" class="control-label">choix</label>							
						<select class="form-control" id="choix" name="choix" placeholder="choix" required>
						<option></option>
							
							<option class="form-control"><h1>louer</h1></option>
							<option class="form-control"><h1>acheter</h1></option>
							
</select>
						</div>	   	
						<!-- <div class="form-group">
							<label for="lieu" class="control-label">lieu</label>							
							<input type="text" class="form-control"  id="lieu" name="lieu" placeholder="lieu" required>							
						</div>	 -->
						<select class="form-control" id="lieu" name="lieu" placeholder="lieu" required>
						<option></option>
							
							<option class="form-control"><h1>aravat</h1></option>
							<option class="form-control"><h1>tevrag zein</h1></option>
							<option class="form-control"><h1>teyarte</h1></option>
							<option class="form-control"><h1>dar el naim</h1></option>
							<option class="form-control"><h1>el mina</h1></option>
							<option class="form-control"><h1>el riyad</h1></option>
							<option class="form-control"><h1>el sabka</h1></option>
							<option class="form-control"><h1>lksar</h1></option>

							
						</select>		
							<!-- <div class="form-group">
													<label for="image" class="control-label">image</label>							
													<input type="text" class="form-control"  id="image" name="image"  required>							
												
												</div>	 -->
							<div class="form-group">
							<label for="prix" class="control-label">prix</label>							
							<input type="number" class="form-control" id="prix" required name="prix" placeholder="prix">			
						</div>			
						</div>
    				<div class="modal-footer">
    					<input type="hidden" name="id" id="id" />
    					<input type="hidden" name="action" id="action" value="" />
    					<input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    				</div>
    			</div>
    		</form>
    	</div>
    </div>
	
	<div id="houseDetails" class="modal fade">
    	<div class="modal-dialog">    		
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> house Details</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="type" class="control-label">type:</label>
						<span id="type"></span>	
					</div>
					<div class="form-group">
						<label for="lieu" class="control-label">lieu:</label>				
						<span id="lieu"></span>							
					</div>	   	
					<div class="form-group">
						<label for="prix" class="control-label">prix:</label>							
						<span id="prix"></span>								
					</div>	
					<div class="form-group">
						<label for="choix" class="control-label">choix:</label>							
						<span id="choix"></span>								
					</div>	
					<div class="form-group">
						<label for="image" class="control-label">image:</label>							
						<span id="image"></span>					
					</div>			
				</div>    				
			</div>    		
    	</div>
    </div>
	
</div>
 <?php include('inc/footer.php');?>
