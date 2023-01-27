<?php 
//FONCTION DE RECUPERATION DE TOUS LES ARTICLES
function getArticles()
{
    require('connect.php');
    $req = $bdd->prepare('SELECT id, title FROM article ORDER BY id DESC');
    $req->execute();
    $data = $req->fetchALL(PDO::FETCH_OBJ);
    $req->closeCursor();
    return $data;
}
//FONCTION DE RECUPERATION D'UN ARTICLES
function getArticle($id)
{
    require('connect.php');
    $req = $bdd->prepare('SELECT * FROM article WHERE id = ?');
    $req->execute(array($id));
    if($req->rowCount() == 1)
    {
        $data = $req->fetch(PDO::FETCH_OBJ);
        return $data;
    }else{
        header('Location : index.php');
    }
}