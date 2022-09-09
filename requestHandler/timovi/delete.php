<?php

require "../../Database.php";
require "../../model/tim.php";

if(isset($_POST['id'])){

    $tim = new Tim($_POST['id']);

    $status = $tim->delete($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>