<?php $this->layout('layout', ['title' => 'Ajouter un article', 'categories'=>$categories, 'admin'=>$admin]) ?>

<?php $this->start('main_content') ?>
<form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
	
	<label for="titre">
        <?php if (isset($errors['title'])) { echo $errors['title']; } ?>
		<input type="text" name="title"  id="titre" placeholder="Titre" <?php if(isset($_POST['title'])) {echo'value="'.$_POST['title'].'"';}?>>
	</label>

	<label for="categorie"> Catégorie de votre article :
		<select name="category" id="categorie">
		<?php foreach ($categories as $category) { ?>
			<option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
		<?php } ?>
		</select>
		<?php if (isset($errors['categoryNumber'])) { echo $errors['categoryNumber']; } ?>
		<?php if (isset($errors['categoryEmpty'])) { echo $errors['categoryEmpty']; } ?>
	</label>
    
	<label for="image">
    	Bannière de votre article : 
        <input type="file" name="picture" id="image">
	</label>


	<label for="article">
        <?php if (isset($errors['content'])) { echo $errors['content']; } ?>
        <textarea name="content" class="admin" id="article" placeholder="Saisir un texte ici."><?php if(isset($_POST['content'])){echo $_POST['content'];}?></textarea>
	</label>

	<label for="auteur">
		<input type="text" name="author"  id="auteur" placeholder="Qui êtes-vous ?">
   		(Par défaut l'auteur est Benjamin Cerbai.) 
        <?php if (isset($errors['author'])) { echo $errors['author']; } ?>
	</label>
    
	</br>
	<button type="submit" name="addArticle">Ajouter l'article</button>
	<button type="submit" name="addArticleAndStay">Ajouter et rester</button>

</form>

<?php $this->stop('main_content') ?>

