<?php
include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES ADMIN\ASSETS\admin-header.php');
require_once('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONTROLLERS\CommentsController.php');
require_once('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONTROLLERS\ArticlesController.php');

$commentController = new CommentsController();
$articleController = new ArticlesController();

$comments = $commentController->GetComments();
$articles = array();

// Regrouper les commentaires par article
foreach ($comments as $comment) {
    $articles[$comment->articleId][] = $comment;
}
?>

<main class="content">
    <?php
if (isset($success)) {
    echo "<script>toastr.success('" . $success . "')</script>";
}
    ?>
    <div class="container-fluid" style="text-align: -webkit-center">
        <h1>GESTION DES COMMENTAIRES</h1>

        <?php
        // Afficher les commentaires par article
        foreach ($articles as $articleId => $comments) {
            $article = $articleController->GetArticleById($articleId);
            echo '<h3>' . $article->title . '</h3>';
            echo '<div class="table-responsive">';
            echo '<table class="table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>#</th>';
            echo '<th>Auteur</th>';
            echo '<th>Commentaire</th>';
            echo '<th>Date</th>';
            echo '<th>Statut</th>';
            echo '<th>Actions</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($comments as $comment) {
                echo '<tr>';
                echo '<td>' . $comment->id . '</td>';
                echo '<td>' . $comment->author . '</td>';
                echo '<td>' . $comment->comment . '</td>';
                echo '<td>' . $comment->date . '</td>';
                echo '<td>' . ($comment->validate == 0 ? 'En attente' : 'Validé') . '</td>';
                echo '<td>';

                // Bouton de validation
                if ($comment->validate == 0) {
                    echo '<form method="post">';
                    echo '<button type="submit" name="validate-comment-' . $comment->id . '" style="background: none;border: none;"><i style="color:green;" class="fa-solid fa-circle-check fa-2x"></i></button>';
                    echo '</form>';
                }

                // Bouton de suppression
                echo '<form method="post">';
                echo '<button type="submit" name="delete-comment-' . $comment->id . '" style="background: none;border: none;"><i style="color:red;" class="fa-solid fa-circle-xmark fa-2x"></i></button>';
                echo '</form>';

                echo '</td>';
                echo '</tr>';

                // Traitement du bouton de validation
                if (isset($_POST['validate-comment-' . $comment->id])) {
                    $validComment = $commentController->ValidateComment($comment->id);
                    if ($validComment) {
                        $success = "Commentaire validé";
                        $success = utf8_encode($success);
                        echo "<script>toastr.success('" . $success . "')</script>";
                    } else {
                        $error = "Une erreur s'est produite lors de la validation";
                        $error = utf8_encode($error);
                    }
                }

                // Traitement du bouton de suppression
                if (isset($_POST['delete-comment-' . $comment->id])) {
                    $deletComment = $commentController->DeleteCommentsById($comment->id);
                    if ($deletComment) {
                        $success = "Commentaire supprimé";
                        $success = utf8_encode($success);
                        echo "<script>toastr.success('" . $success . "')</script>";
                    } else {
                        $error = "Une erreur s'est produite lors de la Suppression";
                        $error = utf8_encode($error);
                    }
                }
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
        ?>

    </div>
</main>

<?php
include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES ADMIN\ASSETS\admin-footer.php');
?>
