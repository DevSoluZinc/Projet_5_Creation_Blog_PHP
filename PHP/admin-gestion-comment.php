
<?php
require('config/functions.php');
ob_start();
$articles = getArticles();
$comments= getCommentsGeneral()
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
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <title>Tableau de bord | BlogPost</title>
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
                <div class="container-fluid" style="text-align: -webkit-center">
                <main class="content">
                    <h1>GESTIONS DES COMMENTAIRES</h1>
                    <?php

$comments = getCommentsGeneral();
$articles = array();

// Regrouper les commentaires par article
foreach ($comments as $comment) {
    $articles[$comment->articleId][] = $comment;
}



// Afficher les commentaires par article
foreach ($articles as $articleId => $comments) {
    $article = getArticle($articleId);
    echo '<h3>' . $article->title . '</h3>';
    echo '<table class="table">';
    echo '<thead>';
echo '<tr>';
echo '<th>Auteur</th>';
echo '<th>Commentaire</th>';
echo '<th>Date</th>';
echo '<th>Statut</th>';
echo '<th>Actions</th>';
echo '</tr>';
echo '</thead>';
    foreach ($comments as $comment) {
        echo '<tr>';
        echo '<td>' . $comment->author . '</td>';
        echo '<td>' . $comment->comment . '</td>';
        echo '<td>' . $comment->date . '</td>';
        if ($comment->validate == 0) {
            echo '<td>En attente</td>';
        } else {
            echo '<td>Validé</td>';
        }
        echo '<td>';
        echo '<div class="row">';
        // Bouton de validation
        if ($comment->validate == 0) {
            echo '<div class="col">';
            echo '<form method="post">';
            echo '<button type="submit" name="validate-comment-' . $comment->id . '" style="background: none;border: none;"><i style="color:green;" class="fa-solid fa-circle-check fa-2x"></i></button>';
            echo '</form>';
            echo '</div>';
        }
        // Bouton de suppression
        echo '<div class="col">';
        echo '<form method="post">';
        echo '<button type="submit" name="delete-comment-' . $comment->id . '" style="background: none;border: none;"><i style="color:red;" class="fa-solid fa-circle-xmark fa-2x"></i></button>';
        echo '</form>';
        echo '</td>';
        echo '</tr>';
        echo '</div>';
        echo '</div>';

        // Traitement du bouton de validation
        
        if (isset($_POST['validate-comment-' . $comment->id])) {
            
            updateCommentValidation($comment->id, 1);
            echo '<script>toastr.success("Le commentaire a été validé.")</script>';
        }
        

        // Traitement du bouton de suppression
        if (isset($_POST['delete-comment-' . $comment->id])) {
            deleteComment($comment->id);
            // Actualiser la page pour masquer le commentaire supprimé
            echo '<script>toastr.danger("Commentaire supprimé.")</script>';
                  }
    }
    echo '</table>';
}// Bouton pour approuver tous les commentaires en attente
$pendingComments = array_filter($comments, function($comment) {
    return $comment->validate == 0;
});
echo '<div class="row">';
if (!empty($pendingComments)) {
    echo '<div class="col">';
    echo '<form method="post">';
    echo '<button type="submit" name="validate-all" class="btn btn-primary">Approuver tous les commentaires en attente</button>';
    echo '</form>';
    echo '</div>';
}

// Traitement du bouton pour approuver tous les commentaires en attente
if (isset($_POST['validate-all'])) {
    foreach ($pendingComments as $comment) {
        $commentId = $comment->id;
        updateCommentValidation($commentId, 1);
    }
    // Actualiser la page pour masquer les commentaires approuvés
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
}

// Bouton pour supprimer tous les commentaires
if (!empty($comments)) {
    echo '<div class="col">';
    echo '<form method="post">';
    echo '<button type="submit" name="delete-all" class="btn btn-danger">Supprimer tous les commentaires</button>';
    echo '</form>';
    echo '</div>';
}
echo '</div>';
// Traitement du bouton pour supprimer tous les commentaires
if (isset($_POST['delete-all'])) {
    foreach ($comments as $comment) {
        $commentId = $comment->id;
        deleteComment($commentId);
    }
    // Actualiser la page pour masquer les commentaires supprimés
    header('Location: ' . $_SERVER['REQUEST_URI']);
    exit();
    
}
ob_end_flush();
?>
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
</body>

</html>