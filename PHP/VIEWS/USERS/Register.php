<?php
if (isset($_POST['register'])) {
    $userController = new UsersController;
    $user = $userController->AddUser();
     if ($user) {
        $success = "Le compte a bien été créé";
        $success = utf8_encode($success);
    } else {
        $error = "Une erreur s'est produite lors de la création du compte";
        $error = utf8_encode($error);
    }
}
?>

<div class="container-fluid" style="text-align: -webkit-center;">
    <form action="" method="post" style="background: gray; color: white; border-radius: 20px; margin: 25px; padding: 25px; text-align: center;">
        <h1>Inscription</h1>
        <br />
        <?php if (isset($success)) { ?>
        <div class="alert alert-success" role="alert">
            <?php echo $success; ?>
        </div>
        <?php } ?>
        <?php if (isset($error)) { ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
        <?php } ?>
        <input type="text" placeholder="Nom" id="name" name="name" class="form-control mb-3" />
        <input type="text" placeholder="Prenom" id="lastname" name="lastname" class="form-control mb-3" />
        <input type="email" placeholder="Email" id="email" name="email" class="form-control mb-3" />
        <input type="password" placeholder="Mot de passe" id="password" name="password" class="form-control mb-3" />
        <button type="submit" name="register" class="btn btn-dark mb-3">Inscription</button>
    </form>
</div>