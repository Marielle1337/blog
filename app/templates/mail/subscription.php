<?php $this->layout('layout', ['title' => 'Abonnement a la newsletter']) ?>

<?php $this->start('main_content') ?>

    <form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <fieldset> <legend>Abonnement a la newsletter</legend>

            <label>
                <input type="email" name="email"  placeholder="email">
                <?php if (isset($errors['email']['empty'])): ?>
                l'email n'est pas renseigné
                <?php endif; ?>
            </label>

            <label>

                <input type="radio" name="newsletter"  placeholder="">
                <?php if (isset($errors['newsletter']['empty'])): ?>
                l'abonnement n'est pas renseigné
                <?php endif; ?>

            </label>


            </br>
            <button type="submit" name="subscription">envoyer votre inscription à la newsletter</button>

        </fieldset>    
    </form>
    
    <a href="<?= $this->url('home') ?>" >retour a la page d'accueil</a>
 

<?php $this->stop('main_content') ?>