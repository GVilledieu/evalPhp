<?php
require('./back-end/MesAnnonces.php');
if (!$_SESSION['email']) {
    return header('Location: http://localhost/evalPhp/login.php?error=Merci de vous connecter');
}
?>