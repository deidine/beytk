<?php
class Clients {	
   
	private $clientsTable = 'pm_clients';
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function listClients(){
		
		$sqlQuery = "SELECT * FROM ".$this->clientsTable." ";
		// if(!empty($_POST["search"]["value"])){
		// 	$sqlQuery .= 'where(id LIKE "%'.$_POST["search"]["value"].'%" ';
		// 	$sqlQuery .= ' OR name LIKE "%'.$_POST["search"]["value"].'%" ';			
		// 	$sqlQuery .= ' OR website LIKE "%'.$_POST["search"]["value"].'%" ';
		// 	$sqlQuery .= ' OR industry LIKE "%'.$_POST["search"]["value"].'%" ';
		// 	$sqlQuery .= ' OR phone LIKE "%'.$_POST["search"]["value"].'%") ';								
		// }
		
		if(!empty($_POST["order"])){
			$sqlQuery .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlQuery .= 'ORDER BY id DESC ';
		}
		
		if($_POST["length"] != -1){
			$sqlQuery .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}
		
		$stmt = $this->conn->prepare($sqlQuery);
		$stmt->execute();
		$result = $stmt->get_result();	
		
		$stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->clientsTable);
		$stmtTotal->execute();
		$allResult = $stmtTotal->get_result();
		$allRecords = $allResult->num_rows;
		
		$displayRecords = $result->num_rows;
		$records = array();		
		while ($client = $result->fetch_assoc()) { 				
			$rows = array();			
			$rows[] = $client['id'];
			$rows[] = ucfirst($client['name']);
			$rows[] = $client['prenom'];		
				
			$rows[] = $client['description'];	
			$rows[] = $client['phone'];			
			$rows[] = $client['address'];
				$rows[] = $client['numero'];			
			$rows[] = '<button type="button" name="view" id="'.$client["id"].'" class="btn btn-info btn-xs view"><span class="glyphicon glyphicon-file" title="View"></span></button>';			
			$rows[]= '<button type="button" name="buy" id="'.$client["id"].'" class="btn btn-info btn-xs buy" title="acheter"> <span class="glyphicon glyphicon-plus"></span></button>';
            $records[] = $rows;
		}
		
		$output = array(
			"draw"	=>	intval($_POST["draw"]),			
			"iTotalRecords"	=> 	$displayRecords,
			"iTotalDisplayRecords"	=>  $allRecords,
			"data"	=> 	$records
		);
		
		echo json_encode($output);
	}
	
	public function insert(){
		
		if($this->name) {

			$stmt = $this->conn->prepare("
			INSERT INTO ".$this->clientsTable."(`name`, `prenom`, `description`, `phone`,`address`,numero)
			VALUES(?,?,?,?,?,?)");
		
			$this->name = htmlspecialchars(strip_tags($this->name));
			$this->prenom = htmlspecialchars(strip_tags($this->prenom));
			$this->description = htmlspecialchars(strip_tags($this->description));
			$this->phone = htmlspecialchars(strip_tags($this->phone));
			$this->address = htmlspecialchars(strip_tags($this->address));	
			$this->numero =$this->numero;	
			
			$stmt->bind_param("isssss",$this->numero, $this->name, $this->prenom, $this->description, $this->phone, $this->address);
			
			if($stmt->execute()){
				return true;
			}		
		}
	}
	
	function list(){		
		$stmt = $this->conn->prepare("SELECT * FROM ".$this->clientsTable);				
		$stmt->execute();			
		$result = $stmt->get_result();		
		return $result;	
	}
	
	public function getClient(){
		if($this->id) {
			$sqlQuery = "
				SELECT * FROM ".$this->clientsTable." 
				WHERE id = ?";			
			$stmt = $this->conn->prepare($sqlQuery);
			$stmt->bind_param("i", $this->id);	
			$stmt->execute();
			$result = $stmt->get_result();
			$record = $result->fetch_assoc();
			echo json_encode($record);
		}
	}
	public function update(){
		
		if($this->id) {			
			
			$stmt = $this->conn->prepare("
			UPDATE ".$this->clientsTable." 
			SET name= ?, prenom = ?, description = ?, phone = ?, address = ?,numero=?
			WHERE id = ?");
			$this->name = htmlspecialchars(strip_tags($this->name));
			$this->prenom = htmlspecialchars(strip_tags($this->prenom));
			$this->description = htmlspecialchars(strip_tags($this->description));
			$this->phone = htmlspecialchars(strip_tags($this->phone));
			$this->address = htmlspecialchars(strip_tags($this->address));	
			$this->numero =$this->numero;	
			
			$stmt->bind_param("isssss",$this->numero, $this->name, $this->prenom, $this->description, $this->phone, $this->address);
				
			if($stmt->execute()){
				return true;
			}
			
		}	
	}
	
	public function delete(){
		if($this->id) {			

			$stmt = $this->conn->prepare("
				DELETE FROM ".$this->clientsTable." 
				WHERE id = ?");

			$this->id = htmlspecialchars(strip_tags($this->id));

			$stmt->bind_param("i", $this->id);

			if($stmt->execute()){
				return true;
			}
		}
	}
}
?>