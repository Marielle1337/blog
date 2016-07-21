<?php //$categories = Generator::categoriesMenu(); ?><!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<!-- jQuery -->
	<script
		src="https://code.jquery.com/jquery-1.12.4.min.js"
		integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
		crossorigin="anonymous">
	</script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<!-- TinyMCE -->
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

	<!-- Mon JS -->
	<script type="text/javascript" src="<?= $this->assetUrl('js/script.js') ?>" defer></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- FontAwesome -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.min.css') ?>">

	<!-- Mes feuilles de style -->
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style1.css') ?>" title="standard">
	<link rel="alternate stylesheet" href="<?= $this->assetUrl('css/style.css') ?>" title="eco">
</head>
<body id="top">

		<header>                 
			<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
			<div class="container">
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

				<?php if(!isset($_SESSION['user'])) { ?>
					<a href='<?= $this->url('login')?>'>Connexion</a>
				<?php } else { ?>
					<span> <?php if(isset($_SESSION['user']['firstname'])) { 
								echo $_SESSION['user']['firstname']; 
								} else { echo $_SESSION['user']['login']; } ?> 
					</span>
					<a href="<?=$this->url('logout')?>">Déconnexion</a>
				<?php } ?>
			</div>
			</nav>

<!--                        information sur l'utilisation des cookies-->
			<div class="alert alert-info">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <i class="fa fa-rebel" aria-hidden="true"></i> Attention, jeune padawan, sur ce site en naviguant, les cookies accepter l'utilisation tu dois. Un verre de lait à prendre tu penseras.
            </div>
                    
		<div class="container">

			<img src="img/logoBC.png" alt="Logo Benjamin Cerbai">
			
			<img src="img/photoBC.png" alt="Photo Benjamin Cerbai">

			<h1><?= $this->e($title) ?></h1>

		</div>
		</header>

	<div class="container">

		<aside>
		<div>
			<div class="themes">
				<button type="button" id="theme1">Jour</button>
				<button type="button" id="theme2">Nuit</button>
			</div>
			
			<nav id="navlaterale" class="categories">
				<h3> Catégories </h3>
				<ul>
				<?php foreach ($categories as $category) { ?>
					<li><a href="<?=$this->url('category', array('id' => $category['id'])) ?>" title="<?= $category['name'] ?>"><?= $category['name'] ?></a></li>
				<?php } ?>
				</ul>

				<?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] == 'admin') { ?>
				<h3> Gestion administrateur </h3>
				<ul>
                    <li> <a href="<?= $this->url('add') ?>"> Ajouter un article </a> </li>
                    <li> <a href="<?= $this->url('liste') ?>"> Gérer les articles </a> </li>
                    <li> <a href="<?= $this->url('archive') ?>"> Gérer les newsletters </a> </li>
                    <li> <a href="<?= $this->url('newsletter') ?>">Créer une newsletter </a> </li>
                <ul>
                <?php } ?>
			</nav>
			
			<a id='topButton' href="#top" title='Revenir en haut'> Revenir en haut </a>
		</div>
		</aside>

		<main>
			<?= $this->section('main_content') ?>
		</main>

	</div>

        <footer>
        	<div class="container">
		
				<p class="copyright"> &copy  2016 Créez vos images et racontez vos histoires </p>

				<!-- Réseaux sociaux -->
				<div class="social">

					<a rel="nofollow" href="http://www.youtube.com/BenjaminCerbai" target="_blank"><i class="fa fa-youtube-play fa-2x" aria-hidden="true"></i></a>

					<a rel="nofollow" href="https://twitter.com/BenjaminCerbai"><i class="fa fa-twitter fa-2x" aria-hidden="true"></i></a>

					<a rel="nofollow" href="https://plus.google.com/u/0/+BenjaminCerbai"><i class="fa fa-google-plus-official fa-2x" aria-hidden="true"></i></a>

					<a rel="nofollow" href="http://facebook.com/BenjaminCerbaiArt" target="_blank"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>

					<a rel="nofollow" href="https://www.instagram.com/benjamincerbai" target="_blank"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>

				</div>
			</div>
        </footer>
	
</body>
</html>