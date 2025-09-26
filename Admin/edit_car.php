<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include 'header.php'; ?>
<link href='css/edit.css' rel='stylesheet'>
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
$res = $mysqli->query("SELECT * FROM cars WHERE id=$id");
$car = $res->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $price = $_POST['price'];

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../images/".$image);
        $mysqli->query("UPDATE cars SET brand='$brand', model='$model', year='$year', price='$price', image='$image' WHERE id=$id");
    } else {
        $mysqli->query("UPDATE cars SET brand='$brand', model='$model', year='$year', price='$price' WHERE id=$id");
    }
    header("Location: voitures.php");
}
?>
<h2>Modifier une voiture</h2>
<form method="post" enctype="multipart/form-data">
    Marque: <input type="text" name="brand" value="<?= $car['brand'] ?>"><br>
    Modèle: <input type="text" name="model" value="<?= $car['model'] ?>"><br>
    Année: <input type="number" name="year" value="<?= $car['year'] ?>"><br>
    Prix: <input type="number" name="price" value="<?= $car['price'] ?>"><br>
    Image: <input type="file" name="image"><br>
    <button type="submit">Modifier</button>
</form>
<?php include 'footer.php'; ?>
</body>
</html>

