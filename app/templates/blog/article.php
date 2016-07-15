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
<<<<<<< HEAD
=======

        <input type="hidden" value="<?= $article['id']?>" name="idArticle">
<!--        <input type="hidden" value="<?= $user['login']?>" name="loginUser">-->
>>>>>>> 4fc25878315eb87feaea54a066cb33badfb47055
        
        <label>
            <input type="text" name="author"  placeholder="Votre nom">
            <?php if (isset($errors['author']['empty'])): ?>
            Votre nom ou pseudo n'est pas renseigné
            <?php endif; ?>
        </label>

        <label>
<<<<<<< HEAD
            <input type="mail" name="email"  placeholder="Votre email (facultatif)">
=======
            <input type="email" name="email"  placeholder="votre email">
            <?php if (isset($errors['email']['empty'])): ?>
            "remplis l'email"
            <?php endif; ?>
>>>>>>> 4fc25878315eb87feaea54a066cb33badfb47055
        </label>
    
        <label>
            <textarea name="content" placeholder="Saisir un texte ici."></textarea>
            <?php if (isset($errors['content']['empty'])): ?>
            Le commentaire est vide
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

<<<<<<< HEAD
=======
                    <div>
                        <?php echo $comment['email'] ?>
                    </div>
                    <div>
                        <?php echo $comment['author'] ?>
                    </div>	
>>>>>>> 4fc25878315eb87feaea54a066cb33badfb47055
                    <p>
                        <div>
                            <?php if (isset($_POST['author'])){
                                echo 'Par '.$comment['author'];
                            }
                            echo ', le '. date('d/m/Y', strtotime($comment['dateCreated'])) ?>
                        </div>  
                        <?php echo $comment['content'] ?>
                    </p>

                </article>
            <?php endforeach; ?>
    </section>

<?php $this->stop('main_content') ?>