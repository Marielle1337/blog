<?php $this->layout('layout', ['title' => 'A propos de moi']) ?>

<?php $this->start('main_content') ?>
	
	<?php foreach ($pres as $article) { ?>
	<article>
		<h2><?= $article['title'] ?></h2>
		<p><?= $article['content']?></p>
	</article>
	<?php } ?>
<?php $this->stop('main_content') ?>
