<?php
include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES ADMIN\ASSETS\admin-header.php');
require_once('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONTROLLERS\ArticlesController.php');
$articleController = new ArticlesController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $success = $articleController->DeleteArticle();
    $success = utf8_encode($success);
}

?>

<main class="content">
    <?php
    if (isset($success)) {
        echo "<script>toastr.success('" . $success . "')</script>";
    }
    ?>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article): ?>
                <tr>
                    <td>
                        <?= $article->title ?>
                    </td>
                    <td>
                        <?= $article->date ?>
                    </td>
                    <td>
                        <a href="admin-update-article.php?id=<?= $article->id ?>" class="btn btn-primary">Modifier</a>
                        <form method="post" style="display: inline;">
                            <input type="hidden" name="delete_article" value="<?= $article->id ?>" />
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES ADMIN\ASSETS\admin-footer.php'); ?>