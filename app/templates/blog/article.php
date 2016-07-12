<?php $this->layout('layout', ['title' => $articles['title']]) ?>

<?php $this->start('main_content') ?>



	<article>

	    <div>
	        <span><?php echo $articles['dateCreated'] ?></span>
	    </div>	
	    <p><?php echo $articles['content'] ?></p>
            <figure>
                <img src="/uploads/<?php echo $articles['picture'] ?>" alt="" />
            </figure>
            <a href="<?= $this->url('addComment') ?>" >retour a la page d'ajout</a>   
            
			
	</article>


<!--<a href="<?= $this->url('liste') ?>" >retour a la liste</a>-->
<!--<a href="<?= $this->url('add') ?>" >retour a la page d'ajout</a>-->
<a href="<?= $this->url('home') ?>" >retour a la page d'accueil</a>
<!--<a href="<?= $this->url('user_deconnected') ?>" >deconnexion</a>-->

<?php $this->stop('main_content') ?>