<?php

class Tim
{
    private $id;
    private $ime;
    private $igrac_id;
    private $korisnik_id;
    private $region;


    public function __construct($id=null, $ime=null, $igrac_id=null, $korisnik_id=null, $region=null)
    {
        $this->id = $id;
        $this->ime = $ime;
        $this->igrac_id = $igrac_id;
        $this->korisnik_id = $korisnik_id;
        $this->region = $region;
    }


    public function add(mysqli $conn){
        $upit = "INSERT INTO timovi (ime,igrac_id,korisnik_id,region) 
                 VALUES ('$this->ime','$this->igrac_id','$this->korisnik_id','$this->region');";
        return $conn->query($upit);
    }

    public function update(mysqli $conn){
        $upit = "UPDATE timovi set ime = '$this->ime',igrac_id = '$this->igrac_id',
                   korisnik_id = '$this->korisnik_id',region = '$this->region'  WHERE id=$this->id";
        return $conn->query($upit);
    }

    public function delete(mysqli $conn){
        $upit = "DELETE FROM timovi WHERE id='$this->id'";
        return $conn->query($upit);
    }

    public static function getAll(mysqli $conn)
    {
        $upit = "SELECT * FROM timovi";
        return $conn->query($upit);
    }


    public static function getTim($id, mysqli $conn){
        $upit = "SELECT * FROM timovi WHERE id='$id'";

        $tim = array();
        if($obj = $conn->query($upit)){
            while($red = $obj->fetch_array(1)){
                $tim[]= $red;
            }
        }

        return $tim;
    }
}