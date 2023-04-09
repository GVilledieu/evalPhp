<?php
require ('composants/navbar.php');
require('back-end/profil.php');
if (!$_SESSION['email']) {
    return header('Location: http://localhost/evalPhp/login.php?error=Merci de vous connecter');
}
?>