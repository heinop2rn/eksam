<?php 
class Varuosad {
	
	private $connection;
	
	function __construct($mysqli){
		
		$this->connection = $mysqli;
		
	}

	/*TEISED FUNKTSIOONID */
	
		
	

	function save ($varuosa) {
		
		$stmt = $this->connection->prepare("INSERT INTO varuosad (varuosa) VALUES (?)");
	
		echo $this->connection->error;
		
		$stmt->bind_param("s", $varuosa);
		
		if($stmt->execute()) {
			echo "Salvestamine onnestus";
		} else {
		 	echo "ERROR ".$stmt->error;
		}
		
		$stmt->close();
		
		
	}
	
	
}

?>