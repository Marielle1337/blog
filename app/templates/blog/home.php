<?php $this->layout('layout', ['title' => 'Accueil', 'categories'=>$categories]) ?>


<?php $this->start('main_content') ?>

<section> 

	<h2> Mes dernières publications instagram </h2>

	<ul id="rudr_instafeed"></ul>

</section>
	
	<?php for($i=0; $i<count($articles); $i++) { ?>
	<article>
		<h2><a href="<?= $this->url('article', array('id' => $articles[$i]['id'])) ?>"> <?= $articles[$i]['title'] ?></a></h2>
			<?php if($articles[$i]['picture']) { echo '<img class="banniere" src="'.$this->assetUrl('/uploads/'.$articles[$i]['picture']).'">'; } ?>
			<?php if($i < 2){ ?>
				<p><?= $articles[$i]['content'] ?></p>
			<?php } else { ?>
				<p><?= substr($articles[$i]['content'], 0, 255) ?>... <a href="<?= $this->url('article', array('id' => $articles[$i]['id'])) ?>"> Lire la suite </a></p>
			<?php } ?>
	</article>
	<?php } ?>

<?php $this->stop('main_content') ?>



