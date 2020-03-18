<?php
    require 'sqlconnect.php';
    require 'function.php';

    $stmt = $pdo -> prepare("INSERT INTO clients(lastname, firstname, birthDate, card, cardNumber)
                             VALUES(:lastname, :firstname,:birthDate,:card,:cardNumber)");
    
    if(isset($_POST['submit'])){

        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $dateBird = $_POST['date'];
        $card ="";
        $cardNumber ="";
        $typesCard= $_POST['typesCard'];

        if(!isset($_POST['card'])){
            $card= '0';
            $cardNumber = NULL;
        }else{
            $card = $_POST['card'];
            $cardNumber = $_POST['cardNumber'];

            if($typesCard != "0"){
                $sql = $pdo -> prepare("INSERT INTO cards(cardNumber, cardTypesId)
                                        VALUES(:cardNumber, :cardTypesId)");
                $sql -> execute(array(
                    ':cardNumber' => $cardNumber,
                    ':cardTypesId'=> $typesCard
                ));
            }
        }

        $stmt -> execute(array(
            ':lastname' => $lastname,
            ':firstname' => $firstname,
            ':birthDate' => $dateBird,
            ':card' => $card,
            ':cardNumber' => $cardNumber
        ));
        
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PART TWO</title>
</head>
<body>
        <h1>FORM REGISTER</h1>

        <form action="form.php" method="post">
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
            <select name="typesCard" id="typesCard">
                <option value="0">--choose your fidelity card</option>
                <option value="1">fidelity card</option>
                <option value="2">family card</option>
                <option value="3">student card</option>
                <option value="4">employed</option>
            </select><br>
            <input type="submit" id="submit" name="submit">   
        </form>
</body>
</html>