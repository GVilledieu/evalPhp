<?php
session_start();
require('../class/verification.php');
require('../class/database.php');
require('../class/email.php');
require('./back-end/config.php');

$verif = new Verification();

$verif->Email($_POST['email']);

$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
// create select requete
$result = $database->select($pdo, '*', 'user', ['email', $_POST['email']]);
// formalisation du résultat
$result = $result->fetchAll();

if (count($result) <= 0) {
$verif->setArray(["Email/mot de passe invalide"]);

}

if (count($verif->getArray()) > 0) {
return header('Location: http://localhost/coursPhp/login.php/'.$verif->getIndexError(0).'&email='.$_POST['email']);
}



$verif->PasswordVerify($result[0]['password'], $_POST['password']);


if (count($verif->getArray()) > 0) {
return header('Location: http://localhost/coursPhp/login.php/'.$verif->getIndexError(0).'&email='.$_POST['email']);
}

$_SESSION['email'] = $_POST['email'];
Email::sendEmail($authUser, $authPassword, "immystiik@gmail.com", "ça marche", '../email/email.html');
