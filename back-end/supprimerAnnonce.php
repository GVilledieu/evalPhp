<?php

session_start();
require('../class/database.php');

$database = new Database();
// connexion bdd
$pdo = $database->connectDb();

$favoris = $database->selectFavorites($pdo, ['id_user', $_SESSION['id_user']]);
$result = $database->deleteAnnonce($pdo, ['id_user', $_SESSION['id_user'], 'id_ad', $_POST['id_ad']]);

$favoris = $favoris->fetchAll();
$result = $result->fetchAll();

header('Location: http://localhost/Evalphp/MesAnnonces.php');