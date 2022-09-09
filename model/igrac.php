<?php

class Igrac
{

    private $id;
    private $ime;
    private $prezime;
    private $pozicija;
   


    public function __construct($id=null, $ime=null, $prezime=null, $pozicija=null)
    {
        $this->id = $id;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->pozicija = $pozicija;
        
    }


    public function add(mysqli $conn){
        $upit = "INSERT INTO igraci (ime,prezime,pozicija) 
                 VALUES ('$this->ime','$this->prezime','$this->pozicija');";
        return $conn->query($upit);
    }

    public function update(mysqli $conn){
        $upit = "UPDATE igraci set ime = '$this->ime',prezime = '$this->prezime',
                   pozicija = '$this->pozicija'  WHERE id='$this->id'";
        return $conn->query($upit);
    }

    public function delete(mysqli $conn){
        $upit = "DELETE FROM igraci WHERE id='$this->id'";
        return $conn->query($upit);
    }

    public static function getAll(mysqli $conn)
    {
        $upit = "SELECT * FROM igraci";
        return $conn->query($upit);
    }


    public static function getIgrac($id, mysqli $conn){
        $upit = "SELECT * FROM igraci WHERE id='$id'";

        $igrac = array();
        if($obj = $conn->query($upit)){
            while($red = $obj->fetch_array(1)){
                $igrac[]= $red;
            }
        }

        return $igrac;
    }


}