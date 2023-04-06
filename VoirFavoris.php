<?php
require('./composants/navbar.php');
require('./class/database.php');

$database = new Database();
// connexion bdd
$pdo = $database->connectDb();

// create select requete
//$result = $database->select($pdo, '*', 'user', ['email', $_SESSION['email']]);

$result = $database->selectFavorites($pdo);
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
<div class="container bg-secondary p-3 mt-5">
      <h1>Mes favoris</h1>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>

<?php
    echo '<div class="card-body">
                        <div class="row">';
    foreach ($result as $key => $value) {
        echo '<div class="col-md-4 m-5">
                        <div class="card">'
            . '<h1 class="m-2">' . $value['title'] . '</h1>'
            . '<h6 class="m-2">' . $value['description'] . '</h6>' .
            '<p class="text-danger m-5">' .
            $value['price'] . ' €
                                </p>' .
            '<p class="text-success m-5">' .
            $value['address'] . '
                                   </p>' .
            '</div>
                      </div>';

        echo '</div>
            </div>';
}
?>
