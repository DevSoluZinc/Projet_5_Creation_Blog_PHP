   <?php {{ include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES ADMIN\ASSETS\admin-header.php') ; }}
         require_once('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONTROLLERS\ArticlesController.php');
         $articleController = new ArticlesController();

         if ($_SERVER['REQUEST_METHOD'] === 'POST') {
             $success = $articleController->AddArticle();
             $success = utf8_encode($success);
         }?>
<?php
    if (isset($success)) {
        echo "<script>toastr.success('" . $success . "')</script>";
    }
?>
            <main class="content">
            <div class="container">
                <h1 style="color:white;text-align: center;
    font-size: xxx-large;">AJOUT D'ARTICLE</h1>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">Titre</label>
                        <input type="text"
                            class="form-control <?=(!empty($errors) && in_array('Entrez un titre', $errors)) ? 'is-invalid' : '' ?>"
                            name="title" id="title" value="<?= $title ?? '' ?>" />
                        <?php if (!empty($errors) && in_array('Entrez un titre', $errors)): ?>
                        <div class="invalid-feedback">
                            Entrez un titre valide.
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="chapo" class="form-label">Chapo</label>
                        <textarea
                            class="form-control <?=(!empty($errors) && in_array('Entrez un chapo', $errors)) ? 'is-invalid' : '' ?>"
                            name="chapo" id="chapo" rows="3">
                            <?= $chapo ?? '' ?>
                        </textarea>
                        <?php if (!empty($errors) && in_array('Entrez un chapo', $errors)): ?>
                        <div class="invalid-feedback">
                            Entrez un chapo valide.
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="auteur" class="form-label">Auteur</label>
                        <input type="text"
                            class="form-control <?=(!empty($errors) && in_array('Entrez un auteur', $errors)) ? 'is-invalid' : '' ?>"
                            name="auteur" id="auteur" value="<?= $auteur ?? '' ?>" />
                        <?php if (!empty($errors) && in_array('Entrez un auteur', $errors)): ?>
                        <div class="invalid-feedback">
                            Entrez un auteur valide.
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Contenue</label>
                        <textarea
                            class="form-control <?=(!empty($errors) && in_array('Entrez un contenu', $errors)) ? 'is-invalid' : '' ?>"
                            name="content" id="content" rows="5">
                            <?= $content ?? '' ?>
                        </textarea>
                        <?php if (!empty($errors) && in_array('Entrez un contenu', $errors)): ?>
                        <div class="invalid-feedback">
                            Entrez un contenue valide.
                        </div>
                        <?php endif; ?>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Ajouter" />
                </form>
            </div>
            </main>
           <?php {{ include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES ADMIN\ASSETS\admin-footer.php') ; }} ?>

       

