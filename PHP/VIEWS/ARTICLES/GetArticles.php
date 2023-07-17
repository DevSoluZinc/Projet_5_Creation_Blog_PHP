<?php
require ('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONTROLLERS\ArticlesController.php');
$articlesController = new ArticlesController();
$articles = $articlesController->GetArticles();
$total_articles = count($articles);
$articles_this_month = 0;
foreach ($articles as $article) {
    if (date('Y-m', strtotime($article->date)) == date('Y-m')) {
        $articles_this_month++;
    }
}
?>

