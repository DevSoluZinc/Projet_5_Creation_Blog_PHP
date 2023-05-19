<?php
require('config/functions.php');
$articles = getArticles();
$total_articles = count($articles);
$articles_this_month = 0;

foreach ($articles as $article) {
    if (date('Y-m', strtotime($article->date)) == date('Y-m')) {
        $articles_this_month++;
    }
}
$comments = getCommentsGeneral();
$total_comments = count($comments);
$comments_this_month = 0;
foreach ($comments as $comment) {
    if (date('Y-m', strtotime($comment->date)) == date('Y-m')) {
        $comments_this_month++;
    }
}
if (isset($_POST['delete_article'])) {
    $id = $_POST['delete_article'];
    deleteArticle($id);
    $success = 'Votre Article à été supprimer';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo.adminkit.io/forms-editors.html" />

    <title>Editors | AdminKit Demo</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <link href="dark.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <style>
        body {
            opacity: 0;
        }
    </style>
</head>


<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <div class="wrapper">
    <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="admin-index.php">
                    <span class="sidebar-brand-text align-middle">
                        Blog Post Administrator
                    </span>
                </a>

                <div class="sidebar-user">
                    <div class="d-flex justify-content-center">
                        <div class="flex-shrink-0">
                            <!--<img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded me-1" alt="Charles Hall" />-->
                        </div>
                        <div class="flex-grow-1 ps-2">
                            <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                Maxence Medard
                            </a>
                            <div class="dropdown-menu dropdown-menu-start">
                                <a class="dropdown-item" href="pages-profile.html"><i class="align-middle me-1"
                                        data-feather="user"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                        data-feather="pie-chart"></i> Analytics</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1"
                                        data-feather="settings"></i> Settings &
                                    Privacy</a>
                                <a class="dropdown-item" href="#"><i class="align-middle me-1"
                                        data-feather="help-circle"></i> Help Center</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Log out</a>
                            </div>

                            <div class="sidebar-user-subtitle">Designer</div>
                        </div>
                    </div>
                </div>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Pages
                    </li>
                    <li class="sidebar-item">
                        <a href="admin-index.php" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="sliders"></i> <span
                                class="align-middle">Dashboards</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a data-bs-target="#pages" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="layout"></i> <span
                                class="align-middle">Articles</span>
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link" href="admin-articles.php">Tous les
                                    articles</a></li>
                            <li class="sidebar-item"><a class="sidebar-link" href="admin-add-article.php">Ajout
                                    d'articles</a></li>
                        </ul>
                    </li>



                    <li class="sidebar-item">
                        <a href="#auth" data-bs-toggle="collapse" class="sidebar-link collapsed">
                            <i class="align-middle" data-feather="users"></i> <span class="align-middle">Gestions</span>
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a class="sidebar-link" href="admin-gestion-user.php">Utilisateurs</a>
                            </li>
                            <li class="sidebar-item"><a class="sidebar-link" href="admin-gestion-comment.php">Commentaires</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
            

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item">
                            <a class="nav-icon js-fullscreen d-none d-lg-block" href="#">
                                <div class="position-relative">
                                    <i class="align-middle" data-feather="maximize"></i>
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
            <main class="content">
                <?php
                if (isset($success)) {
                    echo "<script>toastr.success('" . $success . "')</script>";
                }
                ?>
                <div class="row">
                    <?php
                    // Nombre d'articles à afficher initialement
                    $num_articles = 9;
                    // Articles triés par ordre de date décroissante
                    $sorted_articles = array_reverse($articles);
                    // Nombre total d'articles
                    $total_articles = count($articles);
                    // Articles à afficher
                    $display_articles = array_slice($sorted_articles, 0, $num_articles);
                    // Afficher les articles en cartes
                    foreach ($display_articles as $article):
                        ?>
                        <div class="col">
                            <div class="card"
                                style="width: 18rem; font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif; font-weight:100; background: rgba(0,0,0,0.3); color: white;margin-bottom: 50px;">
                                <i class="fa-solid fa-pen-nib fa-2x" style="white"></i>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $article->title ?>
                                    </h5>
                                    <p class="card-text">
                                        <?= $article->date ?>
                                    </p>
                                    <a href="admin-update-article.php?id=<?= $article->id ?>"
                                        class="btn btn-primary">Modifier</a>
                                    <form method="post">
                                        <input type="hidden" name="delete_article" value="<?= $article->id ?>">
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>

                <div class="text-center">
                    <button class="btn btn-primary" id="load-more-btn">Afficher plus</button>
                </div>
            </main>

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="index.php" target="_blank" class="text-muted"><strong>BlogPost</strong></a>
                                &copy;
                            </p>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="admin.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var editor = new Quill("#quill-editor", {
                modules: {
                    toolbar: "#quill-toolbar"
                },
                placeholder: "Type something",
                theme: "snow"
            });
            var bubbleEditor = new Quill("#quill-bubble-editor", {
                placeholder: "Compose an epic...",
                modules: {
                    toolbar: "#quill-bubble-toolbar"
                },
                theme: "bubble"
            });
        });
    </script>
    <script>
        // code JavaScript pour gérer le chargement des articles supplémentaires
        var loadMoreBtn = document.getElementById('load-more-btn');
        var articlesContainer = document.querySelector('.row');
        var articles = <?= json_encode($articles) ?>;
        var count = 9; // commencer à partir du cinquième article

        loadMoreBtn.addEventListener('click', function () {
            for (var i = count; i < count + 2 && i < articles.length; i++) {
                var article = articles[i];
                var articleHtml = `
        <div class="col-md-6">
          <div class="card" style="width: 18rem; font-family: Agenda-Light, Agenda Light, Agenda, Arial Narrow, sans-serif; font-weight:100; background: rgba(0,0,0,0.3); color: white;margin-bottom:50px">
          <i class="fa-solid fa-pen-nib fa-2x" style="white"></i>
            <div class="card-body">
              <h5 class="card-title">
                ${article.title}
              </h5>
              <p class="card-text">
                ${article.date}
              </p>
              <a href="article.php?id=${article.id}" class="btn btn-primary">Lire la suite</a>
            </div>
          </div>
        </div>
      `;
                articlesContainer.innerHTML += articleHtml;
            }
            count += 2; // incrémenter le compteur pour les deux prochains articles
            if (count >= articles.length) {
                loadMoreBtn.style.display = 'none'; // cacher le bouton lorsque tous les articles ont été affichés
            }
        });
    </script>
</body>

</html>