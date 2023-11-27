<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MyResources";

$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("La connexion a échoué :" . $connection->connect_error);
}