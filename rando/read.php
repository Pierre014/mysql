<?php
    require 'sqlconnect.php';
    require 'function.php';

?>
    <h2>voici la liste de nos randos les plus populaires</h2>

    <table>
        <tr>
            <?php 
                $donnees = selectData($pdo,'*');
                foreach($donnees as $title => $value){
                    if($title == 'id'){
                        echo "<th>delete rando</th>";
                        echo "<th>numero</th>";
                    }else{
                        echo "<th>$title</th>";
                    }
                }
            ?>
        </tr>
            <?php
                selectAllForTab($pdo,'*');
            ?>
    </table>
    </body>
</html>