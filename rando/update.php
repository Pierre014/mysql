<?php
    
    require 'sqlconnect.php';
    require 'function.php';
    if(isset($_GET['modif'])){
        $modif = $_GET['modif'];

    $donnees=selectData($pdo,'*',$modif);
    $recupName = $donnees['id'];
    unset($donnees['id']);
    echo $recupName;
    }
    

    if(isset($_POST['upd'])){
       $name = $_POST['name'];
       $difficulty = $_POST['difficulty'];
       $distance = $_POST['distance'];
       $duration = $_POST['duration'];
       $height_difference = $_POST['height_difference'];
       $id = $_POST['id'];

      

       $res = $pdo->exec("UPDATE hiking 
       SET name = '$name', difficulty = '$difficulty', duration='$duration', height_difference = $height_difference
       WHERE `hiking`.`id`='$id'");

       header("Location:index.php");
       
    }

?>


<form action="update.php" method="post">
        <label for="id"></label>
        <input type="number" name="id" id="id" value="<?=$recupName?>"><br>
        <?php

            foreach($donnees as $key => $value){
                echo "
                    <label for=$key>$value</label>
                    <input type='text' name=$key><br>";
            }
        ?>
        <input type="submit" name ="upd" value="update">
</form>