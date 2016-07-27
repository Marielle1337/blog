<?php $this->layout('layout', ['title' => 'Mot de passe perdu ?', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>

    <section>
        <form method="POST" action="#" >
            <label for="email">Email :
                <input id="email" type="email" name="email" placeholder="E-mail">
            </label>
            <?php if (isset($errors['email'])) :
                if (isset($errors['email']['empty'])) : ?>
                    <div class="error">Le mail doit être rempli</div>
                <?php endif;
                if (isset($errors['email']['invalid'])) : ?>
                    <div class="error">L'email n'est pas valide</div>
                <?php endif ?>
            <?php endif ?><br />


            <button type="submit" name="reset-pass">Réinitialiser le mot de passe</button>
            <?php if(isset($_SESSION['flash'])) { echo '<p>'.$_SESSION['flash'].'</p>'; } ?>
        </form>
    </section>

<?php $this->stop('main_content') ?>
