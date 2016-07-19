<?php $this->layout('layout', ['title' => Newsletter]) ?>

<?php $this->start('main_content') ?>

    <form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <fieldset> <legend>Ajouter une newsletter</legend>

            <label>
                <input type="text" name="title"  placeholder="Titre">
                <?php if (isset($errors['title']['empty'])): ?>
                Titre non renseigné
                <?php endif; ?>
            </label> <br/>

            <label>
                Si la date d'envoi n'est pas renseignée, la newsletter sera envoyée immédiatement.<br/>
                <input type="text" name="sendDate"  placeholder="Date d'envoi">
            </label> <br/>

            <label>
                <textarea name="content" placeholder="Contenu" class="admin"></textarea>
                <?php if (isset($errors['content']['empty'])): ?>
                Aucun contenu
                <?php endif; ?>
            </label>
            </br>
            <button type="submit" name="addNewsletter">Envoyer votre newsletter</button>

        </fieldset>    
    </form>
 

<?php $this->stop('main_content') ?>