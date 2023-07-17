<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validez les données si nécessaire

    // Configuration de Mailtrap
    $smtpHost = "sandbox.smtp.mailtrap.io";
    $smtpPort = 2525;
    $smtpUsername = "33c03bb0ffb07f";
    $smtpPassword = "12804e7e80fa43";
    
    // Paramètres de l'e-mail
    $destinataire = "votre@email.com";
    $sujet = "Nouveau message de formulaire de contact";
    $contenu = "Nom : " . $nom . "\n";
    $contenu .= "Email : " . $email . "\n";
    $contenu .= "Message : " . $message;

    // En-têtes de l'e-mail
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // Configuration des paramètres SMTP
    ini_set("SMTP", $smtpHost);
    ini_set("smtp_port", $smtpPort);
    ini_set("username", $smtpUsername);
    ini_set("password", $smtpPassword);

    // Envoyer l'e-mail
    $result = mail($destinataire, $sujet, $contenu, $headers);

    // Vérification du résultat de l'envoi
    if ($result) {
        echo "Merci, votre message a été envoyé avec succès !";
    } else {
        echo "Une erreur s'est produite lors de l'envoi du message.";
    }
}
?>

<hr />
<div class="container">
    <h1>Formulaire de contact</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group mt-3">
            <label for="nom">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" required />
        </div>

        <div class="form-group mt-3">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" required />
        </div>

        <div class="form-group mt-3">
            <label for="message">Message :</label>
            <textarea class="form-control" id="message" name="message" required></textarea>
        </div>

        <button type="submit" class="btn btn-dark mt-3">Envoyer</button>
    </form>
</div>
