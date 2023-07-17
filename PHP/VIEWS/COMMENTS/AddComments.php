<div class="card p-2 m-2">
    <!-- Formulaire de commentaire -->
    <?php if (check_login()): ?>
    <form action="article.php?id=<?= $article->id ?>" method="post">
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
        <button type="submit" class="btn btn-primary">Envoyer</button>
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
$comments = getComments($article->id);
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