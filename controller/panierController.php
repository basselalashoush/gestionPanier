<?php
require_once 'model/Plats.php';
$plat = new Plats();
require_once 'model/Panier.php';
$panier = new Panier();
if (!isset($_REQUEST['action'])){
    $action = '';
    $origines = $plat->getOrigines();
} else{
    $action = $_REQUEST['action'];
}

switch ($action) {
    case 'addPanier':
        $json = array('error' => true);
    if(isset($_GET['id_plat'])){
    $plats = $plat->getPlat($_GET['id_plat']);
    //die(var_dump($plats));
	if(empty($plats)){
		$json['message'] = "Ce plat n'existe pas";
	}else{
		$panier->add($plats->id_plat);
		$json['error']  = false;
		$json['total']  = number_format($panier->total(),2,',',' ');
		$json['count']  = $panier->count();
		$json['message'] = 'Le produit a bien été ajouté à votre panier';
	}
}else{
	$json['message'] = "Vous n'avez pas sélectionné de plat à ajouter au panier";
}
echo json_encode($json);
        break;
    case 'viewPanier':
        $ids = array_keys($_SESSION['panier']);
			if(empty($ids)){
				$plats = array();
			}else{
				$plats = $plat->getPlats($ids); 
			}
        include "view/panier.php";
        break;
    case 'delPanier':
       $panier->del($_GET['id_plat']);
        break;
    case 'recalcPanier':
        $panier->recalc();
        break;
    
    }
    ?>


