<?php

    require 'sqlconnect.php';
    require 'function.php';

    $stmt = $pdo -> prepare("SELECT * FROM shows WHERE title = :title" );
    $stmt2 = $pdo ->prepare("UPDATE shows SET title = :title, performer = :performer,
                date=:date, showTypesId=:showTypesId, firstGenresId=:firstGenresId, 
                secondGenreId=:secondGenreId, duration=:duration, startTime=:startTime where id=:id ");

    if(isset($_GET['search'])){
        $concert = $_GET['concert'];
        $stmt -> execute(array(
            ":title"=> $concert
        ));
        $data = $stmt ->fetch(PDO::FETCH_ASSOC);
    }
    if(isset($_POST['update'])){
        $sql = $stmt2 -> execute(array(
            ":title" => $_POST['title'],
            ":performer" => $_POST['performer'],
            ":date"=> $_POST['Date'],
            ":showTypesId" =>$_POST['showTypesId'],
            "firstGenresId"=>$_POST['firstGenresId'],
            ":secondGenreId"=>$_POST['secondGenreId'],
            ":duration" => $_POST['duration'],
            ":startTime"=>$_POST['startTime'],
            ":id" =>$_POST['idConcertH']
        ));
        dump($sql);
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update concert</title>
</head>
<body>
<h2>le nom du spectacle</h2>
<form action="updateShow.php" method="get">
    <label for="concert">concert name</label>
    <input type="text" id="concert" name ="concert"><br>
    <input type="submit" id="search" name="search" value="search">
</form>

<h2>FORM Update Concert</h2>
<form action="updateShow.php" method="post">
    <label for="idConcert">id</label>
    <input type="text" id="idConcert" name="idConcert" disabled
     value=<?php if(isset($_GET["search"])){ echo $data["id"];}?>>

    <input style="visibility:hidden" type="text" id="idConcertH" name="idConcertH"
     value=<?php if(isset($_GET["search"])){ echo $data["id"];}?>><br>

    <label for="title">Concert name</label>
    <input type="text" id="title" name ="title"
        value="<?php if(isset($_GET["search"])){ echo strval($data['title']);}?>"><br>

    <label for="performer">performer</label>
    <input type="text" id="performer" name ="performer"
        value=<?php if(isset($_GET["search"])){echo $data["performer"];}?>><br>

    <label for="Date">date</label>
    <input type="date" id="Date" name ="Date"
        value=<?php if(isset($_GET["search"])){echo $data["date"];}?>><br>

    <label for="showTypesId">Types</label>
    <input type="text" id="showTypesId" name ="showTypesId"
        value=<?php if(isset($_GET["search"])){ echo $data["showTypesId"];}?>><br>

    <label for="firstGenresId">genres 1</label>
    <input type="text" id="firstGenresId" name ="firstGenresId"
        value=<?php if(isset($_GET["search"])){ echo $data["firstGenresId"];}?>><br>

    <label for="secondGenreId">genres 2</label>
    <input type="text" id="secondGenreId" name ="secondGenreId"
        value=<?php if(isset($_GET["search"])){ echo $data["secondGenreId"];}?>><br>

    <label for="duration">duration</label>
    <input type="text" id="duration" name ="duration"
        value=<?php if(isset($_GET["search"])){ echo $data["duration"];}?>><br>

    <label for="startTime">StartTime</label>
    <input type="text" id="startTime" name ="startTime"
        value=<?php if(isset($_GET["search"])){ echo $data["startTime"];}?>><br>
    <input type="submit" id="update" name="update" value="update">
</form>
</body>
</html>