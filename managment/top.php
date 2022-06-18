<h3><?php if($_SESSION["userid"]) { echo $_SESSION["name"]; } ?> | 
<div class="col-md-2" align="right">
	<a href="login.php"><button type="button"  class="btn btn-info" title="entrer">
						<span class="glyphicon glyphicon-log-in"></span></button></a>
				</div>ENTRER</h3><br>
<p>Welcome <?php echo $_SESSION["role"]; ?></p>	
<ul class="nav nav-tabs">
	<?php if($_SESSION["role"] == 'manager') { ?>
		<li id="clients" class="active"><a href="clients.php">LES CLINTS</a></li>
		
		<li id="houses"><a href="houses.php">les LOGMENTS</a></li> 
		<li id="houses"><a href="buy.php">buying a house</a></li> 
	<?php } ?>
	
	<?php if($_SESSION["role"] == 'employee') { ?>
		<!-- <li class="active"><a href="tasks.php">AJOUTER</a></li>		 -->
		<li id="houses"><a href="buy.php">les LOGMENTS</a></li> 

	<?php } ?>

</ul>