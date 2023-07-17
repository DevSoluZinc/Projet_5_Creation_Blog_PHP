<?php
require ('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\MODELS\UsersModel.php');
class UsersController
{
    public function GetUsers()
    {
        $UsersModel = new UsersModel();
        return $UsersModel-> getAllUsers();
    }
    public function GetUsersById()
    {
        $UsersModel = new UsersModel();
        return $UsersModel-> getUserById($id);
    }
    public function GetUsersRole($id)
    {
        $UsersModel = new UsersModel();
        return $UsersModel-> get_user_role($id);
    }


    public function AddUser()
    {
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = crypt($_POST['password'], "toto");

        $usersModel = new UsersModel();
        $success = $usersModel->register($name, $password, $email, $lastname);

        if ($success) {
            // L'inscription est r�ussie
            return true;
        } else {
            // L'inscription a �chou�
            $error = 'Une erreur s\'est produite lors de l\'inscription.';
            return $error;
        }
    }
    public function AddUserToAdmin($userId)
    {
        $successMessage = "R�le administrateur ajout�";
        $errorMessage = "Probl�me d'ajout";

        $usersModel = new UsersModel();
        $success = $usersModel->updateUserRoleToValidated($userId);

        if ($success) {
            return $successMessage;
        } else {
            return $errorMessage;
        }
    }
    public function ConnectionUser()
    {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $UsersModel = new UsersModel();
            $authenticated = $UsersModel->authenticateUser($email, $password);
            if ($authenticated) {
                return true;
            } else {
                return false;
            }

    }
    public function DeleteUserById($user)
    {
        if (isset($_POST['delete-user-' . $user->id])) {
            $UsersModel = new UsersModel();
            $UsersModel->deleteUser($user->id);
            return true;
        }
    }

    public function UnLogin()
    {
        // D�but de session
        session_start();

        // Suppression des variables de session
        session_unset();

        // Destruction de la session
        session_destroy();

        // Redirection vers la page d'accueil ou une autre page apr�s la d�connexion
        header("Location: index.php");
        exit();
    }

    public function CheckLogin()
    {
        $UsersModel = new UsersModel();
        return $UsersModel->check_login();

    }
}

?>