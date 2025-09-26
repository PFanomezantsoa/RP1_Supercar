<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='css/login_admin.css' rel='stylesheet'>
</head>
<body>
   <?php
session_start();
include '../bd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $res = $mysqli->query("SELECT * FROM admin WHERE username='$user' AND password='$pass'");
    if ($res->num_rows == 1) {
        $_SESSION['admin'] = $user;
        header("Location: dashboard.php");
    } else {
        $error = "Identifiants incorrects";
    }
}
?>
<form method="post">
    <h2>Login Admin</h2>
    <label>Utilisateur :</label><input type="text" name="username" required><br>
    <label>Mot de passe :</label><input type="password" name="password" required><br>
    <button type="submit">Se connecter</button>
</form>
<?php if (!empty($error)) echo "<p style='color:red'>$error</p>"; ?>
 
</body>
</html>
