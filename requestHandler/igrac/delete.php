<?php

require "../../Database.php";
require "../../model/igrac.php";

if(isset($_POST['id'])){

    $igrac = new Igrac($_POST['id']);

    $status = $igrac->delete($konekcija);

    if($status){
        echo"Uspesno";
    }else{
        echo $status;
        echo "Neuspesno";
    }

}

?>