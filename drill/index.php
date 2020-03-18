<?php
    require 'sqlconnect.php';
    
    $selectMember = $pdo->query('SELECT * FROM students ');

    while ($member = $selectMember ->fetch()){
            
        echo $member['school'].'<br>';
    }
    $selectMember->closeCursor();
    
?>