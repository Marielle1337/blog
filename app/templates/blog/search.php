<?php $this->layout('layout', ['title' => 'Résultats de votre recherche']) ?>

<?php $this->start('main_content') ?>
	
	<?php foreach ($find as $article) { ?>
	<article>
		<h2><?= $article['title'] ?></h2>
		<div><?php echo date('d/m/Y', strtotime($article['dateCreated'])) ?></div>
		<p><?= substr($article['content'], 0, 255) ?>... <a href="<?= $this->url('article', array('id' => $article['id'])) ?>"> Lire la suite </a></p>
	</article>
	<?php } ?>
<?php $this->stop('main_content') ?>
