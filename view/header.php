   <?php 
   require_once 'model/Panier.php';
   $panier = new Panier();
   ?>
   <header class="topbar">
 <div class="row heade-panier">
 <ul class="panier">
					<li class="caddie"><a href="index.php?uc=panier&action=viewPanier">Caddie</a></li>
					<li class="items">
						ITEMS
						<span id="count"><?= $panier->count(); ?></span>
					</li>
					<li class="total">
						TOTAL
						<span><span id="total"></span><?= number_format($panier->total(),2,',',' '); ?> €</span>
					</li>
				</ul>
    <form class="form-inline my-2 my-lg-0">
      <button class="btn btn-success" >Connection</button>
    </form>
 </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <h1>Restaurant</h1>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?uc=plats&action=listePlats">Shopping</a>
	  </li>
	  <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Rechercher
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" id="mot" href="#mot">Par Mot</a>
          <a class="dropdown-item" id="ingredient" href="#ingredient">Par Ingredient</a>
          <a class="dropdown-item" id="prix" href="#prix">Par Prix</a>
      </li> -->
    </ul>
    
    
  </div>
</nav>
    </header>