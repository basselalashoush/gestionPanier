<?php
require_once 'controller/platsController.php';
require_once 'model/Plats.php';
?>
<h3>Nos Produits</h3>

<?php foreach($lesPlats as $plat) :?>
<div class="row" >
<div class="col-3 image">
    <img src="<?= $plat->img ?>" alt="">
    
</div>
<div class="col-6"><ul class="list-group">
<h4><?= $plat->nom_plat;?></h4>
    <li class="list-group-item list-group-item-success">Prix : <?= $plat->prix;?> €</li>
    <li class="list-group-item list-group-item-success">Poid : <?= $plat->poid;?> g</li>
    <li class="list-group-item list-group-item-success">Ingredients : <?= $plat->Ingredients;?></li>
    <li class="list-group-item list-group-item-success">Origine : <?= $plat->nom_origine;?></li>
    <li class="list-group-item list-group-item-success">Type : <?= $plat->libelle;?></li>
    <li class="list-group-item list-group-item-success"><a class="add addPanier" href="index.php?uc=panier&action=addPanier&id_plat=<?= $plat->id_plat; ?>">Add</a></li>
  

</ul>
</div>
</div>
<?php endforeach;?>
