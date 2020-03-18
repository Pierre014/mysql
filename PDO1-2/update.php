<?php
    require 'sqlconnect.php';
    require 'function.php';

    $stmt = $pdo->prepare("SELECT * FROM clients 
                where (lastName = :lastName AND firstName = :firstName) OR id = :id");
    $stmt2 = $pdo ->prepare("UPDATE clients SET lastName=:lastName, firstName=:firstName, 
            birthDate=:birthDate, card=:card, cardNumber=:cardNumber where id=:id ");


    if(isset($_GET['search'])){
        $lastName = $_GET['lastname'];
        $firstName = $_GET['firstname'];
        $searchID = $_GET['searchID'];    
        $stmt -> execute(array(
            ':lastName'=>$lastName,
            ':firstName'=>$firstName,
            ':id' => $searchID
        ));
        $data = $stmt ->fetch(PDO::FETCH_ASSOC);
    }

    if(isset($_POST['update'])){
        $id = $_POST['idDataH'];
        $lastName = $_POST['lname'];
        $firstName = $_POST['fname'];
        $dateB = $_POST['dateB'];
        $card = "";
        $cardNumber = $_POST['cardNum'];
    
    if(!isset($_POST['cardF'])){
        $card = '0';
        $cardNumber = NULL;

        $sql = $stmt2 -> execute(array(
            ":lastName" => $lastName,
            ":firstName"=> $firstName,
            ":birthDate"=> $dateB,
            ":card" => $card,
            ":cardNumber" =>$cardNumber,
            ":id" => $id
        ));
        
    }else{
        $card = $_POST['cardF'];
        $sql = $stmt2 -> execute(array(
            ":lastName" => $lastName,
            ":firstName"=> $firstName,
            ":birthDate"=> $dateB,
            ":card" => $card,
            ":cardNumber" =>$cardNumber,
            ":id" => $id
        ));
    }
        if($sql){
            echo "succes";
        }else{
            echo "failed";
        }

    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update value</title>
</head>
<body>

<h2>Entre ton nom et ton prénom pour récuperer tes données enreistrées</h2>
<form action="update.php" method="get">
    <label for="lastname">lastname</label>
    <input type="text" id="lastname" name ="lastname"><br>
    <label for="firstname">firstname</label>
    <input type="text" id="firstname" name ="firstname"><br>
    <label for="searchID">id</label>
    <input type="text" name="searchID" id="searchID">
    <input type="submit" id="search" name="search" value="search">
</form>






<h2>FORM Update</h2>
<form action="update.php" method="post">
    <label for="idData">id</label>
    <input type="text" id="idData" name="idData" disabled
     value=<?php if(isset($_GET["search"])){ echo $data["id"];}?>>

    <input style="visibility:hidden" type="text" id="idDataH" name="idDataH"
     value=<?php if(isset($_GET["search"])){ echo $data["id"];}?>><br>

    <label for="lname">lastname</label>
    <input type="text" id="lname" name ="lname" 
        value=<?php if(isset($_GET["search"])){ echo $data["lastName"];}?>><br>

    <label for="fname">firstname</label>
    <input type="text" id="fname" name ="fname" 
        value=<?php if(isset($_GET["search"])){echo $data["firstName"];}?>><br>

    <label for="dateB">date de naissance</label>
    <input type="date" id="dateB" name ="dateB" 
        value=<?php if(isset($_GET["search"])){ echo $data["birthDate"];}?>><br>

    <label for="cardF">fidelity card</label>
    <input type="checkbox" id="cardF" name ="cardF"
         value=<?php if(isset($_GET["search"])){ echo $data["card"];}?>
        <?php if(isset($_GET["search"]) && $data["card"]==1){
            echo "checked";
        }?>><br>

    <label for="cardNum">number card fidelity</label>
    <input type="text" id="cardNum" name ="cardNum" 
         value=<?php if(isset($_GET["search"])){ echo $data["cardNumber"];}?>><br>
    <input type="submit" id="update" name="update" value="update">   
</form>
</body>
</html>