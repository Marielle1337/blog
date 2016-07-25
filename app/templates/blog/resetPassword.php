<?php $this->layout('layout', ['title' => 'Réinitialiser le mot de passe', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>

    <form action="#" method="post">
        <label>Nouveau mot de passe : <input type="password" name="new_pass" placeholder="Nouveau mot de passe *"></label>
            <?php if (isset($errors['new_pass'])) :
                if (isset($errors['new_pass']['size'])) : ?>
                    <div class="error">Le mot de passe doit être compris entre 8 et 50 caractères</div>
                <?php endif;
                if (isset($errors['new_pass']['empty'])) : ?>
                    <div class="error">Le mot de passe est obligatoire</div>
                <?php endif ?>
            <?php endif ?><br />
        <label>Confirmez le mot de passe : <input type="password" name="password2" placeholder="Réécrivez mot de passe *"></label>
            <?php if (isset($errors['password2'])) :
                if (isset($errors['password2']['different'])) : ?>
                    <div class="error">Les mots de passe ne sont pas identique</div>
                <?php endif;
                if (isset($errors['password2']['empty'])) : ?>
                    <div class="error">La confirmation des mots de passe est obligatoire</div>
                <?php endif ?>
            <?php endif ?><br />
        <input type="submit" name="change_password" value="Modifier le mot de passe">
    </form>

<?php $this->stop('main_content') ?>
