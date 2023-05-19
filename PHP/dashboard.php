<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tableau de bord</title>
</head>
<body>
    <h1>Bienvenue sur le tableau de bord</h1>
    <p>Vous êtes connecté en tant que <?php echo $_SESSION['username']; ?></p>
    <a href="logout.php">Se déconnecter</a>
</body>
</html>