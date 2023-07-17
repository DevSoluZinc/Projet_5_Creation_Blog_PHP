<?php

class ArticleModel {
    //FONCTION DE RECUPERATION DE TOUS LES ARTICLES
    function getArticles()
    {
        require ('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');

        $req = $bdd->prepare('SELECT id, title, date FROM article ORDER BY id DESC');
        $req->execute();
        $data = $req->fetchALL(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
    //FONCTION DE RECUPERATION D'UN ARTICLES
    function getArticle($id)
    {
        require ('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');

        $req = $bdd->prepare('SELECT * FROM article WHERE id = ?');
        $req->execute(array($id));
        if ($req->rowCount() == 1) {
            $data = $req->fetch(PDO::FETCH_OBJ);
            return $data;
        } else {
            $req->closeCursor();
        }
    }
    //FONCTION DE SUPPRESSION D'UN ARTICLES
    function deleteArticle($id)
    {
        require ('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');

        $req = $bdd->prepare('DELETE FROM article WHERE id = ?');
        $req->execute(array($id));
    }
    //FONCTION D'AJOUT D'UN ARTICLE :
    function addArticle($title, $chapo, $auteur, $content)
    {
        require ('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');

        // Protection contre les attaques XSS
        $title = htmlspecialchars($title);
        $chapo = htmlspecialchars($chapo);
        $auteur = htmlspecialchars($auteur);
        $content = htmlspecialchars($content);
        $date = date("Y-m-d H:i:s"); // date actuelle
        $req = $bdd->prepare('INSERT INTO article(title, chapo, auteur, date, content) VALUES(:title, :chapo, :auteur, :date, :content)');
        $req->execute(
            array(
                'title' => $title,
                'chapo' => $chapo,
                'auteur' => $auteur,
                'date' => $date,
                'content' => $content,
            )
        );
        $req->closeCursor();
    }
    //FONCTION D'UPDATE D'UN ARTICLE :
    function updateArticle($id, $title, $chapo, $auteur, $content)
    {
        require ('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');

        // Protection contre les attaques XSS
        $title = htmlspecialchars($title);
        $chapo = htmlspecialchars($chapo);
        $auteur = htmlspecialchars($auteur);
        $content = htmlspecialchars($content);
        $req = $bdd->prepare('UPDATE article SET title=:title, chapo=:chapo, auteur=:auteur, content=:content WHERE id=:id');
        $req->execute(
            array(
                'id' => $id,
                'title' => $title,
                'chapo' => $chapo,
                'auteur' => $auteur,
                'content' => $content

            )
        );
        $req->closeCursor();
    }
}

?>