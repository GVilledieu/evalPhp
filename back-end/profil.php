<?php
require('class\database.php');
$database = new Database();
// connexion bddo
$pdo = $database->connectDb();
// create select requete
$lastname = $database->select($pdo, 'lastname', 'user', ['email',$_SESSION['email'] ]);
$firstname = $database->select($pdo, 'firstname', 'user', ['email',$_SESSION['email'] ]);
$email  = $database->select($pdo, 'email', 'user', ['email',$_SESSION['email'] ]);
$phone = $database->select($pdo, 'phone', 'user', ['email',$_SESSION['email'] ]);
// formalisation du résultat
$lastname = $lastname->fetchAll();
$firstname = $firstname->fetchAll();
$email = $email->fetchAll();
$phone = $phone->fetchAll();
if (!$_SESSION['email']) {
    return header('Location: http://localhost/evalPhp/login.php?error=Merci de vous connecter');
}

echo isset($_GET['error']) ? '<div data-bs-dismiss="3000" class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Votre profil n&#x2019;a pas pu être modifié : </strong> ' . $_GET['error'] . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>' : '';
echo '
      <div class="container justify-content-center">
      <div class="row justify-content-center mt-5">
          <div class="col-sm-3">
              <form class="row text-white"  action="/evalPhp/back-end/modifProfil.php" method="post">
                  <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Nom : </label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="nom" value='.$lastname[0][0].'>
                  </div>
                  <div class="form-group mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Prénom : </label>
                        <input type="text" class=form-control id="exampleFormControlInput1" placeholder="" name="prenom" value='.$firstname[0][0].'>
                  </div>
                        <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Téléphone : </label>
                        <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="" name="phone" value='.$phone[0][0].'>
                  </div>
                  <input type="submit" class="btn btn-primary mt-2" value="Enregistrer">
              </form>
          </div>
          </div>
      </div>'


?>