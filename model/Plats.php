<?php
require_once 'connections/Connection.php';


class Plats {
    public function getPlats($ids_plats = null): array {
        try{
        $req = "SELECT `plats`.`id_plat`,`nom_plat`,`poid`,`prix`,`img`,origine.nom_origine, menu.libelle,type.libelle,GROUP_CONCAT(ingredient.nom_ingredient SEPARATOR ', ')AS Ingredients
        FROM `plats` 
        INNER JOIN type on (plats.id_type = type.id_type)
        INNER JOIN origine ON (plats.id_origine = origine.id_origine)
        INNER JOIN menu ON (plats.id_menu = menu.id_menu)
        INNER JOIN composer ON(plats.id_plat = composer.id_plat)
        INNER JOIN ingredient on (composer.id_ingredient = ingredient.id_ingredient)";
        if($ids_plats != null){
            $req .= "where plats.id_plat IN (".implode(',', $ids_plats).")";
        }
        $req .= "GROUP BY (plats.`nom_plat`)";
        $pdo= Connection::getPDO();
        $res = $pdo->query($req);
        $stagiaires=$res->fetchAll(PDO::FETCH_OBJ);
        return $stagiaires;
        } catch (PDOException $ex) {
                echo $ex;
        }
    }

    
    public function getPlat($id_plat) {
        try{
        $req = "SELECT `plats`.`id_plat`,`nom_plat`,`poid`,`prix`,`img`,origine.nom_origine, menu.libelle,type.libelle,GROUP_CONCAT(ingredient.nom_ingredient SEPARATOR ',')AS Ingredients
        FROM `plats` 
        INNER JOIN type on (plats.id_type = type.id_type)
        INNER JOIN origine ON (plats.id_origine = origine.id_origine)
        INNER JOIN menu ON (plats.id_menu = menu.id_menu)
        INNER JOIN composer ON(plats.id_plat = composer.id_plat)
        INNER JOIN ingredient on (composer.id_ingredient = ingredient.id_ingredient)
        where plats.id_plat='$id_plat'
        GROUP BY (plats.`nom_plat`) ";
        $pdo= Connection::getPDO();
        $res = $pdo->query($req);
        $plat=$res->fetch(PDO::FETCH_OBJ);
        return $plat;
        } catch (PDOException $ex) {
                echo $ex;
        }
    }

    public function searchPlats($id_ingredient) {
        try{
        $req = "SELECT `plats`.`id_plat`,`nom_plat`,`poid`,`prix`,`img`,origine.nom_origine, menu.libelle,type.libelle,GROUP_CONCAT(ingredient.nom_ingredient SEPARATOR ',')AS Ingredients
        FROM `plats` 
        INNER JOIN type on (plats.id_type = type.id_type)
        INNER JOIN origine ON (plats.id_origine = origine.id_origine)
        INNER JOIN menu ON (plats.id_menu = menu.id_menu)
        INNER JOIN composer ON(plats.id_plat = composer.id_plat)
        INNER JOIN ingredient on (composer.id_ingredient = ingredient.id_ingredient)
        where id_ingredient='$id_ingredient'";
        $pdo= Connection::getPDO();
        $res = $pdo->query($req);
        $stagiaire=$res->fetch(PDO::FETCH_OBJ);
        return $stagiaire;
        } catch (PDOException $ex) {
                echo $ex;
        }
    }
    public function searchParIngredient($nom_ingredient) {
        try{
        $req = "SELECT plats.id_plat
        FROM `plats` 
        INNER JOIN composer ON(plats.id_plat = composer.id_plat)
        INNER JOIN ingredient on (composer.id_ingredient = ingredient.id_ingredient)
        WHERE ingredient.nom_ingredient LIKE '%$nom_ingredient%'";
        $pdo= Connection::getPDO();
        $res = $pdo->query($req);
        $plats=$res->fetchAll(PDO::FETCH_OBJ);
        return $plats;
        } catch (PDOException $ex) {
                echo $ex;
        }
    }
    public function searchParMot($mot) {
        try{
        $req = "SELECT plats.id_plat
        FROM `plats`
        WHERE plats.nom_plat LIKE '%$mot%' ";
        $pdo= Connection::getPDO();
        $res = $pdo->query($req);
        $plats=$res->fetchAll(PDO::FETCH_OBJ);
        return $plats;
        } catch (PDOException $ex) {
                echo $ex;
        }
    }

    public function getOrigines(){
        try{
            $req = "SELECT id_origine,nom_origine
            FROM `origine`";
            $pdo= Connection::getPDO();
            $res = $pdo->query($req);
            $origines=$res->fetchAll(PDO::FETCH_OBJ);
            return $origines;
            } catch (PDOException $ex) {
                    echo $ex;
            }
    }

       
        public function searchParPrix($prixMin, $prixMax,$origine){
            try{
                $req = "SELECT `plats`.`id_plat`,`nom_plat`,`poid`,`prix`,`img`,origine.nom_origine, menu.libelle,type.libelle,GROUP_CONCAT(ingredient.nom_ingredient SEPARATOR ',')AS Ingredients
                FROM `plats` 
                INNER JOIN type on (plats.id_type = type.id_type)
                INNER JOIN origine ON (plats.id_origine = origine.id_origine)
                INNER JOIN menu ON (plats.id_menu = menu.id_menu)
                INNER JOIN composer ON(plats.id_plat = composer.id_plat)
                INNER JOIN ingredient on (composer.id_ingredient = ingredient.id_ingredient)
                WHERE plats.prix in($prixMin,$prixMax)
                AND origine.id_origine = '$origine'";
                
                $req .= "GROUP BY (plats.`nom_plat`)";
                $pdo= Connection::getPDO();
                $res = $pdo->query($req);
                $stagiaires=$res->fetchAll(PDO::FETCH_OBJ);
                return $stagiaires;
                } catch (PDOException $ex) {
                        echo $ex;
                }
        }

   
}
