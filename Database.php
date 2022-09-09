<?php

     $user = 'root';
     $password = '';
     $server = 'localhost';
     $database = 'igraci';


    $konekcija = new mysqli($server,$user,$password,$database);

    if($konekcija->connect_errno){
        exit('Neuspelo poveivanje sa bazom, greska: '. $konekcija->connect_error);
    }

?>