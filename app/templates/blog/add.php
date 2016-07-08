<?php

$this->layout('layout', ['title' => 'ajouter un article']) ?>

<?php $this->start('main_content') ?>
<form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	<label>
		<input type="text" name="title" value=" " placeholder="le titre de votre article">
                <?php if (isset($errors['title']['empty'])): ?>
		"remplis le titre"
		<?php endif; ?>
	</label>
    
	<label>
            <input type="file" name="picture" placeholder="l'image de votre article">
	</label>
    
         <label>
                <input type="date" name="dateCreated" value=" " placeholder="">
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
	<button type="submit" name="addArticle">ajouter un article</button>
	<button type="submit" name="addArticleAndStay">ajouter un article et rester ici</button>

</form>
<?php $this->stop('main_content') ?>