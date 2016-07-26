<?php $this->layout('layout', ['title' => 'S\'inscrire à la newsletter', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>

    <form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <fieldset><legend> S'abonner de la newsletter </legend>

            <label>
                <input type="email" name="email"  placeholder="Votre adresse mail">
                <?php if (isset($errors['email']['empty'])): ?>
                Aucun email n'est renseigné
                <?php endif; ?>
            </label>

            </br>
            <button type="submit" name="subscription">Je m'inscris à la newsletter</button>

        </fieldset>    
    </form> 

     <form action="#" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
        <fieldset><legend> Se désabonner de la newsletter </legend>

            <?php if(isset($_SESSION['flash'])) { echo $_SESSION['flash']; } ?>

            <label>
                <input type="email" name="email"  placeholder="Votre adresse mail">
                <?php if (isset($errors['email']['empty'])): ?>
                Aucun email n'est renseigné
                <?php endif; ?>
            </label>

            </br>
            <button type="submit" name="unsubscribe">Me désincrire</button>

        </fieldset>    
    </form> 

<?php $this->stop('main_content') ?>