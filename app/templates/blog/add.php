<?php $this->layout('layout', ['title' => 'Ajouter un article']) ?>

<?php $this->start('main_content') ?>
<form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	<label>
		<input type="text" name="title"  placeholder="Titre">
        <?php if (isset($errors['title']['empty'])): ?>
		"remplis le titre"
		<?php endif; ?>
	</label>
    
    Bannière : 
	<label>
        <input type="file" name="picture">
        <?php if (isset($errors['picture']['empty'])): ?>
		"choisir un media"
		<?php endif; ?>
	</label>
    
        <label>
        <input type="text" name="dateCreated"  placeholder="yyyy-mm-dd">
        <?php if (isset($errors['dateCreated']['empty'])): ?>
		"remplis la date de création"
		<?php endif; ?>
	</label>

	<label>
        <textarea name="content" class="admin">Saisir un texte ici.</textarea>
        <?php if (isset($errors['content']['empty'])): ?>
		"remplis le commentaire"
		<?php endif; ?>
	</label>
    
   	<label>
		<input type="text" name="author"  placeholder="l'auteur de votre article">
                <?php if (isset($errors['author']['empty'])): ?>
		"remplis l'auteur"
		<?php endif; ?>
	</label>
	</br>
	<button type="submit" name="addArticle">ajouter un article</button>
	<button type="submit" name="addArticleAndStay">ajouter un article et rester ici</button>

</form>

<?php $this->stop('main_content') ?>

