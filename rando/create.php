<?php
    require 'sqlconnect.php';
    $db = $pdo -> prepare("INSERT INTO hiking (name,difficulty,distance,duration,height_difference)
                            VALUES ( :name, :difficulty, :distance ,:duration, :height_difference)");

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $difficulty = $_POST['difficulty'];
        $distance = ($_POST['distance']);
        $duration = $_POST['duration'];
        $height = $_POST['height_difference'];
        $debug=$db->execute(array(
            ':name'=>$name,
            ':difficulty'=>$difficulty,
            ':distance' =>$distance,
            ':duration' =>$duration,
            ':height_difference'=>$height
        ));
        if(!in_array("",$_POST)){
            echo "votre rando a été ajoutée";
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
            <title>Randonnée</title>
        </head>

        <h1>La randonnée au soleil</h1>
        <h2>voulez-vous ajouter une randonnée à notre base de donnée?</h2>

        <form action="index.php" method="post">
            <label for="name">name</label>
            <input type="text" id="name" name="name"><br>
            <label for="difficulty">difficulty</label>
            <input type="text" name="difficulty" id="difficulty"><br>
            <label for="distance">distance</label>
            <input type="text" name="distance" id="distance"><br>
            <label for="duration">duration</label>
            <input type="text" name="duration" id="duration"><br>
            <label for="height_duration">height_difference</label>
            <input type="text" name="height_difference" id="height_difference"><br>
            <input type="submit" name="submit" id="submit" value="add">
        </form>
        