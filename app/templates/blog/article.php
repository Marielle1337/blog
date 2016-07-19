<?php $this->layout('layout', ['title' => $article['title']]) ?>

<?php $this->start('main_content') ?>

	<article>
	       
	    <div>Posté le <?php echo date('d/m/Y', strtotime($article['dateCreated'])) ?>, par <?= $author['login'] ?></div>
	    <p><?php echo $article['content'] ?></p>

        <figure>
            <img src="/uploads/<?php echo $article['picture'] ?>" alt="" />
        </figure>

	</article>

<!--  Ajouter des commentaires -->
    <form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <fieldset> <legend>Ajouter un commentaire</legend>
        
        <label>
            <input type="text" name="author"  placeholder="Votre nom">
            <?php if (isset($errors['author'])) { echo $errors['author'] ; } ?>
        </label>

        <label>
            <input type="mail" name="email"  placeholder="Votre email (facultatif)">
        </label>
    
        <label>
            <textarea name="content" placeholder="Saisir un texte ici."></textarea>
            <?php if (isset($errors['content'])) { echo $errors['content'] ; } ?>
        </label>
        </br>
        <button type="submit" name="addComment">Ajouter un commentaire</button>

    </fieldset>
    </form>

    <!--  Affichage des commentaires -->
    <section>
            <?php foreach($comments as $comment) : ?>
                <article>

                    <p>
                        <div>
                            <?= 'Par '.$comment['author'].', le '. date('d/m/Y', strtotime($comment['dateCreated'])) ?>
                        </div>  
                        <?php echo $comment['content'] ?>
                    </p>

                </article>
            <?php endforeach; ?>
    </section>

<?php $this->stop('main_content') ?>