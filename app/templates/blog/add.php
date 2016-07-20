<?php $this->layout('layout', ['title' => 'Ajouter un article', 'categories'=>$categories, 'admin'=>$admin]) ?>

<?php $this->start('main_content') ?>
<form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	
	<label>
        <?php if (isset($errors['title'])) { echo $errors['title']; } ?>
		<input type="text" name="title"  placeholder="Titre" <?php if(isset($_POST['title'])) {echo'value="'.$_POST['title'].'"';}?>>
	</label>

	<label> Catégorie de votre article :
		<select name="category">
		<?php foreach ($categories as $category) { ?>
			<option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
		<?php } ?>
		</select>
		<?php if (isset($errors['categoryNumber'])) { echo $errors['categoryNumber']; } ?>
		<?php if (isset($errors['categoryEmpty'])) { echo $errors['categoryEmpty']; } ?>
	</label>
    
	<label>
    	Bannière de votre article : 
        <input type="file" name="picture">
	</label>


	<label>
        <?php if (isset($errors['content'])) { echo $errors['content']; } ?>
        <textarea name="content" class="admin" placeholder="Saisir un texte ici."><?php if(isset($_POST['content'])){echo $_POST['content'];}?></textarea>
	</label>

	<label>
		<input type="text" name="author"  placeholder="Qui êtes-vous ?">
   		(Par défaut l'auteur est Benjamin Cerbai.) 
        <?php if (isset($errors['author'])) { echo $errors['author']; } ?>
	</label>
    
	</br>
	<button type="submit" name="addArticle">Ajouter l'article</button>
	<button type="submit" name="addArticleAndStay">Ajouter et rester</button>

</form>

<?php $this->stop('main_content') ?>

