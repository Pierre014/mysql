<?php

    require 'sqlconnect.php';

    function pre($array){
        echo '<pre>';
            print_r($array);
        echo '</pre>';
    }

    $selectData = $pdo ->query('SELECT * FROM meteo');

    if(isset($_POST['ville'])&& isset($_POST['haut'])&& isset($_POST['bas'])){
        $ville = $_POST['ville'];
        $haut = $_POST['haut'];
        $bas = $_POST['bas'];
        $sql = "INSERT INTO meteo (ville,haut,bas)
                VALUES ('$ville',$haut,$bas)";
        $data = $pdo ->exec($sql);
    }

    if(isset($_POST['delete'])){
        $choixdelete = $_POST['choix'];
        foreach($choixdelete as $del){
            $sql = "DELETE FROM meteo WHERE ville = '$del'";
            $sup = $pdo ->exec($sql);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
        <?php
            $donnees = $selectData -> fetch(PDO::FETCH_ASSOC);
            foreach($donnees as $title =>$value){
                echo "<th>$title</th>";
            }
            $selectData->closeCursor();
        ?>
        </tr>
        <?php
            $selectData = $pdo ->query('SELECT * FROM meteo');
            while($donnees = $selectData -> fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                    foreach($donnees as $data => $value){
                        echo "<td>$value</td>";
                    }
                echo "</tr>";
    }
    $selectData->closeCursor();
            
        ?>
    </table>

    <form action="index.php" method="POST">
        <label for="ville">ville</label>
        <input type="text" id="ville" name = "ville"><br>
        <label for="haut">haut</label>
        <input type="number" id="haut" name = "haut"><br>
        <label for="bas">bas</label>
        <input type="number" id="bas" name = "bas"><br>
        <input type="submit" value ="submit">
    </form>

    <form action="index.php" method="POST">
        <?php
             $selectData = $pdo ->query('SELECT ville FROM meteo');
             
             while($donnees = $selectData->fetch(PDO::FETCH_ASSOC)){
                 foreach($donnees as $data){
                 echo "<label for=$data>$data</label>";
                 echo "<input type='checkbox' name='choix[]' value=$data>";
                 }
            }
             $selectData ->closeCursor();        
        ?>
        <br>
        <input type="submit" name=delete value="delete">
    
    </form>
</body>
</html>