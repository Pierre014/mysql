<?php
    require 'sqlconnect.php';
    require 'function.php';

    $stmt = $pdo -> prepare("INSERT INTO shows(title, performer, date, showTypesId, firstGenresId,
                            secondGenreId, duration, startTime)
                            VALUES(:title, :performer, :date, :showTypesId, :firstGenresId,
                            :secondGenreId, :duration, :startTime)");

    if(isset($_POST['submit'])){

        $title = $_POST['title'];
        $performer = $_POST['artist'];
        $showDate = $_POST['showDate'];
        $showTypesId = (int)$_POST['typeShow'];
        $kindShowOne = (int)$_POST['kindShowOne'];
        $kindShowTwo = (int)$_POST['kindShowTwo'];
        $duration = $_POST['duration'];
        $startTime = $_POST['start'];

        $duration.=":00";
        $startTime .= ":00";
    

        $sql = $stmt -> execute(array(
            ':title' => $title,
            ':performer' => $performer,
            ':date' => $showDate,
            ':showTypesId' => $showTypesId,
            ':firstGenresId'=> $kindShowOne,
            ':secondGenreId'=> $kindShowTwo,
            ':duration' => $duration,
            ':startTime' => $startTime
        ));
        if($sql){
            echo 'le concert à été ajouté';
        }else{
            echo "le concert n'a pas été ajouté";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form show crud part two</title>
</head>
<body>
    <h1>SHOW FORMULER</h1>
    <form action="showForm.php" method="post">
        <label for="title">title</label>
        <input type="text" name="title" id="title"><br>
        <label for="artist">artist</label>
        <input type="text" name="artist" id="artist"><br>
        <label for="showDate">date</label>
        <input type="date" name="showDate" id="showDate" value="yyyy-mm-dd"><br>
        <select name="typeShow" id="typeShow">
            <option value="0">--choose type show</option>
            <option value="1">Concert</option>
            <option value="2">Theater</option>
            <option value="3">Comedy</option>
            <option value="4">Dance</option>
        </select><br>
        <select name="kindShowOne" id="kindShowOne">
            <option value="0">--choose first kind show </option>
            <option value="1">Variété et chanson française</option>
            <option value="2">Variété internationnale</option>
            <option value="3">Pop/Rock</option>
            <option value="4">Musique éléctronique</option>
            <option value="5">Folk</option>
            <option value="6">Rap</option>
            <option value="7">Hip Hop</option>
            <option value="8">Slam</option>
            <option value="9">Reggae</option>
            <option value="10">Clubbing</option>
            <option value="11">RnB</option>
            <option value="12">Soul</option>
            <option value="13">Funk</option>
            <option value="14">Jazz</option>
            <option value="15">Blues</option>
            <option value="16">Country</option>
            <option value="17">Gospel</option>
            <option value="18">Musique du monde</option>
            <option value="19">Classique</option>
            <option value="20">Opéra</option>
            <option value="21">Autres</option>
            <option value="22">Drame</option>
            <option value="23">Comédie</option>
            <option value="24">Comtemporain</option>
            <option value="25">Monologue</option>
        </select><br>

        <select name="kindShowTwo" id="kindShowTwo">
            <option value="0">--choose second kind show</option>
            <option value="1">Variété et chanson française</option>
            <option value="2">Variété internationnale</option>
            <option value="3">Pop/Rock</option>
            <option value="4">Musique éléctronique</option>
            <option value="5">Folk</option>
            <option value="6">Rap</option>
            <option value="7">Hip Hop</option>
            <option value="8">Slam</option>
            <option value="9">Reggae</option>
            <option value="10">Clubbing</option>
            <option value="11">RnB</option>
            <option value="12">Soul</option>
            <option value="13">Funk</option>
            <option value="14">Jazz</option>
            <option value="15">Blues</option>
            <option value="16">Country</option>
            <option value="17">Gospel</option>
            <option value="18">Musique du monde</option>
            <option value="19">Classique</option>
            <option value="20">Opéra</option>
            <option value="21">Autres</option>
            <option value="22">Drame</option>
            <option value="23">Comédie</option>
            <option value="24">Comtemporain</option>
            <option value="25">Monologue</option>
        </select><br>

        <label for="duration">duration</label>
        <input type="time" name="duration" step="2" id="duration"><br>

        <label for="start">start at</label>
        <input type="time" name="start" step="2" id="start"><br>
        <input type="submit" name="submit" id="submitShow">
    </form>
</body>
</html>