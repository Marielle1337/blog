<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	
	<?php foreach ($articles as $article) { ?>
		
		<h2><?= $article['name'] ?></h2>
		<p>Vous avez atteint la page d'accueil. Bravo.</p>
		<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>

	<?php } ?>
<?php $this->stop('main_content') ?>
