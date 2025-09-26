<?php
include("../bd.php"); // connexion à la base
$result = $mysqli->query("SELECT * FROM cars");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nos Voitures</title></head>
    <link href='css/voitures.css' rel='stylesheet'>
<body>
<?php include 'header.php'; ?>
<h2>Nos Voitures</h2>
<table border="1" cellpadding="5">
<tr>
    <th>Marque</th>
    <th>Modèle</th>
    <th>Année</th>
    <th>Prix</th>
    <th>Description</th>
    <th>Image</th>
    <th>Demande d'essai</th>
</tr>
<?php while($car = $result->fetch_assoc()): ?>
<tr>
    <td><?= $car['brand'] ?></td>
    <td><?= $car['model'] ?></td>
    <td><?= $car['year'] ?></td>
    <td><?= $car['price'] ?> €</td>
    <td><?= nl2br($car["description"]) ?></td>
    <td><img src="../images/<?= $car['image'] ?>" width="150"></td>
    <td>
        <!-- lien simple qui envoie la voiture en GET -->
        <a href="essai.php?voiture=<?= urlencode($car['model']) ?>">Demander un essai</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
<?php include 'footer.php'; ?>
</body>
</html>
