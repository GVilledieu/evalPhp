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

    public function selectLeftJoinWhereLike($pdo, $champs, $table, $table2, $fusion, $where) {
        // requete sql
        $sql = "SELECT ".$champs." FROM ".$table." LEFT JOIN ".$table2." ON ".$fusion." ";
        // init array
        $array = [];
        // si le tableau est superieur a 1
        if (count($where) > 1) {
            // le where egale au résultat
            $sql = $sql." WHERE ".$where[0]." LIKE ?";
            // la valeur dans le tableau pour execute
            $array = [$where[1]];
        }
        // je prépare ma requete sql pour eviter les injection sql
        $statement = $pdo->prepare($sql);
        // j'execute ma requete sql avec les valeurs
        $statement->execute($array);
        return $statement;
    }


    public function selectFavorites($pdo) {

        $sql = "SELECT * FROM ad WHERE id_user IN 
                       (SELECT id_ad FROM favorite WHERE id_user = id_user)";
        // init array
        $array = [];

        $statement = $pdo->prepare($sql);
        // j'execute ma requete sql avec les valeurs
        $statement->execute($array);
        return $statement;
    }
}

