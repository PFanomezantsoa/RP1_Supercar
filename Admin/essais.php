<?php
include("../bd.php");
if(session_status() == PHP_SESSION_NONE){ session_start(); }
if(!isset($_SESSION['admin'])){ header("Location: login.php"); exit; }

// Changer le statut si demandé
if(isset($_GET['action']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];
    if($action == "accepter") $stmt = $mysqli->prepare("UPDATE demandes SET statut='Accepté' WHERE id=?");
    if($action == "refuser") $stmt = $mysqli->prepare("UPDATE demandes SET statut='Refusé' WHERE id=?");
    if($action == "supprimer") $stmt = $mysqli->prepare("DELETE FROM demandes WHERE id=?");
    
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

$result = $mysqli->query("SELECT * FROM demandes");
if(!$result){
    die("Erreur SQL: " . $mysqli->error);
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Demandes d'essai</title>
    <link href='css/essai.css' rel='stylesheet'>
</head>
<body>
<?php include 'header.php'; ?>
<h2>Demandes d'essai</h2>
<table border="1" cellpadding="5">
<tr>
    <th>Nom</th>
    <th>Email</th>
    <th>Téléphone</th>
    <th>Voiture</th>
    <th>Date de demande</th>
    <th>Heure de demande</th>
    <th>Statut</th>
    <th>Action</th>
</tr>
<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= htmlspecialchars($row['nom']) ?></td>
    <td><?= htmlspecialchars($row['email']) ?></td>
    <td><?= htmlspecialchars($row['telephone']) ?></td>
    <td><?= htmlspecialchars($row['voiture']) ?></td>
    <td><?= htmlspecialchars($row['date_demande']) ?></td>
    <td><?= htmlspecialchars($row['heure_demande']) ?></td>
    <td><?= $row['statut'] ?></td>
    <td>
        <a href="?id=<?= $row['id'] ?>&action=accepter">Accepter</a> |
        <a href="?id=<?= $row['id'] ?>&action=refuser">Annuler</a>
        <a href="?id=<?= $row["id"] ?>&action=supprimer">Supprimer</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
<?php include 'footer.php'; ?>
</body>
</html>
