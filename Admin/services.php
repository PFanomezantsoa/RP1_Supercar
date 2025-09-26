<?php
session_start();
include("../bd.php");

// Vérifier si admin connecté
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

// Exemple très simple : services stockés dans une table "services"
$result = $mysqli->query("SELECT * FROM services");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gestion des Services</title>
    <link href='css/services_admin.css' rel='stylesheet'>
</head>
<body>
<?php include 'header.php'; ?>    
<h2>Gestion des Services</h2>

<a href="dashboard.php">Retour au dashboard</a><br><br>

<table border="1" cellpadding="5">
    <tr>
        <th>Nom du service</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    <?php while($service = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $service['nom'] ?></td>
        <td><?= nl2br($service['description']) ?></td>
        <td>
            <a href="delete_services.php?id=<?= $service['id'] ?>">Supprimer</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<br>
<a href="add_service.php">Ajouter un nouveau service</a>
<?php include 'footer.php'; ?>
</body>
</html>
