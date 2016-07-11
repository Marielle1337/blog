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
				<?= $this->section('nav') ?>
			</nav>

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