<?php
require_once 'controller/platsController.php';
require_once 'model/Plats.php';
$plat = new Plats();
$origines = $plat->getOrigines();
?>
<h2>Recherchez Vos Plats</h2>
<form class="formModal" id="formIngredient" method="POST" action="index.php?uc=plats&action=recherchesPlatsParIngredient">
    <div class="form-group ">
    <label><h4>Par Ingredient</h4></label>
    <input name="ingredient" class="form-control" type="text" >
    </div>
    <button class="btn btn-success"  type="submit">Rechercher</button>
</form >
    
<form class="formModal" id="formMot" method="POST" action="index.php?uc=plats&action=recherchesPlatsParMot">
    <div class="form-group ">
    <label><h4>Par Mot</h4></label>
    <input name="mot" class="form-control" type="text" >
    </div>
    <button class="btn btn-success"  type="submit">Rechercher</button>
</form>

    <form class="formModal" id="formPrix" method="POST" action="index.php?uc=plats&action=recherchesPlatsPrix">
    <div class="form-group ">
        <h4>Par Prix</h4>
        <label>prix min</label>
        <input name="prixMin" class="form-control" type="text" >
        <label>prix max</label>
        <input name="prixMax" class="form-control" type="text" >
        <label>origine</label>
        <select name="origine" class="form-control">
            <?php foreach($origines as $origine):?>
            <option value="<?=$origine->id_origine ;?>"><?= $origine->nom_origine;?></option>
            <?php endforeach;?>
        </select>
    </div>
    <button class="btn btn-success"  type="submit">Rechercher</button>
</form>
