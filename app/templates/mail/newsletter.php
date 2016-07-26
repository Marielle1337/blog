<?php $this->layout('layout', ['title' => 'Newsletter', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>

    <form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <fieldset> <legend>Ajouter une newsletter</legend>

            <label for="titre">
                <?php if (isset($errors['title'])) { echo $errors['title']; } ?>
                <input type="text" name="title"  placeholder="Titre" id="titre">
            </label> 

            <label for="date">
                Si la date d'envoi n'est pas renseignée, la newsletter sera envoyée immédiatement.<br/>
                <input type="text" name="sendDate"  placeholder="Date d'envoi" id="date">
            </label> 

            <label for="newsletter">
                <?php if (isset($errors['content'])) { echo $errors['content']; } ?>
                <textarea name="content" placeholder="Contenu" class="admin" id="newsletter"></textarea>
            </label>
            
            <button type="submit" name="addNewsletter">Envoyer votre newsletter</button>

        </fieldset>    
    </form>
 

<?php $this->stop('main_content') ?>