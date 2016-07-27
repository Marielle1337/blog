<?php $this->layout('layout', ['title' => 'Résultats de votre recherche', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>
	
	<?php foreach ($find as $article) { ?>
	<article>
		<h2><?= $article['title'] ?></h2>
		<div><?php echo date('d/m/Y', strtotime($article['dateCreated'])) ?></div>
		<?php if($article['picture']) { echo '<img class="banniere" src="'.$this->assetUrl('/uploads/'.$article['picture']).'">'; } ?>
		<p><?php echo substr($article['content'], 0, 455) ?>... <a href="<?= $this->url('article', array('id' => $article['id'])) ?>"> Lire la suite </a></p>
	</article>
	<?php } ?>
	<?php if(count($find) < 1) { echo '<p> Aucun article ne correspond à votre recherche </p>'; } ?>
<?php $this->stop('main_content') ?>
