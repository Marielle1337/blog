<?php $this->layout('layout', ['title' => 'modification de votre article']) ?>

<?php $this->start('main_content') ?>
<?php //print_r($errors); ?>
<form action="#" method="POST" accept-charset="utf-8">
	<label>
		<input type="text" name="newTitle" value="<?= $articles['title'] ?>">
		<?php if (isset($errors['newTitle']['empty'])): ?>
		remplis le nouveau titre
		<?php endif; ?>
	</label>
    
    	<label>
		<input type="text" name="newAuthor" value="<?= $articles['author'] ?>">
		<?php if (isset($errors['newAuthor']['empty'])): ?>
		remplis le nouvel auteur
		<?php endif; ?>
	</label>
    
    	<label>
		<input type="text" name="newDateCreated" value="<?= date('d/m/Y', strtotime($article['dateCreated'])) ?>">
		<?php if (isset($errors['newDateCreated']['empty'])): ?>
		remplis la nouvelle date
		<?php endif; ?>
	</label>
    
	<label>
                <textarea name="newContent" ><?= $articles['content'] ?></textarea>
                <?php if (isset($errors['newContent']['empty'])): ?>
		remplis le nouvel article
		<?php endif; ?>
	</label>
    
    	<label>
                <input type="file" name="newPicture" src="/uploads/<?= $article['picture'] ?>">
                <?php if (isset($errors['newPicture']['empty'])): ?>
		choisi une nouvelle image
		<?php endif; ?>
	</label>

	<button type="submit" name="newSubmit">validé votre modification</button>

</form>
<a href="<?= $this->url('liste') ?>" >retour a la liste des articles</a>

<?php $this->stop('main_content') ?>
