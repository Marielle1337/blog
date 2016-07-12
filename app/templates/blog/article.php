<?php $this->layout('layout', ['title' => 'article']) ?>

<?php $this->start('main_content') ?>



	<article>
            
		<h2><? echo $articles['id']['title'] ?></h2>
                <div>
                    <span><? echo $articles[$_GET['id']]['dateCreated'] ?></span>
                </div>	
                <p><? echo $articles[$_GET['id']]['content'] ?></p>
                
            
			
	</article>


<!--<a href="<?= $this->url('liste') ?>" >retour a la liste</a>-->
<!--<a href="<?= $this->url('add') ?>" >retour a la page d'ajout</a>-->
<a href="<?= $this->url('home') ?>" >retour a la page d'accueil</a>
<!--<a href="<?= $this->url('user_deconnected') ?>" >deconnexion</a>-->

<?php $this->stop('main_content') ?>