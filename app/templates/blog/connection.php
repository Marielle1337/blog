<?php

$this->layout('layout', ['title' => 'Connexion']) ?>

<?php $this->start('main_content') ?>
<form action="#" method="POST" accept-charset="utf-8">
	<fieldset>
		<legend> Connexion </legend>
		
		<label>
			<input type="text" name="login" placeholder="Login ou Mail">
		</label>
	    
	    <label>
	        <input type="password" name="password" placeholder="Mot de passe">
		</label>

		</br>
		<button type="submit" name="connect">Connexion</button>
	</fieldset>

	<fieldset>
		<legend> Inscription </legend>
		
		<label>
			<input type="text" name="login" placeholder="Login">
		</label>

		<label>
			<input type="text" name="firstname" placeholder="Prénom (facultatif)">
		</label>

		<label>
			<input type="email" name="email" placeholder="Adresse mail">
		</label>

		<label>
			<input type="password" name="password" placeholder="Mot de passe">
		</label>
	    
	    <label>
	        <input type="password" name="password2" placeholder="Confirmation mot de passe">
		</label>

		</br>
		<button type="submit" name="signup">S'incrire</button>
	</fieldset>

</form>
<?php $this->stop('main_content') ?>
