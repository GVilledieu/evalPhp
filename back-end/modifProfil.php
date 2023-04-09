<?php
require('../composants/navbar.php');
require('../class/database.php');
require('../composants/form.php');
require('../class/verification.php');
// init object class database
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
// create select requete
$result = $database->modifProfil($pdo, $_POST['prenom'], $_POST['nom'], $_POST['phone'], ['id_user', $_SESSION['id_user']]);
// formalisation du résultat
$result = $result->fetchAll();
$error = "Les champs ne sont pas tous renseignés";
// Verfier si l'email de l'utilisateur existe
if ($_POST['prenom']==='' ||  $_POST['nom']==='' || $_POST['phone']===''){
    return header('Location: http://localhost/evalPhp/profil.php?error='. $error. '');
}
else{
echo ('<h2 class="text-white">Votre profil à bien été modifié</h2>
<input class="btn btn-secondary" type="button" value="RETOUR" onClick="redirect(4)">');
}