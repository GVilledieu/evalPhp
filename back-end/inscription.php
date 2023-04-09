<?php
session_start();
require('../class/verification.php');
require('../class/database.php');
$verif = new Verification();
// Verifier le nom
$verif->Texte($_POST['nom'], 'nom');
// Verifier le prenom
$verif->Texte($_POST['prenom'], 'prenom');
// Verifier l'email et vérifier en base de donnée si il l'existe
$verif->Email($_POST['email']);
// Verifier le téléphone
$verif->Phone($_POST['telephone']);
// Verifier le mot de passe
// Verifier le mot de passe et que le confirme mot de passe soit identique
$hash = $verif->Password($_POST['password'], $_POST['password2']);

if (count($verif->getArray()) > 0) {
    return header('Location: http://localhost/evalPhp/inscription.php/?error='.$verif->getIndexError(0).'&nom='.$_POST['nom'].'&prenom='.$_POST['prenom'].'&email='.$_POST['email'].'&telephone='.$_POST['telephone']);
}
// init object class database
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
// create select requete
$result = $database->select($pdo, '*', 'user', ['email', $_POST['email']]);
// formalisation du résultat
$result = $result->fetchAll();
// Verfier si l'email de l'utilisateur existe
if (count($result) > 0) {
    $verif->setArray(["L'utilisateur a déjà un compte"]);
}

if (count($verif->getArray()) > 0) {
    return header('Location: http://localhost/evalPhp/inscription.php/?error='.$verif->getIndexError(0).'&nom='.$_POST['nom'].'&prenom='.$_POST['prenom'].'&email='.$_POST['email'].'&telephone='.$_POST['telephone']);
}

// enregistrer la demande
$array = [
    $_POST['nom'],
    $_POST['prenom'],
    $_POST['email'],
    $_POST['telephone'],
    $hash
];

$insert = $database->insert($pdo, "firstname, lastname, email, phone, password", " user ", $array, '?,?,?,?,?');

if ($insert == false) {
    $verif->setArray(["L'utilisateur n'a pas pu être enregistrer"]);
}

if (count($verif->getArray()) > 0) {
    return header('Location: http://localhost/evalPhp/?error='.$verif->getIndexError(0).'&nom='.$_POST['nom'].'&prenom='.$_POST['prenom'].'&email='.$_POST['email'].'&telephone='.$_POST['telephone']);
}

//$_SESSION['email'] = $_POST['email'];
header('Location: http://localhost/evalPhp/login.php?valider=oui');