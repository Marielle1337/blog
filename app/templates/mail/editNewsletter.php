<?php $this->layout('layout', ['title' => 'Editer la newsletter', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>

    <form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <fieldset>

            <label for="titre">
                <?php if (isset($errors['title'])) { echo $errors['title']; } ?>
                <input id="titre" type="text" name="title" value="<?= $newsletter['title'] ?>">
            </label> 

            <label for="date">
                <input id="date" type="text" name="sendDate"  value="<?= date('d/m/Y', strtotime($newsletter['sendDate'])) ?>">
            </label>

            <label for="newsletter">
                <?php if (isset($errors['content'])) { echo $errors['content']; } ?>
                <textarea id="newsletter" name="content" class="admin"><?= $newsletter['content'] ?></textarea>
            </label>
            <button type="submit" name="addNewsletter">Envoyer votre newsletter</button>

        </fieldset>    
    </form>

<?php $this->stop('main_content') ?>