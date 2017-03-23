
<?php
   require("../functions.php");
   
   $informationError = "";
   $Tabel=$Kuulutus->Tabel();

	
	//otsisõna fn sisse

	
   if ( isset($_POST["varuosa"]) &&	   
		 !empty($_POST["varuosa"])
		
		 //!empty($_POST["created"])
		) {
		  
		$varuosa = $Helper->cleanInput($_POST["varuosa"]);
      
	
		
		$Varuosad->save($_POST["varuosa"]);
	}
	
	 if (empty ($_POST["varuosa"])) {

			 $informationError = "Salvestamiseks taide koik lahtrid!";
			 
	}	

?>
<html>

<body>

    <head>
	<?php require("../header.php"); ?>

<h1>Automargid</h1>



	
	


<br><br>

<h2>Lisa uus Autovaruosa</h2>
<form method="POST">
	<center>
	<div class="col-xs-4 ">
	<label>Autovaruosa</label>
	<div class="form-group">
		<input class="form-control" name="varuosa" type="text"
	</div>
	<br>
	
	<input class="btn btn-success btn-sm hidden-xs" type="submit" value="Salvesta"> <?php echo $informationError;?>
	</div>
	
</form>

<h1>Varuosad:</h1>
<?php
$html = "<table>";

    $html .= "<tr>";
        //$html .= "<td>ID</td>";
        $html .= "<td>Mark</td>";
        $html .= "<td>Varuosa</td>";
        $html .= "<td>Tehing</td>";
        $html .= "<td>Kommentaar</td>";
        $html .= "</tr>";

    foreach ($Tabel as $m) {

    $html .= "<tr>";
        //$html .= "<td>".$s->id."</td>";
        $html .= "<td><a href='varuosa.php?varuosa=".$m->varuosa."'>".$m->varuosa."</a></td>";
        $html .= "<td>".$m->mark."</td>";
        $html .= "<td>".$m->tehing."</td>";
        $html .= "<td>".$m->kommentaar."</td>";
        $html .= "</tr>";

    }

    $html .= "</table>";

echo $html;
?>



   
	



<?php require("../footer.php"); ?>