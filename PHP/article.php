<?php
/*if(!isset($_Get['id']) OR !is_numeric($_GET['id']))
header('Location: index.php');
else{*/
    extract($_GET);
    $id = strip_tags($id);

    require_once('config/functions.php');
    $article = getArticle($id);
//}
?>

<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8"/>
    <title><?= $article->title ?></title>
</head>
<body>
    <h1><?= $article->title ?>  </h1>
    <h2><?= $article->chapo ?>  </h1>
    <p> <?= $article->content ?></p>
    <h2><?= $article->date ?>   </h1>
    <h2><?= $article->auteur ?> </h1>
</body>
</html>