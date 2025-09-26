<?php
include("../bd.php"); // connexion à la base
$message = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $mysqli->prepare("INSERT INTO users (username,email,password) VALUES (?,?,?)");
    $stmt->bind_param("sss", $username,$email,$password);
    
    if($stmt->execute()){
        $message = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
    } else {
        $message = "Erreur : Nom ou email déjà utilisé.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
    <link href='css/signup.css' rel='stylesheet'>
</head>
<body>
<?php include 'header.php'; ?> 
<div>   
<h2 style='text-align:center;'>Créer un compte</h2>
<?php if($message) echo "<p>$message</p>"; ?>
<form method="post">
    Nom d'utilisateur: <input type="text" name="username" required><br>
    Email: <input type="email" name="email" required><br>
    Mot de passe: <input type="password" name="password" required><br>
    <button type="submit">S'inscrire</button>
</form>
<p>Déjà inscrit ? <a href="login.php">Se connecter</a></p>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
