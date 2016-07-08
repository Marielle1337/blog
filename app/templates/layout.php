<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body id="top">

	<div class="container">
		<header>
			<img src="img/logoBC.png" alt="Logo Benjamin Cerbai">
			
			<img src="img/photoBC.png" alt="Photo Benjamin Cerbai">

			<h1><?= $this->e($title) ?></h1>

			<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
		    
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	        </div>

		        <!-- Collect the nav links, forms, and other content for toggling -->
		        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		            <ul id="navsup" class="nav navbar-nav">	
				
					<li><a href="#" title="accueil">Accueil</a></li>
					<li><a href="#" title="accueil">Qui suis-je ?</a></li>
					<li><a href="#" title="accueil">Portfolio</a></li>
					<li><a href="#" title="accueil">Contact</a></li>		
				</ul>
				<form class="navbar-form navbar-left" role="search">
				  <div class="form-group">
				    <input type="text" class="form-control" placeholder="Recherche">
				  </div>
				  <button type="submit" class="btn btn-default">Chercher</button>
				</form>
			</nav>

		</header>

		<aside>
			<form action="#" method="POST" accept-charset="utf-8">			
			
			<button type="submit" name="connexion">Connexion</button>
			<button type="submit" name="themes">Thèmes</button>
			<button type="submit" name="newsletter">Newsletter</button>
			
			</form>	
		</aside>

		<nav id="navlaterale" class="categories">
				<ul>
					<li><a href="#" title="artistes">Artistes</a></li>
					<li><a href="#" title="creation film animation">Créer un film d'animation</a></li>
					<li><a href="#" title="preproduction">Pré-production</a></li>
					<li><a href="#" title="films et studios">Films et studios</a></li>
					<li><a href="#" title="general">Général</a></li>
					<li><a href="#" title="general">Motivation</a></li>
					<li><a href="#" title="general">Productivité</a></li>
				</ul>
		</nav>

		<main>
			<?= $this->section('main_content') ?>
			<a href="#top" title='revenir en haut'> Revenir en haut </a>

		</main>

        <footer>
            <p> &copy 2016 Créez vos images et racontez vos histoires </p>
			<div id="reseaux"> Réseaux sociaux </div>
        </footer>
	</div>
</body>
</html>