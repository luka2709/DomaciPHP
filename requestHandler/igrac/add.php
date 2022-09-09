<?php

require "../../Database.php";
require "../../model/igrac.php";

if(isset($_POST['ime']) &&
    isset($_POST['prezime']) &&
    isset($_POST['pozicija'])){

    $igrac = new Igrac(null,$_POST['ime'],$_POST['prezime'],
        $_POST['pozicija']);

    $status = $igrac->add($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo "Neuspesno";
    }

}


?>