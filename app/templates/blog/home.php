<?php $this->layout('layout', ['title' => 'Accueil']) ?>

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


<a href="<?= $this->url('archive') ?>" >retour a la page d'archive</a>
<?php $this->stop('main_content') ?>



