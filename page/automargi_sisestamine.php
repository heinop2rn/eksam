
<?php
   require("../functions.php");
   
   $informationError = "";
   

	
	//otsisõna fn sisse

	
   if ( isset($_POST["mark"]) &&	   
		 !empty($_POST["mark"])
		
		 //!empty($_POST["created"])
		) {
		  
		$mark = $Helper->cleanInput($_POST["mark"]);
      
	
		
		$Automargid->save($_POST["mark"]);
	}
	
	 if (empty ($_POST["mark"])) {

			 $informationError = "Salvestamiseks taide koik lahtrid!";
			 
	}	

?>
<html>

<body>

    <head>
	<?php require("../header.php"); ?>
	
<h1>Automargid</h1>



	
	


<br><br>

<h2>Lisa uus Automark</h2>
<form method="POST">
	<center>
	<div class="col-xs-4 ">
	<label>Automark</label>
	<div class="form-group">
		<input class="form-control" name="mark" type="text"
	</div>
	<br>
	
	<input class="btn btn-success btn-sm hidden-xs" type="submit" value="Salvesta"> <?php echo $informationError;?>
	</div>
	
</form>
	



<?php require("../footer.php"); ?>