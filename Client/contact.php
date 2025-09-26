<!DOCTYPE html>
<html>
<head>
    <title>Contact - Supercar</title>
    <link href='style.css' rel='stylesheet'>
    <link href='css/contact.css' rel='stylesheet'>
</head>
<body>
<?php
include("../bd.php");
if(session_status() == PHP_SESSION_NONE){ session_start(); }

$message = "";

// Si le formulaire est soumis
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nom = $_POST['nom'];
    $tel = $_POST['telephone'];
    $email = $_POST['email'];
    $msg = $_POST['message'];

    $stmt = $mysqli->prepare("INSERT INTO contact (nom, telephone, email, message) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss", $nom, $tel, $email, $msg);

    if($stmt->execute()){
        $message = "<p style='color:green'>✅ Message envoyé avec succès !</p>";
    } else {
        $message = "<p style='color:red'>❌ Erreur lors de l'envoi.</p>";
    }
}
?>

<?php include 'header.php'; ?>

<h2>Contactez-nous</h2>

<div class="contact-container">
    <!-- Google Map -->
    <iframe 
        src="https://www.google.com/maps?q=MCCI+Business+School,+Ebene,+Mauritius&output=embed" 
        allowfullscreen="" loading="lazy"></iframe>

    <!-- Formulaire -->
    <form method="post" class="contact-form">
        <label for="nom">Nom</label>
        <input type="text" id="nom" name="nom" required>

        <label for="tel">Téléphone</label>
        <input type="text" id="tel" name="telephone" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
</div>

<h3>Contactez nous directement :</h3>
<p>📍 Adresse : SUPERCAR - Ebéne City</p>
<p>📞 Téléphone : 548974</p>
<p>🕒 Horaire de travail : 8h-16h</p>
<p>📧 Email : contact@supercar.com</p>

<!-- Message de confirmation -->
<?php if(!empty($message)) echo $message; ?>

<?php include 'footer.php'; ?>
</body>
</html>
