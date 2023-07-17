<?php
require 'Controllers/ArticlesController.php';
$articlesController = new ArticlesController();
$article = $articleController->GetArticleById();
?>

<main class="container">
    <div class="border-bottom d-flex" style="align-items: stretch;justify-content: space-around;">
        <h3 class="pb-4 mb-4 fst-italic ">
            <?= $article->title ?>
        </h3>
        <p style="font-size: small;">
            écrit le
            <?= date('d/m/Y', strtotime($article->date)) ?> par
            <?= $article->auteur ?>
        </p>
    </div>
    <article class="blog-post">
        <h2>
            <?= $article->chapo ?>
        </h2>
        <div class="card-body">
            <p>
                <?= $article->content ?>
            </p>
        </div>
    </article>
</main>