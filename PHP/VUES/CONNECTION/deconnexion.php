<?php
// D�but de session
session_start();

// Suppression des variables de session
session_unset();

// Destruction de la session
session_destroy();

// Redirection vers la page d'accueil ou une autre page apr�s la d�connexion
header("Location: index.php");
exit();
?>