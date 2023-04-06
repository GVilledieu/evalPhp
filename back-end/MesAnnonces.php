<?php
require_once('./composants/navbar.php');
require('./class/database.php');

if (!$_SESSION['email']) {
    return header('Location: http://localhost/evalPhp/login.php?error=Merci de vous connecter');
}
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
// create select requete
$result = $database->selectLeftJoinWhereLike($pdo, '*', 'ad', 'user', ['id_user', $_SESSION['id_user']]);
// formalisation du résultat
$result = $result->fetchAll();

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



