<?php
if (isset($_POST['login-user'])) {
    $userController = new UsersController;
    $user = $userController->ConnectionUser();
    if ($user) {
        $success = "Connexion réussi";
        $success = utf8_encode($success);
    } else {
        $error = "Une erreur s'est produite lors de la connection";
        $error = utf8_encode($error);
    }
}
?>
<div class="container-fluid" style="text-align: -webkit-center;">
    <form action="#" method="post" style="background: gray; color: white; border-radius: 20px; margin: 25px; padding: 25px; text-align: center;">
        <h1>Connexion</h1>
        <br />
        <input type="email" placeholder="Email" id="email" name="email" class="form-control mb-3" />
        <input type="password" placeholder="Mot de passe" id="password" name="password" class="form-control mb-3" />
        <button type="submit" name="login-user" class="btn btn-dark">Valider</button>
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
    </form>
</div>