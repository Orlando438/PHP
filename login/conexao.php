<?php

$host = "localhost";
$user = "root";
$pass = "";
$bdname = "login";

try {
    $conn = new PDO("mysql:host=$host;dbname=" .$bdname, $user, $pass);    
}catch(PDOException $err) {
    echo "SEM CONEXÃO";
}
