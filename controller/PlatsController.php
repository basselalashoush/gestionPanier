<?php

require_once 'model/Plats.php';
$plat = new Plats();
if (!isset($_REQUEST['action'])){
    $action = '';
    $origines = $plat->getOrigines();
} else{
    $action = $_REQUEST['action'];
}

switch ($action) {
    case 'listePlats':
        $lesPlats = $plat->getPlats();
        $origines = $plat->getOrigines();
        include "view/catalogue.php";
        break;
    case 'recherchesPlatsParIngredient':
        $plats = $plat->searchParIngredient(strtolower($_POST['ingredient']));
        if($plats <> null){
        $ids = [];
        foreach($plats as $p){
            $ids[] .= $p->id_plat;
        }
        $lesPlats = $plat->getPlats($ids);
    }else{
        ?>
        <div class="alert alert-danger"><?= "Il n'y a aucun plat  qui contient cet ingrédient ".$_POST['ingredient']; ?></div>
        <?php
        $lesPlats = $plat->getPlats();
    }
        include "view/catalogue.php";
        break;
    case 'recherchesPlatsParMot':
        $plats = $plat->searchParMot($_POST['mot']);
        if($plats <> null){
        $ids = [];
        foreach($plats as $p){
            $ids[] .= $p->id_plat;
        }
        $lesPlats = $plat->getPlats($ids);
    }else{
        ?>
        <div class="alert alert-danger"><?= "Il n'y a aucun plat  qui contient  ".$_POST['mot']; ?></div>
        <?php
        $lesPlats = $plat->getPlats();
    }
        include "view/catalogue.php";
        break;
    case 'recherchesPlatsPrix':
        $prixMin = $_POST['prixMin'];
        $prixMax = $_POST['prixMax'];
        $origine = $_POST['origine'];
        $lesPlats = $plat->searchParPrix($prixMin, $prixMax,$origine);      
        include "view/catalogue.php";
        break;
    }
    ?>


