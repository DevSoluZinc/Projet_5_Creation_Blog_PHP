<?php
session_start();
require ('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONTROLLERS\ArticlesController.php');
require_once('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONTROLLERS\UsersController.php');
require_once('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONTROLLERS\CommentsController.php');
$articlesController = new ArticlesController();
$commentController = new CommentsController();
$usersController = new UsersController();

$articles = $articlesController->GetArticles(); 
$check = $usersController->CheckLogin();
$role = null; // Valeur par d�faut si non connect�
if (isset($_SESSION['user_id'])) {
    $role = $usersController->GetUsersRole($_SESSION['user_id']);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogPost</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
  </head>
  <body>
<nav class="navbar navbar-dark bg-dark mb-3" aria-label="First navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">BlogPost</a>
        <?php  if ($check) {
                   echo 'Bienvenue, ' . $check . ' !';
               } ?>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarsExample01" style="">
            <ul class="navbar-nav me-auto mb-2">
                <?php
                if ($check) {
                    echo '<span style= "color: white;">';
                    echo 'Bienvenue, ' . $check . ' !';
                    echo '</span>';
                }
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="pageArticle.php">Articles</a>
                </li>
                <?php

                if ($check) {
                    if ($role == 1) {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link active" aria-current="page" href="\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES ADMIN\admin-index.php">Administrateur</a>';
                    echo '</li>';
                }else{

                }}
                if ($check) {
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link active" aria-current="page" href="updateInfo.php">Informations du compte</a>';
                    echo '</li>';
                }
                if ($check) {
                    echo '<a class="nav-link active" aria-current="page" href="deconnexion.php">Deconnexion</a>';
                } else {
                    echo '<a class="nav-link active" aria-current="page" href="connexion.php">Connexion</a>';
                }
                ?>

            </ul>
        </div>
    </div>
</nav>
