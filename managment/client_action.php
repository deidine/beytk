<?php
include_once 'config/Database.php';
include_once 'class/Clients.php';

$database = new Database();
$db = $database->getConnection();

$client = new Clients($db);

if(!empty($_POST['action']) && $_POST['action'] == 'listClients') {
	$client->listClients();
}if(!empty($_POST['action']) && $_POST['action'] == 'listClientsA') {
	$client->listClients();
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

if(!empty($_POST['action']) && $_POST['action'] == 'getClient') {
	$client->id = $_POST["id"];
	$client->getClient();
}

if(!empty($_POST['action']) && $_POST['action'] == 'updateClient') {
	$client->id = $_POST["id"];
	$client->name = $_POST["name"];
	$client->numero = $_POST["numero"];
    $client->prenom = $_POST["prenom"];
	$client->description = $_POST["description"];
	$client->phone = $_POST["phone"];
	$client->address = $_POST["address"];
	$client->update();
}

if(!empty($_POST['action']) && $_POST['action'] == 'deleteClient') {
	$client->id = $_POST["id"];
	$client->delete();
}

?>