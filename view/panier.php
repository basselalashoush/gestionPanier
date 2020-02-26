<div class="checkout">
	<div class="title">
		<div class="wrap">
		<h2 class="first">Shopping Cart</h2>
		</div>
	</div>
	<form method="post" action="index.php?uc=panier&action=recalcPanier">
	<div class="table">
		<div class="wrap">

			<div class="rowtitle">
				<span class="name">plat</span>
				<span class="poid">poid</span>
				<span class="origine">Origine</span>
				<span class="libelle">libelle</span>
				<span class="Ingredient">Ingredient</span>
				<span class="Quantity">Quantity</span>
				<span class="total">Total</span>
				<span class="action">Actions</span>
			</div>

			<?php
			foreach($plats as $plat):
			?>
			<div class="row">
				<a href="#" class="img"> <img src="assets/img/<?= $plat->id_plat; ?>.jpg" height="53"></a>
				<span class="name"><?= $plat->nom_plat; ?></span>
				<span class="poid"><?= $plat->poid; ?></span>
				<span class="origine"><?= $plat->nom_origine; ?></span>
				<span class="libelle"><?= $plat->libelle; ?></span>
				<span class="ingredients"><?= $plat->Ingredients; ?></span>
				<span class="prix"><?= number_format($plat->prix,2,',',' '); ?> €</span>
				<span class="quantity"><input type="number" name="panier[quantity][<?= $plat->id_plat; ?>]" value="<?= $_SESSION['panier'][$plat->id_plat]; ?>"></span>
				<span class="total"><?= number_format($plat->prix ,2,',',' '); ?> €</span>
				<span class="action">
					<a href="index.php?uc=panier&action=delPanier&id_plat=<?= $plat->id_plat; ?>" class="del"><img src="assets/img/del.png"></a>
				</span>
			</div>
			<?php endforeach; ?>
			<div class="rowtotal">
				 Total : <span class="total"><?= number_format($panier->total() ,2,',',' '); ?> € </span>
			</div>
			<input type="submit" value="Recalculer">
		</div>
	</div>
	</form>
</div>