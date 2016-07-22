<?php $this->layout('layout', ['title' => 'LostPassword']) ?>

<?php $this->start('main_content') ?>

    <section>
        <form method="POST" action="#" >
            <label>Email : <input type="email" name="mail" placeholder="E-mail"></label>
            <?php if (isset($errors['email'])) :
                if (isset($errors['email']['empty'])) : ?>
                    <div class="error">Le mail doit être rempli</div>
                <?php endif;
                if (isset($errors['email']['invalid'])) : ?>
                    <div class="error">L'email n'est pas valide</div>
                <?php endif ?>
            <?php endif ?><br />

            <input type="submit" name="reset-pass" value="Réinitialiser le mot de passe">
        </form>
    </section>

<?php $this->stop('main_content') ?>
