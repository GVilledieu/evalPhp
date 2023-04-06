<?php
require_once('./composants/navbar.php');
require('./class/database.php');
if (!$_SESSION['email']) {
    return header('Location: http://localhost/evalPhp/login.php?error=Merci de vous connecter');
}
$database = new Database();
// connexion bdd
$pdo = $database->connectDb();
// create select requete
$result = $database->select($pdo, '*', 'ad', []);
// formalisation du résultat
$result = $result->fetchAll();

//var_dump($result)
?>

<!--      <h3>Connecter : --><?php //= $_SESSION['email']; ?><!-- </h3>-->
<br/>
<label for="exampleDataList" class="form-label"><h2>Rechercher une annonce par ville</h2></label>
      <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Exemple : Paris">
      <datalist id="datalistOptions">
            <option value="Paris">
            <option value="Lyon">
            <option value="Toulouse">
            <option value="Montpellier">
            <option value="Grenoble">
      </datalist>
      <button type="submit" class="btn btn-primary mb-3">Rechercher</button>

<?php
echo '<div class="container">
            <div class="row">';
foreach ($result as $key => $value) {

    echo '<div class="col-sm-3 mb-3 mb-sm-0">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">' . $value['title'] . '</h5>
                    <p class="card-text">' . $value['description'] . '</p>
                    <p> '.$value['price'] . '</p>
                    <p class="text"> '.$value['address'] . '</p>
                    <a href="#" class="btn btn-secondary">Voir l&#x2019;annonce</a>
                  </div>
                </div>
              </div>
            ';


}
?>

