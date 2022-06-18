<?php
include_once 'config/Database.php';
include_once 'class/User.php';

include_once 'class/Client.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

include('inc/header.php');
?>
<title>beytek v eydk</title>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/buy.js"></script>	
<!-- <script src="js/i.js"></script>	 -->
<script src="js/general.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" >  
<?php include('inc/container.php');?>
<div class="container">  
	<?php @include('top.php'); ?>	
	<div> 	
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-10">
					<h3 class="panel-title"></h3>
				</div>
				<div class="col-md-2" align="right">
				CHERCHER	<a href="serch/index.html"><button type="button"  class="btn btn-info" title="chercher">
						<span class="glyphicon glyphicon-search"></span></button></a>
				</div>
			</div>
		</div>
		<table id="clientListing" class="table table-bordered table-striped">
			<thead>
				<tr>
                <th>#</th>
					<th>type</th>					
					<th>choix</th>
					<th>prix</th>										
					<th>lieu</th>					
					<th>image</th>
					<th>detail</th>
<th>acheter</th>	</tr>
			</thead>
		</table>
	</div>
	
	<div id="clientModal" class="modal fade">
    	<div class="modal-dialog">
    		<form method="post" id="clientForm">
    			<div class="modal-content">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><i class="fa fa-plus"></i> Edit Record</h4>
    				</div>
    				<div class="modal-body">

						<div class="form-group">
							<label for="numero" class="control-label">numero</label>
							<input type="number" class="form-control" id="numero" required name="numero" placeholder="Name" >			
						</div>
						<div class="form-group">
							<label for="name" class="control-label">Name</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>			
						</div>
						
						<div class="form-group">
							<label for="website" class="control-label">prenom</label>							
							<input type="text" class="form-control" id="prenom" name="prenom" required placeholder="prenom">							
						</div>	   	
					
						<div class="form-group">
							<label for="description" class="control-label">Description</label>							
							<textarea class="form-control" rows="2" id="description" name="description"></textarea>							
						</div>	
						<div class="form-group">
							<label for="phone" class="control-label">Phone</label>							
							<input type="text" class="form-control" id="phone" required name="phone" placeholder="phone">			
						</div>			
						<div class="form-group">
							<label for="address" class="control-label">Address</label>							
							<input type="text" class="form-control" rows="2" id="address" required name="address">						
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
	
	<div id="clientDetails" class="modal fade">
    	<div class="modal-dialog">    		
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><i class="fa fa-plus"></i> Client Details</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="name" class="control-label">Name:</label>
						<span id="cname"></span>	
					</div>
					<div class="form-group">
						<label for="cprenom" class="control-label">prenom:</label>				
						<span id="cprenom"></span>							
					</div>	   	

					<div class="form-group">
						<label for="description" class="control-label">Description:</label>							
						<span id="cdescription"></span>								
					</div>	
					<div class="form-group">
						<label for="phone" class="control-label">Phone:</label>							
						<span id="cphone"></span>					
					</div>			
					<div class="form-group">
						<label for="address" class="control-label">Address:</label>							
						<span id="caddress"></span>							
					</div>
			
				</div>    				
			</div>    		
    	</div>
    </div>
	
</div>
 <?php include('inc/footer.php');?>
