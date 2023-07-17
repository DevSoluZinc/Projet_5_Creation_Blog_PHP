<?php
require('config/functions.php');
session_start();

// récupérer les informations de l'utilisateur
$user = getUserById($_SESSION['user_id']);
$name = $user['name'] ?? '';
$lastname = $user['lastname'] ?? '';
$email = $user['email'] ?? '';
$id = $user['id'] ?? '';
$image = $user['image'] ?? '';
$password = $user['password'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Traitement de l'image
    if (!empty($_FILES['image']['name'])) {
        $targetDir = 'UserPhoto/';
        $fileName = $_FILES['image']['name'];
        $targetFilePath = $targetDir . $fileName;
        // Supprimer l'ancienne photo s'il en existe une
        if (!empty($image)) {
            $oldFilePath = $targetDir . $image;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFilePath);
        // Obtention de l'extension de fichier
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
        $image = $fileName; // Mettre à jour le nom de l'image
    }
    // Vérifier si le mot de passe a été modifié
    if (!empty($_POST['password'])) {
        $newPassword = $_POST['password'];
        // Recrypter le nouveau mot de passe
        $password = crypt($newPassword, "toto");
    }
    // Mettre à jour les informations de l'utilisateur
    updateUser($id, $_POST['name'], $_POST['lastname'], $_POST['email'], $image , $password);
    $toastMessage = 'Les informations ont été mises à jour avec succès.';
 // Actualiser la page
 header('Location: ' . $_SERVER['PHP_SELF']);
 exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Informations de compte</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    </head>

<body>
    <?php include('header.php'); ?>

        <?php
                if (isset($success)) {
                    echo "<script>toastr.success('" . $toastMessage . "')</script>";
                }
                ?>

    <h1 class="d-flex mt-3 justify-content-center" >Modification des informations</h1>

<div class="card mx-auto my-4" style="max-width: 400px;">
<img src="UserPhoto/<?php echo $image; ?>" class="card-img-top" alt="Photo de profil" style="max-height: 200px;width: 50%;align-self: center;">
<div class="card-body">
    <h5 class="card-title">Modification des informations</h5>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" required>
        </div>

        <div class="mb-3">
            <label for="lastname" class="form-label">Prénom :</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $lastname; ?>" required>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo :</label>
            <input type="file" class="form-control" id="photo" name="image">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Adresse e-mail :</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>" required>
        </div>

        <button type="submit" class="btn btn-dark">Modifier</button>
    </form>
</div>
</div>
    <?php include('footer.php'); ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
<script src="app.js"></script>
</html>