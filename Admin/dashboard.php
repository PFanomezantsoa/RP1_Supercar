<?php
include("../bd.php");

// Démarrer la session seulement si elle n'existe pas déjà
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

// Vérifier si admin connecté
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href='css/dashboard_admin.css' rel='stylesheet'>
</head>
<body>
<?php include 'header.php'; ?>    

<div class="dashboard-container">
    <h2>Tableau de bord</h2>
    <p>Bienvenue <?php echo htmlspecialchars($_SESSION['admin']); ?> !</p>

    <nav>
        <a href="voitures.php">Gérer les voitures</a> |
        <a href="essais.php">Voir les demandes d’essai</a> |
        <a href="services.php">Services</a> |
        <a href="logout.php">Déconnexion</a>
    </nav>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
