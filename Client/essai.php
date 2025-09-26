<?php
session_start();
include("../bd.php");
// Forcer le fuseau horaire de Maurice
date_default_timezone_set('Indian/Mauritius');


// Vérifier si l'utilisateur est connecté
if(!isset($_SESSION['user'])){
    header("Location: login.php"); 
    exit;
}

// récupération du modèle depuis l'URL
$voiture_prefill = isset($_GET['voiture']) ? $_GET['voiture'] : '';

// si le formulaire est envoyé
if($_SERVER["REQUEST_METHOD"] == "POST") {
    include("../bd.php"); // connexion
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $tel = $_POST['telephone'];
    $voiture = $_POST['voiture'];
    $date_demande = date("Y-m-d"); // date du jour
    $heure_demande = date("H:i:s"); // heure actuelle 

    $stmt = $mysqli->prepare("INSERT INTO demandes (nom,email,telephone,voiture) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $nom,$email,$tel,$voiture);
    $stmt->execute();
    $message = "Demande envoyée avec succès !";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Demande d'essai</title>
    <link href='css/essai.css' rel='stylesheet'>
</head>
<body>
<?php include 'header.php'; ?>
<h2>Demande d'essai</h2>
<?php if(isset($message)) echo "<p style='color:green'>".$message."</p>"; ?>

<form method="post">
    Nom: <input type="text" name="nom" required><br>
    Email: <input type="email" name="email" required><br>
    Téléphone: <input type="text" name="telephone" required><br>

    Voiture: 
    <select name="voiture" required>
        <option value="BMW M3" <?= $voiture_prefill=="BMW M3" ? "selected" : "" ?>>BMW M3</option>
        <option value="BMW X5" <?= $voiture_prefill=="BMW X5" ? "selected" : "" ?>>BMW X5</option>
        <option value="BMW Z4" <?= $voiture_prefill=="BMW Z4" ? "selected" : "" ?>>BMW Z4</option>
        <option value="Porsche 911" <?= $voiture_prefill=="Porsche 911" ? "selected" : "" ?>>Porsche 911</option>
        <option value="Porsche Cayenne" <?= $voiture_prefill=="Porsche Cayenne" ? "selected" : "" ?>>Porsche Cayenne</option>
        <option value="Porsche Panamera" <?= $voiture_prefill=="Porsche Panamera" ? "selected" : "" ?>>Porsche Panamera</option>
        <option value="Lamborghini Huracan" <?= $voiture_prefill=="Lamborghini Huracan" ? "selected" : "" ?>>Lamborghini Huracan</option>
        <option value="Lamborghini Aventador" <?= $voiture_prefill=="Lamborghini Aventador" ? "selected" : "" ?>>Lamborghini Aventador</option>
        <option value="Lamborghini Urus" <?= $voiture_prefill=="Lamborghini Urus" ? "selected" : "" ?>>Lamborghini Urus</option>
    </select><br><br>

    Date de la demande: <input type="text" value="<?= date("Y-m-d") ?>" readonly><br>
    Heure de la demande: <input type="text" value="<?= date("H:i:s") ?>" readonly><br><br>
    <button type="submit">Envoyer</button>
</form>
<?php include 'footer.php'; ?>
</body>
</html>
