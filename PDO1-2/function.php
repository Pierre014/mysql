<?php

    function dump($tab){
        echo '<pre>';
        var_dump($tab);
        echo '</pre>';
    }
    
    function selectData($pdo,$mysqlExpression){
        $stmt = $pdo->prepare($mysqlExpression);
        $stmt -> execute();
        return $stmt -> fetchALL(PDO::FETCH_ASSOC);
    }


    function doubleLoop($array){
        foreach($array as $tab){
            foreach($tab as $key => $value){
                if($key=='card' && $value == 1){
                    echo "Carte de fidélite: OUI <br>";
                }else if($key=='card' && $value == 0){
                    echo "Carte de fidélite: NON <br>";
                    break;
                }
                else{
                    echo "$key : $value <br>";
                }
            }
            echo "<br>";
        }
    }

    function LoopShow($array){
        foreach($array as $tab){
            echo $tab['title']." by ".$tab['performer'].", le ".$tab['date']. " à ".$tab['startTime']."<br><br>";
        }
    }



//execute function

    $clients = selectData($pdo,"SELECT * FROM clients");
    $shows = selectData($pdo,"SELECT type FROM showTypes");
    $twentyClients = selectData($pdo,"SELECT * FROM clients LIMIT 0,20");
    $mClients = selectData($pdo,"SELECT lastname, firstname FROM clients 
                            WHERE lastname LIKE 'M%' ORDER BY lastname ASC ");
    $fidelCLients = selectData($pdo,"SELECT * FROM clients
                                LEFT JOIN cards ON clients.cardNumber = cards.cardNumber WHERE clients.card =1 AND cards.cardTypesid =1");
    
    $showInfo = selectData($pdo, "SELECT title, performer, date, startTime FROM shows"); 