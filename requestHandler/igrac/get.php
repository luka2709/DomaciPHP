<?php

require "../../Database.php";
require "../../model/igrac.php";

if(isset($_POST['id'])){

    $obj = Igrac::getIgrac($_POST['id'],$konekcija);

    echo json_encode($obj);

}

?>