<?php $this->layout('layout', ['title' => 'Ajouter un article']) ?>

<?php $this->start('main_content') ?>
<form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	<label>
        <?php if (isset($errors['title'])) { echo $errors['title']; } ?>
		<input type="text" name="title"  placeholder="Titre">
	</label>
   	
   	<label>
        <?php if (isset($errors['author'])) { echo $errors['author']; } ?>
		<input type="text" name="author"  placeholder="Qui êtes-vous ?">
	</label>
    
    Bannière de votre article : 
	<label>
        <input type="file" name="picture">
	</label>

	<label>
        <?php if (isset($errors['content'])) { echo $errors['content']; } ?>
        <textarea name="content" class="admin">Saisir un texte ici.</textarea>
	</label>
    
	</br>
	<button type="submit" name="addArticle">Ajouter l'article</button>
	<button type="submit" name="addArticleAndStay">Ajouter et rester</button>

</form>

<?php $this->stop('main_content') ?>

