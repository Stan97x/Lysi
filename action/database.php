<?php

$host = '127.0.0.1';
$db = 'lysi_média';
$user = 'stan';
$pass = 'stan';
$charset = 'utf8mb4';
 
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage());
    echo($pdo);
}
require_once 'Utilisateur.php';
require_once 'user.php';
$User=new User($pdo);

?>