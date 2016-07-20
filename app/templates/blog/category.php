<?php $this->layout('layout', ['title' => 'Catégorie', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>
	
	<?php foreach ($articles as $article) { ?>
	<article>
		<h2><?= $article['title'] ?></h2>
		<p><?= substr($article['content'], 0, 255) ?>... <a href="<?= $this->url('article', array('id' => $article['id'])) ?>"> Lire la suite </a></p>
	</article>
	<?php } ?>
<?php $this->stop('main_content') ?>
