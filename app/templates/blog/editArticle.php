<?php $this->layout('layout', ['title' => 'modification de votre article']) ?>

<?php $this->start('main_content') ?>
<?php //print_r($articles); ?>
<form action="#" method="POST" accept-charset="utf-8">

            <label>
                <input type="text" name="title" value="<?= $article['title'] ?>">
            </label> <br/>
            
            <label>
                <input type="text" name="author" value="<?= $article['author'] ?>">
            </label> <br/>

            <label>
                <input type="text" name="dateCreated"  value="<?= date('d/m/Y', strtotime($article['dateCreated'])) ?>">
            </label> <br/>

            <label>
                <textarea name="content"><?= $article['content'] ?></textarea>
            </label> <br/>
            
            <label>
                <figure>
                    <img src="/uploads/<?php echo $article['picture'] ?>" alt="" />
                </figure>
                <input type="file" name="picture" placeholder="le media de votre article">
            </label><br/>
            
            <button type="submit" name="editArticle">validé votre modification</button>
        

</form>
<a href="<?= $this->url('liste') ?>" >retour a la liste des articles</a>

<?php $this->stop('main_content') ?>
