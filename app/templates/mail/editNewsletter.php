<?php $this->layout('layout', ['title' => 'Editer la newsletter']) ?>

<?php $this->start('main_content') ?>

    <form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <fieldset>

            <label>
                <?php if (isset($errors['title'])) { echo $errors['title']; } ?>
                <input type="text" name="title" value="<?= $newsletter['title'] ?>">
            </label> <br/>

            <label>
                <input type="text" name="sendDate"  value="<?= date('d/m/Y', strtotime($newsletter['sendDate'])) ?>">
            </label> <br/>

            <label>
                <?php if (isset($errors['content'])) { echo $errors['content']; } ?>
                <textarea name="content" class="admin"><?= $newsletter['content'] ?></textarea>
            </label> </br>
            <button type="submit" name="addNewsletter">Envoyer votre newsletter</button>

        </fieldset>    
    </form>

<?php $this->stop('main_content') ?>