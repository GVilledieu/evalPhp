<?php
require('./composants/navbar.php');
require('./class/database.php');
require('composants/form.php');
$form = new Form();
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();

// create select requete
//$result = $database->select($pdo, '*', 'user', ['email', $_SESSION['email']]);

$result = $database->selectFavorites($pdo, ['id_user', $_SESSION['id_user']]);
// formalisation du résultat
$result = $result->fetchAll();
?>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Mes favoris</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
      <h1 class="text-white p-3 mt-5 mb-5 text-center">Mes favoris</h1>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>

<?php
    echo '<div class="container mt-4 p-0" style="width:100%;">
            <div class="row">';
foreach ($result as $key => $value) {

    echo '<div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card bg-success h-100 ">
                  <div class="card-body ">
                    <h5 class="card-title">' . $value['title'] . '</h5>
                    <p class="card-text">' . $value['description'] . '</p>
                        <form class="mb-3" action="http://localhost/evalPhp/composants/detailAnnonce.php" method="post">
                        <input type="hidden" name="id_ad" value="' .$value["id_ad"] . ' ">
                            <input type="submit" class="btn text-white" value="Voir l&#x2019;annonce" style="background-color:#2A2A2A;">
                           </form>
                        <form action="./back-end/supprimerFavoris.php" method="post"">
                        <input type="hidden" name="id_ad" value="' .$value["id_ad"] . ' ">
                            <input type="submit" class="btn btn-danger" value="Supprimer ce favoris">
                        </form>
                  </div>
                </div>
              </div>';}