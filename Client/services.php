<?php
include("../bd.php"); // connexion à la base

$result = $mysqli->query("SELECT * FROM services");

if(!$result){
    die("Erreur SQL : " . $mysqli->error);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Services - Supercar</title>
    <link href='css/services.css' rel='stylesheet'>
</head>
<body>
<?php include 'header.php'; ?>
<h2>Nos Services</h2>

<?php if($result->num_rows > 0): ?>
    <ul>
        <?php while($service = $result->fetch_assoc()): ?>
            <li>
                <strong><?= htmlspecialchars($service['nom']) ?> :</strong>
                <?= nl2br(htmlspecialchars($service['description'])) ?>
            </li>
        <?php endwhile; ?>
    </ul>
<?php else: ?>
    <p>Aucun service disponible pour le moment.</p>
<?php endif; ?>

<p>Pour toute demande ou information supplémentaire, <a href="contact.php">contactez-nous</a>.</p>
<?php include 'footer.php'; ?>
</body>
</html>
