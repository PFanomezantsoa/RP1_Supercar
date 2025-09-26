<?php
// Démarrer la session seulement si elle n'existe pas déjà
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

// Vérifier si admin connecté
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include '../bd.php';

$id = $_GET['id'];
$mysqli->query("DELETE FROM cars WHERE id=$id");
header("Location: voitures.php");
?>
