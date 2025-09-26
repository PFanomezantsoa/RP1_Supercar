<?php
session_start();
include("../bd.php");

// Vérifier admin
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

// Récupérer l'ID depuis l'URL
if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    $stmt = $mysqli->prepare("DELETE FROM services WHERE id=?");
    $stmt->bind_param("i", $id);

    if($stmt->execute()){
        header("Location: services.php"); // Retour à la liste
        exit;
    } else {
        echo "Erreur : " . $stmt->error;
    }
} else {
    echo "ID manquant";
}
?>
