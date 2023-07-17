<?php
require ('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\MODELS\CommentsModel.php');
class CommentsController
{
    public function GetComments()
    {
        $commentsModel = new CommentsModel();
        return $commentsModel->getCommentsGeneral();
    }

    public function GetCommentsByArticleId($articleId)
    {
        $commentsModel = new CommentsModel();
        return $commentsModel->getComments($articleId);
    }

    public function ValidateComment($id)
    {
        $validate = true;
        $commentsModel = new CommentsModel();
        $commentsModel->updateCommentValidation($id, $validate);
        $success = "commentaire mis à jour";
        return $success;
    }

    public function AddCommentById($id , $author , $comment)
    {
        $articleModel = new ArticleModel();
        $article = $articleModel->getArticle($id);
        $articleId = $article->id;

        if (!empty($_POST)) {

            $errors = array();

            if (empty($author)) {
                $errors[] = 'Entrez un pseudo';
            }

            if (empty($comment)) {
                $errors[] = 'Entrez un commentaire';
            }

            if (count($errors) == 0) {
                $commentsModel = new CommentsModel();
                $commentsModel->addComment($articleId, $author, $comment);

                $success = 'Votre commentaire a été soumis à validation';
                unset($_POST['author']);
                unset($_POST['comment']);

                return $success;
            } else {
                return $errors;
            }
        }
    }

    public function DeleteCommentsById($id)
    {
        
            $commentsModel = new CommentsModel();
            $commentsModel->deleteComment($id);
            $success = 'Commentaire supprimé';
            return $success;
        
    }
}

?>