<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('nav') ?>

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
	    <input type="text" class="form-control" name="toSearch" placeholder="Recherche">
	  </div>
	  <button type="submit" class="btn btn-default" name="search">Chercher</button>
	  <button type="submit" class="btn btn-default" name="advanced_search">Recherche avancée</button>
	</form>

<?php $this->stop('nav') ?>


<?php $this->start('aside') ?>

	<form action="#" method="POST" accept-charset="utf-8">			

		<button type="submit" name="connexion">Connexion</button>
		<button type="submit" name="theme1">Thème principal</button>
		<button type="submit" name="theme2">Thème éco</button>
		<button type="submit" name="newsletter">Newsletter</button>

	</form>	

	<nav id="navlaterale" class="categories">
		<ul>
		<?php foreach ($categories as $category) { ?>
			<li><a href="<?=$this->url('category', array('id' => $category['id'])) ?>" title="<?= $category['name'] ?>"><?= $category['name'] ?></a></li>
		<?php } ?>
		</ul>
	</nav>

<?php $this->stop('aside') ?>

<?php $this->start('main_content') ?>
	
	<?php for($i=0; $i<count($articles); $i++) { ?>
	<article>
		<h2><a href="<?= $this->url('article', array('id' => $articles[$i]['id'])) ?>"> <?= $articles[$i]['title'] ?></a></h2>
			<?php if($i < 2){ ?>
				<p><?= $articles[$i]['content'] ?></p>
			<?php } else { ?>
				<p><?= substr($articles[$i]['content'], 0, 255) ?>... <a href="<?= $this->url('article', array('id' => $articles[$i]['id'])) ?>"> Lire la suite </a></p>
			<?php } ?>
	</article>
	<?php } ?>
<?php $this->stop('main_content') ?>
