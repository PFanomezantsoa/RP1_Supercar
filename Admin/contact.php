<?php
include("../bd.php");
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
$result = $mysqli ->query ("SELECT*FROM contact");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>