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
echo '
<h1 class="text-white p-3 mt-5 mb-5 text-center">Mes Annonces</h1>
<div class="container m-3" >
            <div class="row">';
foreach ($result as $key => $value) {
    echo '<div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card bg-success h-100">
                  <div class="card-body">
                    <h5 class="card-title">' . $value['title'] . '</h5>
                    <p class="card-text">' . $value['address'] . '</p>
                    <a href="#" id="test" class="btn text-white" style="background-color:#2A2A2A;">Voir l&#x2019;annonce</a>
                  </div>
                </div>
              </div>
            ';}
?>



