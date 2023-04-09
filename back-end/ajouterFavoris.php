<?php
session_start();
require('../class/database.php');

$database = new Database();
// connexion bdd
$pdo = $database->connectDb();

$favoris = $database->selectFavorites($pdo, ['id_user', $_SESSION['id_user']]);
$result = $database->ajouterFavoris($pdo, [$_SESSION['id_user'],$_POST['id_ad']]);

$result = $result->fetchAll();
$favoris = $favoris->fetchAll();
$page=$_GET['page'];

if ($page== '1'){
    return header('Location: http://localhost/evalPhp/rechercheAnnonce.php');
}
else if($page== '2'){
    return header('Location: http://localhost/Evalphp/MesAnnonces.php');
}

