<style>
background: url("http://workbetterindia.com/blog/wp-content/uploads/2016/11/Hand-1200x720.png") no-repeat center center fixed;
-webkit-background-size: 100% auto;
-moz-background-size: 100% auto;
-o-background-size: 100% auto;
 background-size: 100% auto;
</style>
<?php
	


	require("../functions.php");


	$saveCarError="";
    $saveEventError="";
	

    if (isset($_POST["mark"]) &&
        isset($_POST["varuosa"]) &&
        isset($_POST["tehing"]) &&
        isset($_POST["kommentaar"]) &&
        !empty($_POST["mark"]) &&
        !empty($_POST["varuosa"]) &&
        !empty($_POST["tehing"]) &&
        !empty($_POST["kommentaar"])
    ) {

        $Kuulutus->saveEvent($Helper->cleanInput($_POST["mark"]),$Helper->cleanInput($_POST["varuosa"]),$Helper->cleanInput($_POST["tehing"]),$Helper->cleanInput($_POST["kommentaar"]));

    } else {
        $saveEventError = "Täida väljad !";
    }
    $mark=$Kuulutus->getAllMargid();
	$varuosa=$Kuulutus->getAllVaruosad();
	$Tabel=$Kuulutus->Tabel();
?>


<h1>Lisa kuulutus:</h1>
<form method="POST">
    <?php echo $saveEventError ; ?>
    <br>
    <label>Auto mark</label><br>
    <select name="mark" type="text">
        <?php

        $listHtml = "";

        foreach($mark as $c){


            $listHtml .= "<option value='".$c->mark."'>".$c->mark."</option>";

        }

        echo $listHtml;

        ?>
    </select>
    <br><br>
 <label>Varuosa</label><br>
    <select name="varuosa" type="text">
        <?php

        $listHtml = "";

        foreach($varuosa as $v){


            $listHtml .= "<option value='".$v->varuosa."'>".$v->varuosa."</option>";

        }

        echo $listHtml;

        ?>
    </select>
    <br><br>
    <label>Tehing</label><br>
    <input class="form-control" name="tehing" type = "text" placeholder="O (ost) või M (Müük)">

    <br><br>
    <label>Kommentaar</label><br>
    <input class="form-control" name="kommentaar" type = "text">

    <br><br>
    <input type="submit" value="Lisa">

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