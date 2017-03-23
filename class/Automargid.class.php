<?php 
class Automargid {
	
	private $connection;
	
	function __construct($mysqli){
		
		$this->connection = $mysqli;
		
	}

	/*TEISED FUNKTSIOONID */
	
		
	

	function save ($mark) {
		
		$stmt = $this->connection->prepare("INSERT INTO margid (mark) VALUES (?)");
	
		echo $this->connection->error;
		
		$stmt->bind_param("s", $mark);
		
		if($stmt->execute()) {
			echo "Salvestamine onnestus";
		} else {
		 	echo "ERROR ".$stmt->error;
		}
		
		$stmt->close();
		
		
	}
	
	
}

?>