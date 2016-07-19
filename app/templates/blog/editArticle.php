<?php $this->layout('layout', ['title' => 'modification de votre article']) ?>

<?php $this->start('main_content') ?>
<?php //print_r($articles); ?>
<form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

	<label>
		<input type="text" name="title" value="<?= $article['title'] ?>">
		<?php if (isset($errors['title']['empty'])): ?>
		Titre non renseigné
		<?php endif; ?>
	</label>
    
        <label>
		<input type="text" name="dateCreated" value="<?= date('d/m/Y', strtotime($article['dateCreated'])) ?>">
		<?php if (isset($errors['dateCreated']['empty'])): ?>
		remplis la nouvelle date
		<?php endif; ?>
	</label>
    
	<label>
                <textarea name="content" class="admin" ><?= $article['content'] ?></textarea>
                <?php if (isset($errors['content']['empty'])): ?>
                    Contenu inexistant
		<?php endif; ?>
	</label>
    
        <label>
                <figure>
                    <img src="/uploads/<?php echo $article['picture'] ?>" alt="" />
                </figure>
                <input type="file" name="picture" src="/uploads/<?= $article['picture'] ?>">
                <?php if (isset($errors['picture']['empty'])): ?>
                    Bannière inexistante
                <?php endif; ?>
	</label>
            
    <button type="submit" name="editArticle">validé votre modification</button>
        

</form>
<a href="<?= $this->url('liste') ?>" >retour a la liste des articles</a>

<?php $this->stop('main_content') ?>
