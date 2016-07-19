<?php $this->layout('layout', ['title' => 'Modifier vos articles']) ?>

<?php $this->start('main_content') ?>
<?php //print_r($articles); ?>
<form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

	<label>
		<input type="text" name="title" value="<?= $article['title'] ?>">
		<?php if (isset($errors['newTitle']['empty'])): ?>
		Titre non renseigné
		<?php endif; ?>
	</label>
    
	<label>
        <textarea name="content" class="admin" ><?= $article['content'] ?></textarea>
        <?php if (isset($errors['newContent']['empty'])): ?>
		Contenu inexistant
		<?php endif; ?>
	</label>
    
    <label>
        <input type="file" name="picture" src="/uploads/<?= $article['picture'] ?>">
        <?php if (isset($errors['picture']['empty'])): ?>
		Bannière inexistante
		<?php endif; ?>
	</label>
            
    <button type="submit" name="editArticle">Editer</button>
        

</form>

<?php $this->stop('main_content') ?>
