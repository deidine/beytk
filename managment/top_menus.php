<h3><?php if($_SESSION["userid"]) { echo $_SESSION["name"]; } ?> | <a href="logout.php">Logout</a> </h3><br>
<p>Welcome <?php echo $_SESSION["role"]; ?></p>	
<ul class="nav nav-tabs">
	
	<?php if($_SESSION["role"] == 'manager') { ?>
		<li id="clients" class="active"><a href="clients.php">LES CLINTS</a></li>
		
		<li id="houses"><a href="houses.php">les LOGMENTS</a></li> 
	<?php } ?>
	
	<?php if($_SESSION["role"] == 'employee') { ?>
		<!-- <li class="active"><a href="tasks.php">AJOUTER</a></li>		 -->
		<li id="houses"><a href="buy.php">les LOGMENTS</a></li> 

	<?php } ?>

</ul>