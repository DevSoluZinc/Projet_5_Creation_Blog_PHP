<?php
include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES BLOG\ASSETS\header.php');
require_once('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONTROLLERS\ArticlesController.php');
require_once('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONTROLLERS\CommentsController.php');

$articlesController = new ArticlesController();
$commentController = new CommentsController();

extract($_GET);
$id = strip_tags($id);
$articleId = $articlesController->GetArticleById($id);
$comments = $commentController->GetCommentsByArticleId($articleId->id);

?>

<main class="container">
    <div class="border-bottom d-flex" style="align-items: stretch;justify-content: space-around;">
        <h3 class="pb-4 mb-4 fst-italic ">
            <?= $articleId->title ?>
        </h3>
        <p style="font-size: small;">
            écrit le
            <?= date('d/m/Y', strtotime($articleId->date)) ?> par
            <?= $articleId->auteur ?>
        </p>
    </div>
    <article class="blog-post">
        <h2>
            <?= $articleId->chapo ?>
        </h2>
        <div class="card-body">
            <p>
                <?= $articleId->content ?>
            </p>
        </div>
    </article>
    <div class="card p-2 m-2">
       
        <?php if ($check): ?>
        <!-- Formulaire de commentaire -->
        <form method="post" action="">
            <div class="mb-3">
                <label for="author" class="form-label">Pseudo</label>
                <input type="text" class="form-control <?= (!empty($errors) && in_array('Entrez un pseudo', $errors)) ? 'is-invalid' : '' ?>" name="author" id="author" value="<?= $author ?? '' ?>" />
                <?php if (!empty($errors) && in_array('Entrez un pseudo', $errors)): ?>
                <div class="invalid-feedback">
                    Entrez un pseudo valide.
                </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">Commentaire</label>
                <textarea class="form-control <?= (!empty($errors) && in_array('Entrez un commentaire', $errors)) ? 'is-invalid' : '' ?>" name="comment" id="comment" rows="3">
                    <?= $comment ?? '' ?>
                </textarea>
                <?php if (!empty($errors) && in_array('Entrez un commentaire', $errors)): ?>
                <div class="invalid-feedback">
                    Entrez un commentaire valide.
                </div>
                <?php endif; ?>
                
            </div>
            <button type="submit" name="comment" class="btn btn-primary">Envoyer</button>
            <?php if (isset($_POST['comment'])) {
                      $author = $_POST['author'];
                      $comment = $_POST['comment'];
                      $commentController->AddCommentById($id, $author, $comment);
                      $success = 'Commentaire en attente de validation';
                          $success = utf8_encode($success);
                          echo "<script>toastr.success('".$success."')</script>";
                          unset($_POST['author']);
                          unset($_POST['comment']);

                  }?>
        </form>
        <?php else: ?>
        <!-- Bouton de connexion -->
        <a class="btn btn-primary" href="connexion.php">Se connecter pour commenter</a>
        <?php endif; ?>
    </div>
    <div class="card p-4 m-3">
        <h3 style="align-self: center;">Commentaires</h3>
    </div>
    <?php
    if (!empty($comments)): ?>
    <?php foreach ($comments as $comment): ?>
    <?php if ($comment->validate == 1): ?>
    <div class="card m-3">
        <div class="card-body">
            <h5 class="card-title">
                De
                <?= $comment->author ?>
            </h5>
            <p class="card-text">
                <?= $comment->comment ?>
            </p>
            <p class="card-text">
                <small class="text-muted">
                    publié le
                    <?= $comment->date ?>
                </small>
            </p>
        </div>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
    <?php else: ?>
    <div class="card mb-3">
        <div class="card-body">
            <p class="card-text">Aucun commentaire pour le moment.</p>
        </div>
    </div>
    <?php endif; ?>
</main>

<?php
include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES BLOG\ASSETS\footer.php');
?>
