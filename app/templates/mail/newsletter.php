<?php $this->layout('layout', ['title' => 'Newsletter', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>

    <form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <fieldset> <legend>Ajouter une newsletter</legend>

            <label for="titre"> Titre
                <?php if (isset($errors['title'])) { echo $errors['title']; } ?>
                <input type="text" name="title"  placeholder="Ma belle newsletter" id="titre">
            </label> 

            <label for="date"> Date
                <span> (Si la date d'envoi n'est pas renseignée, la newsletter sera envoyée immédiatement.)</span>
                <input type="text" name="sendDate"  placeholder="AAAA-MM-JJ" id="date">
            </label> 

            <label for="newsletter"> Contenu
                <?php if (isset($errors['content'])) { echo $errors['content']; } ?>
                <textarea name="content" placeholder="Bla bla bla bla bla..." class="admin" id="newsletter"></textarea>
            </label>
            
            <button type="submit" name="addNewsletter">Envoyer votre newsletter</button>

        </fieldset>    
    </form>
 

<?php $this->stop('main_content') ?>