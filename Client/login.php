<?php
session_start();
include("../bd.php");
$message = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if($user && password_verify($password, $user['password'])){
        $_SESSION['user'] = $user['username'];
        $_SESSION['id'] = $user['id'];
        header("Location: index.php"); // page d'accueil
        exit;
    } else {
        $message = "Email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href='css/login.css' rel='stylesheet'>
</head>
<body>
<?php include 'header.php'; ?> 
<div>   
    <h2>Connexion</h2>

    <?php if($message): ?>
        <p style="color:red;"><?= $message ?></p>
    <?php endif; ?>

    <form method="post" action="">
        <label>Email :</label><br>
        <input type="text" name="email" required><br><br>

        <label>Mot de passe :</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Se connecter</button>
    </form>

<!-- Bouton pour se loger en tant qu'admin -->
    <a class='but_admin' href="../Admin/login.php"><button class="admin-btn">Connexion Admin</button></a>
</div>
<?php include 'footer.php'; ?>    
</body>
</html>
