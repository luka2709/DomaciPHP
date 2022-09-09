<?php

require "../../Database.php";
require "../../model/igrac.php";

if( isset($_POST['id']) &&
    isset($_POST['ime']) &&
    isset($_POST['prezime']) &&
    isset($_POST['pozicija'])){
    $igrac = new Igrac($_POST['id'],$_POST['ime'],$_POST['prezime'],
        $_POST['pozicija']);

    $status = $igrac->update($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>