<?php
//ühendan sessiooniga

/** @noinspection PhpIncludeInspection */
require("../functions.php");


$varuosaTabel = $Kuulutus->varuosaInfo($_GET["varuosa"]);

?>

<a href="data.php"> tagasi </a>
<h2>Antud varuosa koondtabel</h2>
<?php
$html = "<table>";

$html .= "<tr>";
//$html .= "<td>ID</td>";
$html .= "<td>Varuosa</td>";
$html .= "<td>Mark</td>";
$html .= "<td>Tehing</td>";
$html .= "<td>Kommentaar</td>";
$html .= "</tr>";

foreach ($varuosaTabel as $t) {

    $html .= "<tr>";
    //$html .= "<td>".$s->id."</td>";
    $html .= "<td>".$t->varuosa."</td>";
    $html .= "<td>".$t->mark."</td>";
    $html .= "<td>".$t->tehing."</td>";
    $html .= "<td>".$t->kommentaar."</td>";
    $html .= "</tr>";

}

$html .= "</table>";

echo $html;
?>
