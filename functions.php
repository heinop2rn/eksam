<?php

	require("/home/heinparn/config.php");
	
	$database = "if16_heinop2rn";
	$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
	

	
	require("class/Automargid.class.php");
	$Automargid = new Automargid($mysqli);
	
		require("class/Kuulutus.class.php");
	$Kuulutus = new Kuulutus($mysqli);
	
		require("class/Varuosad.class.php");
	$Varuosad = new Varuosad($mysqli);
	
	
   
	require("class/Helper.class.php");
	$Helper = new Helper($mysqli);
	
	session_start();
	
	
	

	

?>