<?php
include_once 'config/Database.php';
include_once 'class/buy.php';
include_once 'class/Clients.php';

$database = new Database();
$db = $database->getConnection();

$house = new House($db);
$client = new Clients($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listhouses') {
	$house->listHouses();
}

if(!empty($_POST['action']) && $_POST['action'] == 'addHouse') {	
	$house->type = $_POST["type"];
    $house->prix = $_POST["prix"];
    $house->choix = $_POST["choix"];
    $house->image = $_POST["image"];
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

if(!empty($_POST['action']) && $_POST['action'] == 'getClient') {
	$client->id = $_POST["id"];
	$client->getClient();
}
if(!empty($_POST['action']) && $_POST['action'] == 'addClient') {	
	$client->name = $_POST["name"];
    $client->prenom = $_POST["prenom"];
	$client->description = $_POST["description"];
	$client->phone = $_POST["phone"];
	$client->numero = $_POST["numero"];
	$client->address = $_POST["address"];
	$client->insert();
}
if(!empty($_POST['action']) && $_POST['action'] == 'rechercher') {
	$cher=$_POST['lieu1'];

	$house->rechercher();
}
?>