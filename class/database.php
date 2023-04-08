<?php
class Database
{

    private $host = 'localhost';
    private $db = 'evalPhp';
    private $user = 'root';
    private $password = '';
    private $port = 3306;

    public function connectDb()
    {
        try {
            $pdo = new PDO(
                'mysql:host=' .
                $this->host
                . ';port=' .
                $this->port
                . ';dbname=' .
                $this->db
                . '',
                $this->user,
                $this->password);
            $pdo->exec("SET CHARACTER SET utf8");
            return $pdo;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function select($pdo, $search, $table, $where) {
        // requete sql
        $sql = "SELECT ".$search." FROM ".$table."";
        // init array
        $array = [];
        // si le tableau est superieur a 1
        if (count($where) > 1) {
            // le where egale au résultat
            $sql = $sql." WHERE ".$where[0]."= ?";
            // la valeur dans le tableau pour execute
            $array = [$where[1]];
        }
        // je prépare ma requete sql pour eviter les injection sql
        $statement = $pdo->prepare($sql);
        // j'execute ma requete sql avec les valeurs
        $statement->execute($array);
        return $statement;
    }

    public function insert($pdo, $champs, $table, $array, $pi){
        try {
            $sql = "INSERT INTO ";
            $sql = $sql.$table." ( ".$champs." ) VALUES (".$pi.");";
            $statement = $pdo->prepare($sql);
            $statement->execute($array);
            return $statement;
        } catch (Exception $e) {
            return false;
        }
    }
//SELECT *
//FROM ad
//LEFT JOIN user ON ad.id_ad = user.id_user
//WHERE user.email = 'immystiik@gmail.com'

    public function selectLeftJoinWhereLike($pdo, $champs, $table, $table2, $where) {
        // requete sql
        $sql = "SELECT ".$champs." FROM ".$table." LEFT JOIN ".$table2." ON ".$table.".id_".$table."=".$table2.".id_".$table2."";
        // init array
        $array = [];
        // si le tableau est superieur a 1
        if (count($where) > 1) {
            // le where egale au résultat
            $sql = $sql." WHERE ad.".$where[0]."= ?";
            // la valeur dans le tableau pour execute
            $array = [$where[1]];
        }
        // je prépare ma requete sql pour eviter les injection sql
        $statement = $pdo->prepare($sql);
        // j'execute ma requete sql avec les valeurs
        $statement->execute($array);
        return $statement;
    }


    public function selectFavorites($pdo, $where) {

        $sql = "SELECT * FROM ad WHERE id_ad IN (SELECT id_ad FROM favorite";
        $sql = $sql." WHERE ".$where[0]."= ?)";
        $array = [$where[1]];
        $statement = $pdo->prepare($sql);
        // j'execute ma requete sql avec les valeurs
        $statement->execute($array);
        return $statement;
    }

    //SELECT * FROM ad WHERE id_ville_france IN (SELECT ville_id FROM villes_france WHERE ville_nom = "PLAGNE")

    public function selectWithNomVille($pdo, $where){
        $sql = "SELECT * FROM ad WHERE id_ville_france IN (SELECT ville_id FROM villes_france";
        $sql = $sql." WHERE ".$where[0]."= ?)";
        $array = [$where[1]];
        $statement = $pdo->prepare($sql);
        $statement->execute($array);
        return $statement;

    }

    //SELECT * FROM ad WHERE id_ad IN (SELECT id_ad FROM favorite WHERE id_user = 1)

    public function deleteFavoris($pdo, $where){
        $sql = "DELETE FROM `favorite`";
        $sql = $sql." WHERE ".$where[0]."= ? "."AND ".$where[2]." = ?";
        $array = [$where[1],$where[3]];
        $statement = $pdo->prepare($sql);
        $statement->execute($array);

        return $statement;
    }

    //INSERT INTO favorite VALUES (2, 3);
    //SELECT `id_user`, `id_ad` FROM `favorite` WHERE id_user=1 and id_ad=1
    public function ajouterFavoris($pdo, $values){
        $sql = "INSERT INTO `favorite`";
        $sql = $sql." VALUES (?,?)";
        $array = [$values[0],$values[1]];

        $mysqli = new mysqli("localhost", "root", "", "evalPhp");
        $id_user=$values[0];
        $id_ad=$values[1];
        $verify = mysqli_query($mysqli,"SELECT `id_user`, `id_ad` FROM `favorite` WHERE id_user=$id_user AND `id_ad` =$id_ad");
        var_dump($verify);
        $rownum = mysqli_num_rows($verify);
        if ($rownum < 1) {
            $statement = $pdo->prepare($sql);
            $statement->execute($array);
            return $statement;
        }
        return null;

    }

    public function deleteAnnonce($pdo, $where){
        $this->deleteFavoris($pdo, ['id_user', $where[1],'id_ad',$where[3]]);
        $sql = "DELETE FROM `ad`";
        $sql = $sql." WHERE ".$where[0]."= ? "."AND ".$where[2]." = ?";
        $array = [$where[1],$where[3]];
        $statement = $pdo->prepare($sql);
        $statement->execute($array);

        return $statement;
    }

}

