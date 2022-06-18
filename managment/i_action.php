<?php
include_once 'config/Database.php';
include_once 'class/i.php';

$database = new Database();
$db = $database->getConnection();
$house = new I($db);


if(!empty($_POST['action']) && $_POST['action'] == 'listhouses') {
	$house->listHouses();
}



if(!empty($_POST['action']) && $_POST['action'] == 'addHouse') {	
	$house->type = $_POST["type"];
    $house->prix = $_POST["prix"];
    $house->choix = $_POST["choix"];
    //$house->image = $_FILES["image"]["name"];
	$house->image  = file_get_contents($_FILES["image"]["tmp_name"]);
	$house->lieu = $_POST["lieu"];
	$house->numero = $_POST["numero"];
	$house->insert();
}

if(!empty($_POST['action']) && $_POST['action'] == 'gethouse') {
	$house->id = $_POST["id"];
	$house->gethouse();
}

if(!empty($_POST['action']) && $_POST['action'] == 'updatehouse') {
	$house->id = $_POST["id"];
	$house->type = $_POST["type"];
    $house->prix = $_POST["prix"];
	$house->numero = $_POST["numero"];
    $house->choix = $_POST["choix"];
	$house->image = $_POST["image"];
	$house->lieu = $_POST["lieu"];
    $house->update();
}

if(!empty($_POST['action']) && $_POST['action'] == 'deletehouse') {
	$house->id = $_POST["id"];
	$house->delete();
}

?>