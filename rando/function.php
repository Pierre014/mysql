<?php
    function selectData($pdo,$pointer,$condi=""){
        if($condi == ""){
             $data = $pdo->query("SELECT $pointer FROM hiking");
             return $data ->fetch(PDO::FETCH_ASSOC);
        }else
            {
             $data = $pdo->query("SELECT $pointer FROM hiking WHERE name = '$condi'");
             return $data ->fetch(PDO::FETCH_ASSOC);
        }

        
    }


    function selectAllForTab($pdo,$pointer){
        $data = $pdo ->query("SELECT $pointer FROM hiking");

        while($donnees = $data->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
                foreach($donnees as $key =>$value){
                    if($key =="id"){
                        echo "<td><a href='delete.php?delete=$value'><button id='$value'>delete</button></a></td>";
                        echo "<td>$value</td>";
                    }
                    else if($key=="name"){
                        echo "<td><a href='update.php?modif=$value'>$value</a></td>";
                    }else{
                    echo "<td>$value</td>";
                }
            }
            echo "</tr>";
        }
        $data ->closeCursor();
    }

    function deleteRando($pdo,$id){
        $delete = "DELETE FROM hiking WHERE id=$id";
        $pdo->exec($delete);
        header('location:read.php');
    }

?>