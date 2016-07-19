<?php $this->layout('layout', ['title' => 'Contact']) ?>

<?php $this->start('main_content') ?>
	
	<form action="#" method="get" accept-charset="utf-8">
		<input type="text" name="subject" placeholder="Sujet">
		<input type="email" name="email" placeholder="Email">
		<textarea name="content" placeholder="Bonjour..."></textarea>
		<button type="submit" name="submit"> Envoyer ! </button>
	</form>
<?php $this->stop('main_content') ?>