<?php $this->layout('layout', ['title' => 'modification de votre article']) ?>

<?php $this->start('main_content') ?>
<?php //print_r($articles); ?>
<form action="#" method="POST" accept-charset="utf-8">

	<label>
		<input type="text" name="newTitle" value="<?= $articles['title'] ?>">
		<?php if (isset($errors['newTitle']['empty'])): ?>
		Titre non renseigné
		<?php endif; ?>
	</label>
    
    	<label>
		<input type="text" name="newAuthor" value="<?= $articles['author'] ?>">
		<?php if (isset($errors['newAuthor']['empty'])): ?>
		Auteur non renseigné
		<?php endif; ?>
	</label>
    
    <label>
		<input type="text" name="newDateCreated" value="<?= date('d/m/Y', strtotime($article['dateCreated'])) ?>">
		<?php if (isset($errors['newDateCreated']['empty'])): ?>
		remplis la nouvelle date
		<?php endif; ?>
	</label>
    
	<label>
        <textarea name="newContent" class="admin" ><?= $articles['content'] ?></textarea>
        <?php if (isset($errors['newContent']['empty'])): ?>
		Contenu inexistant
		<?php endif; ?>
	</label>
    
    <label>
        <input type="file" name="newPicture" src="/uploads/<?= $article['picture'] ?>">
        <?php if (isset($errors['newPicture']['empty'])): ?>
		Bannière inexistante
		<?php endif; ?>
	</label>

            
    <button type="submit" name="editArticle">validé votre modification</button>
        

</form>
<a href="<?= $this->url('liste') ?>" >retour a la liste des articles</a>

<?php $this->stop('main_content') ?>
