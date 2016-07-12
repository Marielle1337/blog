<?php $this->layout('layout', ['title' => $article['title']]) ?>

<?php $this->start('main_content') ?>

	<article>

	    <div>
	        <span><?php echo $article['dateCreated'] ?></span>
	    </div>	
	    <p><?php echo $article['content'] ?></p>

	</article>


<!--<a href="<?= $this->url('liste') ?>" >retour a la liste</a>-->
<!--<a href="<?= $this->url('add') ?>" >retour a la page d'ajout</a>-->
<a href="<?= $this->url('home') ?>" >retour a la page d'accueil</a>

<?php $this->stop('main_content') ?>