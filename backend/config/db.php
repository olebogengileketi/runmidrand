<?php
$host = "localhost";
$dbname = "RunMidrand";
$username = "root";
$password = "";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Optional: set default fetch mode
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  
    //echo "Connected successfully via PDO!";

} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
} 
