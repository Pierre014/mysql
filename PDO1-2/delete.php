<?php

    require 'sqlconnect.php';
    require 'function.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <h1>SUPPRESSION DE CLIENTS</h1>

    <form action="delete.php" method="post">
        <label for="numeroClient"> Numéro client</label>
        <input type="text" name="numeroClient" id="numeroCLient"><br>
        <label for="lastname">lastname</label>
        <input type="text" id="lastname" name ="lastname"><br>
        <label for="firstname">firstname</label>
        <input type="text" id="firstname" name ="firstname"><br>
        <label for="date">date de naissance</label>
        <input type="date" id="date" name ="date" value="yyyy-mm-dd"><br>
        <label for="card">fidelity card</label>
        <input type="checkbox" id="card" name ="card" value="1"><br>
        <label for="cardNumber">number card fidelity</label>
        <input type="text" id="cardNumber" name ="cardNumber"><br>
        <hr>
        <label for="numeroClientTwo"> Numéro client</label>
        <input type="text" name="numeroClientTwo" id="numeroCLientTwo"><br>
        <label for="lname">lastname</label>
        <input type="text" id="lname" name ="lname"><br>
        <label for="fname">firstname</label>
        <input type="text" id="fname" name ="fname"><br>
        <label for="date">date de naissance</label>
        <input type="date" id="dateB" name ="dateB" value="yyyy-mm-dd"><br>
        <label for="cardF">fidelity card</label>
        <input type="checkbox" id="cardF" name ="cardF" value="1"><br>
        <label for="cardNumberTwo">number card fidelity</label>
        <input type="text" id="cardNumberTwo" name ="cardNumberTwo"><br>
        <input type="submit" name="delete" id="delete" value="delete">
    </form>
</body>
</html>