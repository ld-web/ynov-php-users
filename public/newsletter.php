<?php
require '../vendor/autoload.php';

use App\Service\NewsletterService;
use App\Utils;

if (!empty($_POST['mail'])) { // Si j'ai un envoi de formulaire
  $newsletterService = new NewsletterService();
  $email = $_POST['mail'];
  //TODO: try/catch
  if ($newsletterService->insertEmail($email)) {
    Utils::redirect('index.php');
  } else {
    // Génération d'un message d'erreur pour affichage dans la page
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Nouvel email</title>
</head>

<body>
  <form method="POST">

    <label for="email">Entrez votre adresse email :</label>
    <input type="email" name="mail" id="email" />
    <input type="submit" value="Enregistrer">
  </form>
</body>

</html>