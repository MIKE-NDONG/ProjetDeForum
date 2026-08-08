<?php

try{
    $bdd = new PDO('mysql:host=localhost;dbname=forum_db;charset=utf8;', 'root', '');
}catch(Exception $e){
    die('une erreur a été détectée : ' . $e->getMessage());
}
