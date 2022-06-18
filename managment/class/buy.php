<?php
class House {	
   
	private $houseTable = 'house';
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function listHouses(){
		
		$sqlQuery = "SELECT * FROM ".$this->houseTable." ";
		
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
		
		$stmtTotal = $this->conn->prepare("SELECT * FROM ".$this->houseTable);
		$stmtTotal->execute();
		$allResult = $stmtTotal->get_result();
		$allRecords = $allResult->num_rows;
		
		$displayRecords = $result->num_rows;
		$records = array();		
		while ($house = $result->fetch_assoc()) { 				
			$rows = array();			
			$rows[] = $house['id'];
			$rows[] = ucfirst($house['type']);
			$rows[] = $house['choix'];		
			$rows[] = $house['prix'];	
			$rows[] = $house['lieu'];			
			//$rows[] = $house['image'];			
			$rows[]= "<img src='images/home.png'>";
		$rows[] = '<button type="button" name="view" id="'.$house["id"].'" class="btn btn-info btn-xs view"><span class="glyphicon glyphicon-file" title="View"></span></button>';			
			$rows[]= '<button type="button" name="buy" id="'.$house["id"].'" class="btn btn-info btn-xs buy" title="acheter"> <span class="glyphicon glyphicon-plus"></span></button>';
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
		
		if($this->type) {

$stmt = $this->conn->prepare(" INSERT INTO house (`type`, `prix`, `lieu`, `image`, `choix`) VALUES (?,?,?,?,?)");
		  
			$this->type = htmlspecialchars(strip_tags($this->type));
			$this->lieu = htmlspecialchars(strip_tags($this->lieu));
$this->image = htmlspecialchars(strip_tags($this->image));
			$this->choix = htmlspecialchars(strip_tags($this->choix));
			$stmt->bind_param("sisss",$this->type ,$this->prix ,$this->lieu ,$this->image,$this->choix);
			
			if($stmt->execute()){
				return true;
			}		
		}
	}
	
	function list(){		
		$stmt = $this->conn->prepare("SELECT * FROM ".$this->houseTable);				
		$stmt->execute();			
		$result = $stmt->get_result();		
		return $result;	
	}
	
	public function gethouse(){
		if($this->id) {
			$sqlQuery = "SELECT * FROM ".$this->houseTable." WHERE id = ?";			
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
			
			$stmt = $this->conn->prepare(" UPDATE ".$this->houseTable." SET type= ?, lieu = ?, image = ?, choix = ?, prix = ? WHERE id = ?");
	 
			$this->id = htmlspecialchars(strip_tags($this->id));
			
			$this->type = htmlspecialchars(strip_tags($this->type));
			$this->lieu = htmlspecialchars(strip_tags($this->lieu));
			$this->image = htmlspecialchars(strip_tags($this->image));
			$this->choix = htmlspecialchars(strip_tags($this->choix));
			$stmt->bind_param("ssssii",$this->type ,  $this->lieu , $this->image, $this->choix,$this->prix,$this->id);
			
			if($stmt->execute()){
				return true;
			}
			
		}	
	}
	
	public function delete(){
		if($this->id) {			

			$stmt = $this->conn->prepare("
				DELETE FROM ".$this->houseTable." 
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