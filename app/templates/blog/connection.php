<?php $this->layout('layout', ['title' => 'Authentification', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>
<?php if(isset($errors['connect'])){ echo $errors['connect']; } ?>

<div class="materialContainer">

	<form action="#" method="POST" accept-charset="utf-8">
		<fieldset class='box'>
			<legend class="title"> Connexion </legend>
			
			<label for="log" class='input'>
				<input type="text" name="login" placeholder="Login ou Mail">
				<?php if(isset($errors['user'])){ echo $errors['user']; } ?>
			</label>
		    
		    <label for="pass" class='input'>
		        <input type="password" name="password" placeholder="Mot de passe">
		        <?php if(isset($errors['passwordExist'])){ echo $errors['passwordExist']; } ?>
			</label>

			<div class="button login">
				<button type="submit" name="connect"><span>Connexion<span> <i class="fa fa-check"></i></button>
	      	</div>
			
	        <a href="<?= $this->url('lostPassword') ?>" class="pass-forgot"> Mot de passe oublié ?</a>
		</fieldset>
	</form>

	<form action="#" method="POST" accept-charset="utf-8">
		<fieldset class='overbox'>

			<div class="material-button alt-2"><span class="shape"></span></div>

			<legend class='title'> Inscription </legend>
			
			<label for="login" class='input'>
				<input id="login" type="text" name="login" placeholder="Login">
				<?php if(isset($errors['login'])){ echo $errors['login']; } ?>
			</label>

			<label for="name" class='input'>
				<input id="name" type="text" name="firstname" placeholder="Prénom (facultatif)">
				<?php if(isset($errors['firstname'])){ echo $errors['firstname']; } ?>
			</label>

			<label for="email" class='input'>
				<input id="email" type="email" name="email" placeholder="Adresse mail">
			</label>

			<label for="pass1" class='input'>
				<input id="pass1" type="password" name="password" placeholder="Mot de passe">
				<?php if(isset($errors['password'])){ echo $errors['password']; } ?>
			</label>
		    
		    <label for="pass2" class='input'>
		        <input id="pass2" type="password" name="password2" placeholder="Confirmation mot de passe">
		        <?php if(isset($errors['confirm_password'])){ echo $errors['confirm_password']; } ?>
			</label>

			<label for="newsletter" class='input'>
	            <input type="checkbox" name="newsletter" id="newsletter" value="1">
	            <span> Je souhaite m'abonner à la newsletter </span>
	            <?php if (isset($errors['newsletter'])) { echo $errors['newsletter']; } ?>
	        </label>

			<div class="button">
				<button type="submit" name="signup">S'inscrire</button>
	     	</div>

			<?php if(isset($_SESSION['flash'])) { echo $_SESSION['flash']; } ?>
		</fieldset>

	</form>
</div>
<?php $this->stop('main_content') ?>
