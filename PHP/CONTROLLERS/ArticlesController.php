<?php
require ('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\MODELS\ArticleModel.php');
class ArticlesController
{
    public function GetArticles()
    {
        $articleModel = new ArticleModel();
        return $articleModel->getArticles();
    }
    public function GetArticleById($id)
    {
        $articleModel = new ArticleModel();
        return $articleModel->getArticle($id);
    }
    public function AddArticle()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // V�rification des saisies de l'utilisateur
            if (empty($_POST['title'])) {
                $errors[] = 'Entrez un titre';
            }
            if (empty($_POST['chapo'])) {
                $errors[] = 'Entrez un chapo';
            }
            if (empty($_POST['auteur'])) {
                $errors[] = 'Entrez un auteur';
            }
            if (empty($_POST['content'])) {
                $errors[] = 'Entrez un contenu';
            }

            if (empty($errors)) {
                // Si aucune erreur n'a �t� d�tect�e, on peut traiter les donn�es
                $title = $_POST['title'];
                $chapo = $_POST['chapo'];
                $auteur = $_POST['auteur'];
                $content = $_POST['content'];

                // Traitement des donn�es
                $articleModel = new ArticleModel();
                $articleModel->addArticle($title, $chapo, $auteur, $content);

                $success = 'Votre article a �t� ajout�';
                return $success;
            }
        }
    }
    public function UpdateArticle()
    {
        // Initialisation de la variable $errors
        $errors = [];

        // R�cup�ration de l'ID de l'article depuis l'URL
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // V�rification des saisies de l'utilisateur
            if (empty($_POST['title'])) {
                $errors[] = 'Entrez un titre';
            }

            if (empty($_POST['chapo'])) {
                $errors[] = 'Entrez un chapo';
            }

            if (empty($_POST['auteur'])) {
                $errors[] = 'Entrez un auteur';
            }

            if (empty($_POST['content'])) {
                $errors[] = 'Entrez un contenu';
            }

            // Si aucune erreur n'a �t� d�tect�e, on peut traiter les donn�es
            if (empty($errors)) {
                // Traitement des donn�es
                $title = $_POST['title'];
                $chapo = $_POST['chapo'];
                $auteur = $_POST['auteur'];
                $content = $_POST['content'];
                $articleModel = new ArticleModel();
                $articleModel->updateArticle($id, $title, $chapo, $auteur, $content);
                $success = 'Votre article a �t� mis � jour';
                return $success;
            }
        }

        return $errors;
    }
    public function DeleteArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $articleId = $_POST['delete_article'];
            $articleModel = new ArticleModel();
            $articleModel->deleteArticle($articleId);
            $success = 'Votre article a �t� supprim�';
            return $success;
        }
    }

}

?>