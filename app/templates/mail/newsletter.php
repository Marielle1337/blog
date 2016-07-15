<?php $this->layout('layout', ['title' => Newsletter]) ?>

<?php $this->start('main_content') ?>

    <form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <fieldset> <legend>Ajouter une newsletter</legend>

            <label>
                <input type="text" name="title"  placeholder="le titre de votre newsletter">
                <?php if (isset($errors['title']['empty'])): ?>
                le titre de votre newsletter n'est pas renseigné
                <?php endif; ?>
            </label>

            <label>

                <input type="text" name="sendDate"  placeholder="la date d'envoie de votre newsletter">
                <?php if (isset($errors['sendDate']['empty'])): ?>
                la date d'envoie de votre newsletter n'est pas renseigné
                <?php endif; ?>

            </label>

            <label>
                <textarea name="content" placeholder="Saisir un texte ici."></textarea>
                <?php if (isset($errors['content']['empty'])): ?>
                Le commentaire est vide
                <?php endif; ?>
            </label>
            </br>
            <button type="submit" name="addNewsletter">envoyer votre newsletter</button>

        </fieldset>    
    </form>
    <a href="<?= $this->url('archive') ?>" >archive</a>
    <a href="<?= $this->url('home') ?>" >retour a la page d'accueil</a>
 

<?php $this->stop('main_content') ?>