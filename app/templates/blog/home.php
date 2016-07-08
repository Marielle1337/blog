<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	
	<?php for($i=0; $i<count($articles); $i++) { ?>
	<article>
		<h2><?= $articles[$i]['title'] ?></h2>
			<?php if($i < 2){ ?>
				<p><?= $articles[$i]['content'] ?></p>
			<?php } else { ?>
				<p><?= substr($articles[$i]['content'], 0, 255) ?>... <a href="#"> Lire la suite </a></p>
			<?php } ?>
	</article>
	<?php } ?>
<?php $this->stop('main_content') ?>
