<?php
    session_start();
    $host= "localhost";
    $username = "root";
    $password = "";
    $db_nome = "bancadeltempo";

    $conn = new mysqli($host, $username, $password, $db_nome);


    if($conn-> connect_errno){
        die("errore" . $conn->connect_error . "\n");
    }
