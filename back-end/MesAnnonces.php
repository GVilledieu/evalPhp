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
                    <form action="http://localhost/evalPhp/composants/detailAnnonce.php?page=2" method="post">
                        <input type="hidden" name="id_ad" value="' .$value["id_ad"] . ' ">
                            <input type="submit" class="btn text-white" value="Voir l&#x2019;annonce" style="background-color:#2A2A2A;">
                           </form>';
        $mysqli = new mysqli("localhost", "root", "", "evalPhp");
        $id_user=$_SESSION['id_user'];
        $id_ad=$value["id_ad"];
        $verify = mysqli_query($mysqli,"SELECT `id_user`, `id_ad` FROM `favorite` WHERE id_user=$id_user AND `id_ad` =$id_ad");
        $rownum = mysqli_num_rows($verify);
        if ($rownum < 1) {
        echo '
                        <form action="http://localhost/evalPhp/back-end/ajouterFavoris.php?page=2" method="post">
                        <input type="hidden" name="id_ad" value="' .$value["id_ad"] . ' ">
                            <input type="submit" class="btn btn-warning mt-3" value="Ajouter aux favoris">
                           </form>';
    } echo '  <form action="./back-end/supprimerAnnonce.php" method="post">
                        <input type="hidden" name="id_ad" value="' .$value["id_ad"] . ' ">
                            <input type="submit" class="btn btn-danger mt-3" value="Supprimer cette annonce">
                        </form>
                  </div>
                </div>
              </div>
            ';}
?>



