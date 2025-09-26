<?php
session_start();
include("../bd.php");

// Vérifier si admin connecté
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

$message = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nom = $_POST['nom'];
    $description = $_POST['description'];

    $stmt = $mysqli->prepare("INSERT INTO services (nom, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $nom, $description);
    
    if($stmt->execute()){
        $message = "Service ajouté avec succès !";
    } else {
        $message = "Erreur : " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un service</title>
    <link href='css/add_services.css' rel='stylesheet'>
</head>
<body>
<?php include 'header.php'; ?>
<h2>Ajouter un service</h2>

<?php if($message): ?>
    <p style="color:green"><?= $message ?></p>
<?php endif; ?>

<form method="post">
    <label>Nom du service :</label><br>
    <input type="text" name="nom" required><br><br>

    <label>Description :</label><br>
    <textarea name="description" rows="4" cols="50" required></textarea><br><br>

    <button type="submit">Ajouter</button>
</form>

<br>
<a class='retour' href="services.php">Retour à la liste des services</a>
<?php include 'footer.php'; ?>
</body>
</html>
