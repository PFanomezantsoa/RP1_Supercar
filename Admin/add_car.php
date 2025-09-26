<?php
include("../bd.php");
if(session_status() == PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = str_replace(' ', '_', $_FILES['image']['name']);
        $target_dir = "../images/";
        if(!is_dir($target_dir)) mkdir($target_dir, 0777, true);
        $target = $target_dir . $image;

        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $stmt = $mysqli->prepare("INSERT INTO cars (brand, model, year, price, description, image) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param("sssdss", $brand, $model, $year, $price, $description, $image);
            if($stmt->execute()){
                header("Location: voitures.php");
                exit;
            } else {
                $error = "Erreur SQL : ".$stmt->error;
            }
        } else {
            $error = "Erreur lors de l'upload de l'image.";
        }
    } else {
        $error = "Erreur upload image.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une voiture</title>
    <link href='css/add_car.css' rel='stylesheet'>
</head>
<body>
<?php include 'header.php'; ?>
<h2>Ajouter une voiture</h2>
<form method="post" enctype="multipart/form-data">
    Marque: <input type="text" name="brand" required><br>
    Modèle: <input type="text" name="model" required><br>
    Année: <input type="number" name="year" required><br>
    Prix: <input type="number" name="price" step="0.01" required><br>
    Description: <textarea name="description" rows="10" cols="50" placeholder="Type, motorisation, puissance, etc." required></textarea><br>
    Image: <input type="file" name="image" required><br><br>
    <button type="submit">Ajouter</button>
</form>
<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
<?php include 'footer.php'; ?>
</body>
</html>
