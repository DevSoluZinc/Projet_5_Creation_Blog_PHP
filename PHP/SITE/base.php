<?php
require('config/functions.php');
$articles = getArticles();
session_start(); // Démarrer la session


// Vérifier si l'utilisateur est connecté
if (check_login()) {
    // L'utilisateur est connecté, afficher un message de bienvenue ou rediriger vers une page protégée
    echo 'Bienvenue, ' . check_login() . ' !';
    // Vous pouvez également rediriger l'utilisateur vers une page protégée en utilisant header('Location: page_protégée.php');
} else {
    // L'utilisateur n'est pas connecté, afficher un message d'erreur ou rediriger vers une page de connexion
    echo 'Vous n\'êtes pas connecté.';
    // Vous pouvez également rediriger l'utilisateur vers une page de connexion en utilisant header('Location: page_de_connexion.php');
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>


    
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
  </head>
  <body>
    
  <nav class="navbar navbar-dark bg-dark mb-3" aria-label="First navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">BlogPost</a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarsExample01" style="">
        <ul class="navbar-nav me-auto mb-2">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="connexion.php">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pageArticle.php">Articles</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top" style="margin-top: auto"> <!-- Utilisation de margin-top: auto pour pousser le footer vers le bas de la page -->
        <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <span class="mb-3 mb-md-0 text-body-secondary">© 2023 Company, Inc</span>
        </div>
        <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
        </ul>
    </footer>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
<script src="app.js"></script>

</html>