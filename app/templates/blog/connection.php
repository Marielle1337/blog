<?php

$this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>
<form action="#" method="POST" accept-charset="utf-8">
	<fieldset>
		<legend> Connexion </legend>
		
		<label>
			<input type="text" name="login" placeholder="Login ou Mail">
			<?php if(isset($errors['user'])){ echo $errors['login']; } ?>
		</label>
	    
	    <label>
	        <input type="password" name="password" placeholder="Mot de passe">
	        <?php if(isset($errors['passwordExist'])){ echo $errors['passwordExist']; } ?>
		</label>

		</br>
		<button type="submit" name="connect">Connexion</button>
	</fieldset>
</form>
<form action="#" method="POST" accept-charset="utf-8">
	<fieldset>
		<legend> Inscription </legend>
		
		<label>
			<input type="text" name="login" placeholder="Login">
			<?php if(isset($errors['login'])){ echo $errors['login']; } ?>
		</label>

		<label>
			<input type="text" name="firstname" placeholder="Prénom (facultatif)">
			<?php if(isset($errors['firstname'])){ echo $errors['firstname']; } ?>
		</label>

		<label>
			<input type="email" name="email" placeholder="Adresse mail">
		</label>

		<label>
			<input type="password" name="password" placeholder="Mot de passe">
			<?php if(isset($errors['password'])){ echo $errors['password']; } ?>
		</label>
	    
	    <label>
	        <input type="password" name="password2" placeholder="Confirmation mot de passe">
	        <?php if(isset($errors['confirm_password'])){ echo $errors['confirm_password']; } ?>
		</label>

		<label>
            <input type="checkbox" name="newsletter" value="1">
            <?php if (isset($errors['newsletter'])): ?>
            L'abonnement est mal renseigné
            <?php endif; ?>
            Je souhaite m'abonner à la newsletter
        </label>

		</br>
		<button type="submit" name="signup">S'incrire</button>
	</fieldset>

</form>
<?php $this->stop('main_content') ?>
