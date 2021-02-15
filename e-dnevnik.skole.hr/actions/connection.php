<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e-dnevnik.skole.hr";

$mysqli = new mysqli($servername, $username, $password, $dbname );

if ($mysqli-> connect_error) {
    die ("Prijava nije supjela, pokušaj ponovno" .$mysqli->connect_error);
}
