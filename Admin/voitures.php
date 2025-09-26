<?php 
include("../bd.php"); 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
$result = $mysqli->query("SELECT * FROM cars");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Gérer les voitures</title>
    <link href='css/voitures_admin.css' rel='stylesheet'>
</head>
<body>
<?php include 'header.php'; ?>
<div class="voitures-container">
    <h2>Voitures</h2>
    <a href="add_car.php">Ajouter une voiture</a><br><br>
    <table>
        <tr>
            <th>Marque</th>
            <th>Modèle</th>
            <th>Année</th>
            <th>Prix</th>
            <th>Description et caractéristique</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php if($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td data-label="Marque"><?= $row["brand"] ?></td>
                <td data-label="Modèle"><?= $row["model"] ?></td>
                <td data-label="Année"><?= $row["year"] ?></td>
                <td data-label="Prix"><?= $row["price"] ?> €</td>
                <td data-label="Description"><?= nl2br($row["description"]) ?></td>
                <td data-label="Image"><img src="../images/<?= $row["image"] ?>" alt="Voiture"></td>
                <td data-label="Action">
                    <a href="edit_car.php?id=<?= $row["id"] ?>">Modifier</a>
                    <a href="delete_car.php?id=<?= $row["id"] ?>">Supprimer</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="empty">Aucune voiture disponible</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
