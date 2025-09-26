<?php
$mysqli = new mysqli("localhost", "root", "", "super_car");
if ($mysqli->connect_error) {
    die("Erreur de connexion: " . $mysqli->connect_error);
}

if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>
