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

header('Location: http://localhost/Evalphp/rechercheAnnonce.php');