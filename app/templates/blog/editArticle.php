<?php $this->layout('layout', ['title' => 'Modifier vos articles', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>
<?php //print_r($articles); ?>
<form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

	<label>
		<?php if (isset($errors['title']['empty'])): ?>
		Titre non renseigné
		<?php endif; ?>
		<input type="text" name="title" value="<?= $article['title'] ?>">
	</label>
    
	<label>

            <?php if (isset($errors['content']['empty'])): ?>
                    Contenu inexistant
            <textarea name="content" class="admin" ><?= $article['content'] ?></textarea>
            <?php endif; ?>

	</label>
    
        <label>
            <figure>
                <img src="/uploads/<?php echo $article['picture'] ?>" alt="" /> Figure
            </figure>
            <?php if (isset($errors['picture']['empty'])): ?>
            Bannière inexistante
            <?php endif; ?>
            <input type="file" name="picture" src="/uploads/<?= $article['picture'] ?>">
        </label>
            
        <button type="submit" name="editArticle">Editer</button>
        

</form>

<?php $this->stop('main_content') ?>
