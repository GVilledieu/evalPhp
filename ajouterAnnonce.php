<?php
require('class\database.php');
require('composants/navbar.php');
if (!$_SESSION['email']) {
    return header('Location: http://localhost/evalPhp/login.php?error=Merci de vous connecter');
}
$database = new Database();
// connexion bddo
$pdo = $database->connectDb();
// create select requete
// formalisation du résultat

echo isset($_GET['error']) ? '<div data-bs-dismiss="3000" class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Votre annonce n&#x2019;a pas pu être enregistrée : </strong> ' . $_GET['error'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>' : '';

echo '
      <div class="container justify-content-center">
      <div class="row justify-content-center mt-5">
          <div class="col-sm-3">
              <form class="row text-white"  action="/evalPhp/back-end/ajouterAnnonce.php" method="post">
                  <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Titre : </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="titre" value="">
                  </div>
                  <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Description </label>
                        <textarea class=form-control id="exampleFormControlInput1" placeholder="" name="description"></textarea>
                  </div>
                   <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Prix : </label>
                        <input type="number" class="form-control" id="exampleFormControlInput1" placeholder="" name="prix" value="">
                  </div>
                   <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Téléphone : </label>
                        <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="" name="phone" value="">
                  </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Adresse : </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="adresse" value="">
                  </div>
                  <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Ville : </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="ville" value="">
                  </div>
                  <input type="submit" class="btn btn-primary mt-2" value="Enregistrer">
              </form>
          </div>
          </div>
      </div>'


?>