<?php
class CommentsModel {
    //FONCTION DE RECUPERATION DES COMMENTAIRES D'UN ARTICLE
    function getComments($articleId)
    {
        require('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');
        $req = $bdd->prepare('SELECT * FROM commentaire WHERE articleId = ? ORDER BY date DESC');
        $req->execute(array($articleId));
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;
    }
    //FONCTION DE RECUPERATION GENERAL DES COMMENTAIRES
    function getCommentsGeneral()
    {

        require('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');

        $req = $bdd->prepare('SELECT * FROM commentaire ORDER BY date DESC');
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        $req->closeCursor();
        return $data;

    }

    //FONCTION D'AJOUT DE COMMENTAIRE
    function addComment($articleId, $author, $comment): void
    {
        require('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');

        $req = $bdd->prepare('INSERT INTO commentaire (articleId, author, comment, date, validate) VALUES (?, ?, ?, NOW(), 0)');
        $req->execute(array($articleId, $author, $comment));
        $req->closeCursor();
    }
    //FONCTION DE MAJ D'UN COMMENTAIRE
    function updateCommentValidation($commentId, $validate) {
        require('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');

        $req = $bdd->prepare('UPDATE commentaire SET validate = ? WHERE id = ?');
        $req->execute(array($validate, $commentId));
        $req->closeCursor();
    }
    //FONCTION DE SUPPRESSION D'UN COMMENTAIRE
    function deleteComment($commentId) {
        require('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');
        $req = $bdd->prepare('DELETE FROM commentaire WHERE id = ?');
        $req->execute(array($commentId));
        $req->closeCursor();
    }
}
?>