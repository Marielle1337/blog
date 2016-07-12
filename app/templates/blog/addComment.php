<?php

$this->layout('layout', ['title' => $article['title']]) ?>

<?php $this->start('main_content') ?>
<form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	<label>
		<input type="text" name="author"  placeholder="votre nom">
                <?php if (isset($errors['author']['empty'])): ?>
		"remplis le nom"
		<?php endif; ?>
	</label>
    
        <label>
                <input type="text" name="dateCreated"  placeholder="yyyy-mm-dd">
                <?php if (isset($errors['dateCreated']['empty'])): ?>
		"remplis la date de création"
		<?php endif; ?>
	</label>

	<label>
                <textarea name="content" >Saisir un texte ici.</textarea>
                <?php if (isset($errors['content']['empty'])): ?>
		"remplis le commentaire"
		<?php endif; ?>
	</label>
	</br>
	<button type="submit" name="addComment">ajouter un commentaire</button>
	

</form>

<!--<a href="<?= $this->url('liste') ?>" >retour a la liste</a>-->
<!--<a href="<?= $this->url('grid') ?>" >retour a la grille</a>-->
<a href="<?= $this->url('home') ?>" >retour a la page d'accueil</a>
<!--<a href="<?= $this->url('user_deconnected') ?>" >deconnexion</a>-->

<?php $this->stop('main_content') ?>

