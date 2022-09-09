<?php

require "../../Database.php";
require "../../model/tim.php";

if(isset($_POST['id'])){

    $obj = Tim::getTim($_POST['id'],$konekcija);

    echo json_encode($obj);

}

?>