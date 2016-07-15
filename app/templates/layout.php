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
				
					<li><a href="<?=$this->url('home')?>" title="Accueil">Accueil</a></li>
					<li><a href="<?=$this->url('aboutMe')?>" title="A propos de moi">Qui suis-je ?</a></li>
					<li><a href="#" title="Mes créations">Portfolio</a></li>
					<li><a href="<?=$this->url('contact')?>" title="Me contacter">Contact</a></li>		
				</ul>
				<form class="navbar-form navbar-left" role="search">
				  <div class="form-group">
				    <input type="text" class="form-control" name="toSearch" placeholder="Recherche">
				  </div>
				  <button type="submit" class="btn btn-default" name="search">Chercher</button>
				  <a href="<?=$this->url('search')?>">
				  	<button type="button" class="btn btn-default" name="advancedSearch">Recherche avancée</button>
				  </a>
				</form>
			</nav>

			<a href='<?= $this->url('login')?>'> Connexion </a>
			<a href='<?= $this->url('logout')?>'> Déconnexion </a>

			<h1><?= $this->e($title) ?></h1>


		</header>

		<aside>
			<?= $this->section('aside') ?>
		</aside>

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