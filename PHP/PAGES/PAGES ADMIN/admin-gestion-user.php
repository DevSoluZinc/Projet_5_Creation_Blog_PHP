<?php
include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES ADMIN\ASSETS\admin-header.php');
require_once('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\CONTROLLERS\UsersController.php');
$userController = new UsersController();
$users = $userController->GetUsers();

// Vérifier si la variable $users est définie et non vide
if (!empty($users)) {
    // Tableau des utilisateurs validés
    $usersValidated = array_filter($users, function ($user) {
        return $user->role == 1;
    });

    // Tableau des utilisateurs non validés
    $usersNonValidated = array_filter($users, function ($user) {
        return $user->role != 1;
    });
} else {
    // Cas où aucun utilisateur n'est récupéré
    $usersValidated = [];
    $usersNonValidated = [];
}

$user = null; // Initialisation de la variable $user

?>

<main class="content">
    <?php
    if (isset($success)) {
        echo "<script>toastr.success('" . $success . "')</script>";
    }
    ?>
    <div class="container-fluid" style="text-align: -webkit-center">
        <h1>GESTION DES UTILISATEURS</h1>

        <?php
        if($user != null)
        {
            if (isset($_POST['delete-user-' . $user->id])) {
                $deleteResult = $userController->DeleteUserById($user->id);
                if ($deleteResult) {
                    $success = "Utilisateur supprimé";
                    $success = utf8_encode($success);
                } else {
                    $error = "Une erreur s'est produite lors de la suppression";
                    $error = utf8_encode($error);
                }
            }
        }
        if($user != null)
        {
            if (isset($_POST['validate-user-' . $user->id])) {
                $valideResult = $userController->AddUserToAdmin($user->id);
                if ($valideResult) {
                    $success = "Utilisateur supprimé";
                    $success = utf8_encode($success);
                } else {
                    $error = "Une erreur s'est produite lors de la suppression";
                    $error = utf8_encode($error);
                }
            }
        }


        // Afficher le tableau des utilisateurs validés
        $tableValidated = '<h3>Utilisateurs valides</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($usersValidated as $user) {
            if($user != null)
            {
                if (isset($_POST['delete-user-' . $user->id])) {
                    $deleteResult = $userController->DeleteUserById($user);
                    if ($deleteResult) {
                        $success = "Utilisateur supprimé";
                        $success = utf8_encode($success);
                    } else {
                        $error = "Une erreur s'est produite lors de la suppression";
                        $error = utf8_encode($error);
                    }
                }
            }
           
            $tableValidated .= '<tr>
                <td>' . $user->name . '</td>
                <td>' . $user->lastname . '</td>
                <td>' . $user->email . '</td>
                <td>
                    <form method="post">
                        <button type="submit" name="delete-user-' . $user->id . '" style="background: none;border: none;"><i style="color:red;" class="fa-solid fa-circle-xmark fa-2x"></i></button>
                    </form>
                </td>
            </tr>';
        }

        $tableValidated .= '</tbody>
        </table>
        </div>';

        // Afficher le tableau des utilisateurs non validés
        $tableNonValidated = '<h3>Utilisateurs non valides</h3>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Valider</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($usersNonValidated as $user) {
            if($user != null)
            {
                if (isset($_POST['delete-user-' . $user->id])) {
                    $userController = new UsersController();
                    $deleteResult = $userController->DeleteUserById($user);
                    if ($deleteResult) {
                        $success = "Utilisateur supprimé";
                        $success = utf8_encode($success);
                    } else {
                        $error = "Une erreur s'est produite lors de la suppression";
                        $error = utf8_encode($error);
                    }
                }
            }
            if($user != null)
            {
                if (isset($_POST['validate-user-' . $user->id])) {
                    $valideResult = $userController->AddUserToAdmin($user->id);
                    if ($valideResult) {
                        $success = "Utilisateur supprimé";
                        $success = utf8_encode($success);
                    } else {
                        $error = "Une erreur s'est produite lors de la suppression";
                        $error = utf8_encode($error);
                    }
                }
            }
            $tableNonValidated .= '<tr>
                <td>' . $user->name . '</td>
                <td>' . $user->lastname . '</td>
                <td>' . $user->email . '</td>
                <td>
                    <form method="post">
                        <button type="submit" name="validate-user-' . $user->id . '" style="background: none;border: none;"><i style="color:green;" class="fa-solid fa-circle-check fa-2x"></i></button>
                    </form>
                </td>
                <td>
                    <form method="post">
                        <button type="submit" name="delete-user-' . $user->id . '" style="background: none;border: none;"><i style="color:red;" class="fa-solid fa-circle-xmark fa-2x"></i></button>
                    </form>
                </td>
            </tr>';
        }

        $tableNonValidated .= '</tbody>
        </table>
        </div>';

        // Afficher les tableaux
        echo $tableValidated;
        echo $tableNonValidated;
        ?>
    </div>
</main>

<?php include('C:\wamp64\www\Projet_5_Creation_Blog_PHP_V2\PHP\PAGES\PAGES ADMIN\ASSETS\admin-footer.php'); ?>
