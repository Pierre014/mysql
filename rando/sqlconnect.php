<?php
    try{
        $pdo = new PDO('mysql:host=localhost; dbname=becode; charset=utf8','pierre','Feuille014');
    }catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
?>
