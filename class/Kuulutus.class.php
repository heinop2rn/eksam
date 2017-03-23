<?php
class Kuulutus
{

    private $connection;

    // käivitatakse siis kui on = new User(see jõuab siia)
    function __construct($mysqli)
    {
        //this viitab sellele klassile ja selle klassi muutujale
        $this->connection = $mysqli;
    }

 

    function getAllMargid()
    {

        $stmt = $this->connection->prepare("SELECT mark FROM margid");
        echo $this->connection->error;

        $stmt->bind_result($mark);
        $stmt->execute();

        //tekitan massiivi
        $result = array();

        // tee seda seni, kuni on rida andmeid
        // mis vastab select lausele
        while ($stmt->fetch()) {

            //tekitan objekti
            $c = new StdClass();
            //$c->id = $id;
            $c->mark = $mark;

            array_push($result, $c);
        }

        $stmt->close();

        return $result;
    }
	
	
	
	 function getAllVaruosad()
    {

        $stmt = $this->connection->prepare("SELECT varuosa FROM varuosad");
        echo $this->connection->error;

        $stmt->bind_result($varuosa);
        $stmt->execute();

        //tekitan massiivi
        $result = array();

        // tee seda seni, kuni on rida andmeid
        // mis vastab select lausele
        while ($stmt->fetch()) {

            //tekitan objekti
            $v = new StdClass();
            //$c->id = $id;
            $v->varuosa = $varuosa;

            array_push($result, $v);
        }

        $stmt->close();

        return $result;
    }
	
	

    function saveEvent($mark, $varuosa, $tehing, $kommentaar)
    {

        $stmt = $this->connection->prepare("INSERT INTO kuulutus (mark, varuosa, tehing, kommentaar) VALUE (?, ?, ?, ?)");
        echo $this->connection->error;

        $stmt->bind_param("ssss", $mark, $varuosa, $tehing, $kommentaar);

        if ($stmt->execute()) {
            echo "Õnnestus";
        } else {
            echo "ERROR" . $stmt->error;
        }
    }


    function Tabel()
    {


        $stmt = $this->connection->prepare("SELECT id, mark, varuosa, tehing, kommentaar FROM kuulutus");

      // $stmt->bind_param("i", $varuosa);

        $stmt->bind_result($id, $mark, $varuosa, $tehing, $kommentaar);

        $stmt->execute();
        $results = array();

        //tsükli sisu tehakse niimitu korda , mitu rida sql lausega tuleb
        while ($stmt->fetch()) {
            $Tabel = new StdClass();
            $Tabel->id = $id;
            $Tabel->mark = $mark;
            $Tabel->varuosa = $varuosa;
            $Tabel->tehing = $tehing;
            $Tabel->kommentaar = $kommentaar;
            array_push($results, $Tabel);

        }
        return $results;

    }

    function varuosaInfo($varuosa)
    {

        $stmt = $this->connection->prepare("SELECT mark, varuosa, tehing, kommentaar FROM kuulutus WHERE varuosa=?");

        $stmt->bind_param("s", $varuosa);
        $stmt->bind_result($mark, $varuosa, $tehing, $kommentaar);
        $stmt->execute();
        $results = array();
        //saime ühe rea andmeid
        while ($stmt->fetch()) {
            $varuosaTabel = new StdClass();
            $varuosaTabel->mark = $mark;
            $varuosaTabel->varuosa = $varuosa;
            $varuosaTabel->tehing = $tehing;
            $varuosaTabel->kommentaar = $kommentaar;
            array_push($results, $varuosaTabel);

        }
        return $results;

    }
}

?>