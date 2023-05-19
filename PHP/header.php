<nav class="navbar navbar-dark bg-dark mb-3" aria-label="First navbar example">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">BlogPost</a>
        <?php  if (check_login()) {
    echo 'Bienvenue, ' . check_login() . ' !';

    $user_role = get_user_role($_SESSION['user_id']);

} ?>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbarsExample01" style="">
        <ul class="navbar-nav me-auto mb-2">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="connexion.php">Connexion</a>
          </li><?php
               if ($user_role == 1) {
                   echo '<li class="nav-item">';
                   echo '<a class="nav-link active" aria-current="page" href="admin-index.php">Administrateur</a>';
                   echo '</li>';
               }
               ?>
          <li class="nav-item">
            <a class="nav-link" href="pageArticle.php">Articles</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>