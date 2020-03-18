<?php

    require 'sqlconnect.php';
    require 'function.php';

    $clients = selectData($pdo,"SELECT * FROM clients");
    $shows = selectData($pdo,"SELECT type FROM showTypes");
    $twentyClients = selectData($pdo,"SELECT * FROM clients LIMIT 0,20");
    $mClients = selectData($pdo,"SELECT lastname, firstname FROM clients 
                            WHERE lastname LIKE 'M%' ORDER BY lastname ASC ");
    $fidelCLients = selectData($pdo,"SELECT * FROM clients
                                LEFT JOIN cards ON clients.cardNumber = cards.cardNumber WHERE clients.card =1 AND cards.cardTypesid =1");
    
    $showInfo = selectData($pdo, "SELECT title, performer, date, startTime FROM shows");                         
    
?>

<!DOCTYPE html>
<html lang="en">
<head>    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO PART ONE</title>
</head>
<body>
    <h1>COLYSEUM</h1>

    <h2>ENVIE DE DEVENIR CLIENTS? clique <a href="form.php">ici</a></h2>
    <h2>UN CONCERT EN VUE? rajoute le <a href="showForm.php">ici</a></h2>
    <h2>Voici la liste des clients présents</h2>
    <?= doubleLoop($clients) ?>


    <h2>voici la liste des spectacles</h2>
    <?= doubleLoop($shows)?>

    <h2>voici les vingts premiers clients</h2>
    <?= doubleLoop($twentyClients)?>

    <h2>voici les clients dont le nom commence par M</h2>
    <?= doubleLoop($mClients)?>

    <h2>Membres avec carte de fidélités</h2>
    <?=doubleLoop($fidelCLients)?>

    <h2>Les spectacles</h2>
    <?= LoopShow($showInfo)?>

</body>
</html>