<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validez les donn�es si n�cessaire

    // Configuration de Mailtrap
    $smtpHost = "sandbox.smtp.mailtrap.io";
    $smtpPort = 2525;
    $smtpUsername = "33c03bb0ffb07f";
    $smtpPassword = "12804e7e80fa43";

    // Param�tres de l'e-mail
    $destinataire = "votre@email.com";
    $sujet = "Nouveau message de formulaire de contact";
    $contenu = "Nom : " . $nom . "\n";
    $contenu .= "Email : " . $email . "\n";
    $contenu .= "Message : " . $message;

     // En-t�tes de l'e-mail
     $headers = "From: " . $email . "\r\n";
     $headers .= "Reply-To: " . $email . "\r\n";

     // Configuration des param�tres SMTP
     ini_set("SMTP", $smtpHost);
     ini_set("smtp_port", $smtpPort);
     ini_set("username", $smtpUsername);
     ini_set("password", $smtpPassword);

     // Envoyer l'e-mail
     $result = mail($destinataire, $sujet, $contenu, $headers);

     // V�rification du r�sultat de l'envoi
     if ($result) {
         echo "Merci, votre message a �t� envoy� avec succ�s !";
     } else {
         echo "Une erreur s'est produite lors de l'envoi du message.";
     }
 }
?>