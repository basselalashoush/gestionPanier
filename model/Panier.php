<?php
require_once 'model/Plats.php';

require_once 'connections/Connection.php';
class Panier{
	
	public function __construct(){
		if(!isset($_SESSION)){
			session_start();
		}
		if(!isset($_SESSION['panier'])){
			$_SESSION['panier'] = array();
		}
		
		if(isset($_GET['delPanier'])){
			$this->del($_GET['delPanier']);
		}
		if(isset($_POST['panier']['quantity'])){
			$this->recalc();
		}
	}

	public function recalc(){
		foreach($_SESSION['panier'] as $id_plat => $quantity){
			if(isset($_POST['panier']['quantity'][$id_plat])){
				$_SESSION['panier'][$id_plat] = $_POST['panier']['quantity'][$id_plat];
			}
		}
	}

	public function count(){
		return array_sum($_SESSION['panier']);
	}

	public function total(){
		$total = 0;
		$ids = array_keys($_SESSION['panier']);
		if(empty($ids)){
			$plats = array();
		}else{
            $plat = new Plats();
			$plats = $plat->getPlats($ids);
		}
		foreach( $plats as $p ) {
			$total += $p->prix * $_SESSION['panier'][$p->id_plat];
		}
		return $total;
	}

	public function add($id_plat){
		if(isset($_SESSION['panier'][$id_plat])){
			$_SESSION['panier'][$id_plat]++;
		}else{
			$_SESSION['panier'][$id_plat] = 1;
		}
	}

	public function del($id_plat){
		unset($_SESSION['panier'][$id_plat]);
	}

}