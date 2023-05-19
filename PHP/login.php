<?php
session_start(); // Démarrer la session
require_once('functions.php'); // Inclure les fonctions de connexion
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(login($username, $password))
    {
        $_SESSION['user'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect";
    }
}
if(check_login())
{
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de connexion</title>
</head>
<body>
    <?php if(isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Nom d'utilisateur</label>
        <input type="text" name="username" required>
        <br>
        <label>Mot de passe</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" name="submit" value="Connexion">
    </form>
</body>
</html>
