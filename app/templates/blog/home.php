<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	
	<?php foreach ($articles as $article) { ?>
	<article>
		<h2><?= $article['title'] ?></h2>
		
		<p><?= $article['content'] ?></p>
	</article>
	<?php } ?>
<?php $this->stop('main_content') ?>
