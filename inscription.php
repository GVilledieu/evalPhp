<?php
require("composants/navbar.php");
require('composants/form.php');
    $form = new Form();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container bg-success p-3 mt-5 rounded" style="--bs-bg-opacity">
            <?php
              echo isset($_GET['error']) ? '<div data-bs-dismiss="3000" class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Voici mon erreur!</strong> '.$_GET['error'].'
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>' : '';
            ?>
            <h1>Formulaire d'inscription</h1>
            <form class="row"  action="/evalPhp/back-end/inscription.php" method="post">
                <?php
                echo $form->Input("4", "nom", "Votre nom", "text", "Entrer un nom", $_GET['nom'] ?? '');
                echo $form->Input("4", "prenom", "Votre prenom", "text", "Entrer un prenom", $_GET['prenom'] ?? '');
                echo $form->Input("4", "email", "Votre email", "email", "Entrer un email", $_GET['email'] ?? '');
                echo $form->Input("4", "telephone", "Votre téléphone", "tel", "Entrer un téléphone", $_GET['telephone'] ?? '');
                echo $form->Input("4", "password", "Votre mot de passe", "password", "Entrer un mot de passe", '');
                echo $form->Input("4", "password2", "Votre confirmation de mot de passe", "password", "Entrer un mot de passe", '');
                echo $form->Input("4", "Envoyer", "Envoyer", "submit", "", 'Envoyer');
                ?>
            </form>
    </div>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>