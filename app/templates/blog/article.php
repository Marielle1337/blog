<?php $this->layout('layout', ['title' => $article['title']]) ?>

<?php $this->start('main_content') ?>

	<article>
	       
	    <div>Posté le <?php echo date('d/m/Y', strtotime($article['dateCreated'])) ?>, par <?= $author['login'] ?></div>
	    <p><?php echo $article['content'] ?></p>

        <figure>
            <img src="/uploads/<?php echo $article['picture'] ?>" alt="" />
        </figure>

	</article>

    <form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
    <fieldset> <legend>Ajouter un commentaire</legend>

        <input type="hidden" value="<?= $article['id']?>" name="idArticle">
<!--        <input type="hidden" value="<?= $user['login']?>" name="loginUser">-->
        
        <label>
            <input type="text" name="author"  placeholder="votre nom">
            <?php if (isset($errors['author']['empty'])): ?>
            "remplis le nom"
            <?php endif; ?>
        </label>

        <label>
            <input type="email" name="email"  placeholder="votre email">
            <?php if (isset($errors['email']['empty'])): ?>
            "remplis l'email"
            <?php endif; ?>
        </label>
    
        <label>
            <textarea name="content" >Saisir un texte ici.</textarea>
            <?php if (isset($errors['content']['empty'])): ?>
            "remplis le commentaire"
            <?php endif; ?>
        </label>
        </br>
        <button type="submit" name="addComment">ajouter un commentaire</button>

    </fieldset>
    </form>

    <!--  Affichage des commentaires -->
    <section>
            <?php foreach($comments as $comment) : ?>
                <article>

                    <div>
                        <?php echo $comment['email'] ?>
                    </div>
                    <div>
                        <?php echo $comment['author'] ?>
                    </div>	
                    <p>
                        <?php echo $comment['content'] ?>
                    </p>

                </article>
            <?php endforeach; ?>
    </section>

<?php $this->stop('main_content') ?>