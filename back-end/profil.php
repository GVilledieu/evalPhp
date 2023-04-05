<?php
require('class\database.php');
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
// create select requete
$result = $database->select($pdo, 'lastname', 'user', ['email',$_SESSION['email'] ]);
// formalisation du résultat
$result = $result->fetchAll();
var_dump($result[0][0])
?>

<p>Prenom: <?php echo $result[0][0] ?></p>


<?php
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
// create select requete
$result = $database->select($pdo, 'firstname', 'user', ['email',$_SESSION['email'] ]);
// formalisation du résultat
$result = $result->fetchAll();
var_dump($result[0][0])
?>

<p>Nom: <?php echo $result[0][0] ?></p>







<?php
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
// create select requete
$result = $database->select($pdo, 'email', 'user', ['email',$_SESSION['email'] ]);
// formalisation du résultat
$result = $result->fetchAll();
var_dump($result[0][0])
?>

<p>Email: <?php echo $result[0][0] ?></p>







<?php
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
// create select requete
$result = $database->select($pdo, 'phone', 'user', ['email',$_SESSION['email'] ]);
// formalisation du résultat
$result = $result->fetchAll();
var_dump($result[0][0])
?>

<p>Phone: <?php echo $result[0][0] ?></p>