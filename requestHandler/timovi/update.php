<?php

require "../../Database.php";
require "../../model/tim.php";

if( isset($_POST['id']) &&
    isset($_POST['ime']) &&
    isset($_POST['igrac_id']) &&
    isset($_POST['korisnik_id']) &&
    isset($_POST['region'])){

    $tim = new Tim($_POST['id'],$_POST['ime'],$_POST['igrac_id'],
        $_POST['korisnik_id'],$_POST['region']);

    $status = $tim->update($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>