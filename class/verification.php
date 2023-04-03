<?php

class Verification {

    private $array = [];

    private function Verif($name, $min, $max,$message) {
        if (strlen($name) < $min || strlen($name) > $max) {
            array_push($this->array, $message);
        }
        return $this->array;
    }

    public function getArray() {
        return $this->array;
    }

    public function getIndexError($index) {
        if (count($this->array) > 0) {
            return $this->array[$index];
        }
        return null;
    }

    public function setArray($array) {
        return $this->array = $array;
    }

    public function Email($name) {
        return $this->Verif($name, 5, 255, 'Votre email est invalide');
    }

    public function Texte($name, $param) {
        return $this->Verif($name, 2, 255, 'Votre '.$param.' est invalide');
    }

    public function Phone($name) {
        return $this->Verif($name, 2, 15, 'Votre téléphone est invalide');
    }

    public function Password($password, $password2) {
        if ($password != $password2) {
            array_push($this->array, 'Le mot de passe ne sont pas identique');
        }

        $this->Verif($password, 2, 80, 'Votre mot de passe est invalide');

        $hash = password_hash($password,PASSWORD_ARGON2I);

        return $hash;
    }

    public function PasswordVerify($hash, $password) {

        $this->Verif($password, 2, 80, 'Email/password invalide');

        $hash = password_verify($password, $hash);

        if (!$hash) {
            array_push($this->array, 'Email/password invalide');
        }

        return $hash;
    }

}

?>