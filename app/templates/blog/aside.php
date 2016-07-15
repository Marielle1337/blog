<?php $this->layout('layout') ?>

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