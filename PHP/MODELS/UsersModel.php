<?php
//FONCTION DE CONNEXION
class UsersModel {
    function authenticateUser($email, $password): bool
    {
        require('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');

        $stmt = $bdd->prepare('SELECT * FROM user WHERE email = :email');
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        } else {
            return false;
        }
    }
    //FONCTION D'INSCRIPTION
    function register($name, $password, $email, $lastname)
    {
        require('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');

        $stmt = $bdd->prepare('INSERT INTO user (name, lastname, email, password) VALUES (:name, :lastname, :email, :password)');
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $result = $stmt->execute();
        if ($result) {
            return true; // L'inscription est réussie
        } else {
            return false; // L'inscription a échoué
        }

    }

    // FONCTION DE VERIFICATION SI L'UTILISATEUR EST CONNECTER
    function check_login()
    {
        // Vérifie si la variable de session 'user_id' existe
        if (isset($_SESSION['user_id'])) {
            // Vérifie si l'utilisateur existe dans la base de données
            require('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');
            $req = $bdd->prepare('SELECT * FROM user WHERE id = ?');
            $req->execute(array($_SESSION['user_id']));
            if ($req->rowCount() == 1) {
                $data = $req->fetch(PDO::FETCH_ASSOC);
                return $data['name']; // Renvoie le nom d'utilisateur de l'utilisateur connecté
            }
        }
        return false; // L'utilisateur n'est pas connecté
    }
    // FONCTION DE RECUPERATION DES UTILISATEURS
    function getAllUsers()
    {
        require('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');
        $req = $bdd->prepare('SELECT * FROM user');
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    function updateUserRoleToValidated($userId)
    {
        require('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');

        $req = $bdd->prepare('UPDATE user SET role = 1 WHERE id = ?');
        $req->execute(array($userId));

        // Vérifier si la mise à jour a réussi
        if ($req->rowCount() > 0) {
            return true; // Rôle mis à jour avec succès
        } else {
            return false; // Échec de la mise à jour
        }


    }
    // Fonction de suppression d'utilisateur
    function deleteUser($userId) {
        require('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');
        $req = $bdd->prepare('DELETE FROM user WHERE id = ?');
        $req->execute(array($userId));
        $req->closeCursor();
    }
    // Fonction de récupération d'utilisateur par son id
    function getUserById($userId) {
        require('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');
        $req = $bdd->prepare('SELECT * FROM user WHERE id = ?');
        $req->execute(array($userId));
        $user = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $user;
    }
    function updateUser($userId, $name, $lastname, $email, $image , $password)
    {
        require('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');
        // Protection contre les attaques XSS
        $name = htmlspecialchars($name);
        $lastname = htmlspecialchars($lastname);
        $email = htmlspecialchars($email);
        $image = htmlspecialchars($image);
        $password = htmlspecialchars($password);

        // Mettre à jour les données de l'utilisateur dans la base de données
        $req = $bdd->prepare('UPDATE user SET name=:name, lastname=:lastname, email=:email, image=:image,  password=:password, WHERE id=:id');
        $req->execute(array(
            'id' => $userId,
            'name' => $name,
            'lastname' => $lastname,
            'email' => $email,
            'image' => $image,
            'password' => $password
        ));
        // Vérifier si la mise à jour a réussi
        if ($req->rowCount() > 0) {
            return true; // Mise à jour réussie
        } else {
            return false; // Échec de la mise à jour
        }
    }

    //FONCTION DE RECUPERATION DU ROLE DU USER
    function get_user_role($id)
    {
        require('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONFIG\connect.php');
        $stmt = $bdd->prepare('SELECT role FROM user WHERE id = :id AND role = 1');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return true; // Utilisateur validé
        } else {
            return false; // Utilisateur non validé
        }
    }

}

?>