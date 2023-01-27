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
