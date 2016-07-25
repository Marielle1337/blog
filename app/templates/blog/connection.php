<?php $this->layout('layout', ['title' => 'Authentification', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>
<?php if(isset($errors['connect'])){ echo $errors['connect']; } ?>
<form action="#" method="POST" accept-charset="utf-8">
	<fieldset>
		<legend> Connexion </legend>
		
		<label>
			<input type="text" name="login" placeholder="Login ou Mail">
			<?php if(isset($errors['user'])){ echo $errors['user']; } ?>
		</label>
	    
	    <label>
	        <input type="password" name="password" placeholder="Mot de passe">
	        <?php if(isset($errors['passwordExist'])){ echo $errors['passwordExist']; } ?>
		</label>

		<br/>
		<button type="submit" name="connect">Connexion</button>
		<br/><br/>
        <a href="<?= $this->url('lostPassword') ?>"> Mot de passe oublié ?</a>
	</fieldset>
</form>
<br/>
<br/>
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

		<label for="newsletter">
            <input type="checkbox" name="newsletter" id="newsletter" value="1">
            Je souhaite m'abonner à la newsletter
            <?php if (isset($errors['newsletter'])) { echo $errors['newsletter']; } ?>
        </label>

		</br>
		<button type="submit" name="signup">S'inscrire</button>


		<?php if(isset($_SESSION['flash'])) { echo $_SESSION['flash']; } ?>
	</fieldset>

</form>
<?php $this->stop('main_content') ?>
