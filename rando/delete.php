<?php
    require 'sqlconnect.php';
    require 'function.php';
    $delete = $_GET['delete'];
    
    deleteRando($pdo,$delete);