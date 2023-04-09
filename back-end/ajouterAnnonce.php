<?php
require('../composants/navbar.php');
require('../class/database.php');

$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
$titre=$_POST['titre'];
$description=$_POST['description'];
$prix=$_POST['prix'];
$phone=$_POST['phone'];
$adresse=$_POST['adresse'];
$error = "Les champs ne sont pas tous renseignés";
if ($titre==='' ||  $description==='' || $prix==='' || $phone==='' || $adresse===''){
    return header('Location: http://localhost/evalPhp/ajouterAnnonce.php?error='. $error. '');
}
$selectVille= $database->selectVilleId($pdo, ['ville_nom',strtoupper($_POST['ville'])]);
$selectVille = $selectVille->fetchAll();
if (empty($selectVille)) {
    $error="La ville que vous avez renseigné n'existe pas";
    return header('Location: http://localhost/evalPhp/ajouterAnnonce.php?error='. $error. '');
}
$selectVille=$selectVille[0][0];


$annonce = $database->ajouterAnnonce($pdo, [$titre,$description,$prix,$phone,$adresse,$_SESSION['id_user'],$selectVille]);

$annonce = $annonce->fetchAll();

echo ('<h3 class="text-white">Votre annonce a bien été ajoutée </h3>
<input class="btn btn-secondary" type="button" value="RETOUR" onClick="redirect(5)">');