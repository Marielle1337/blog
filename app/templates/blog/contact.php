<?php $this->layout('layout', ['title' => 'Contact', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>
	
	<form action="#" method="post" accept-charset="utf-8">
		<input type="text" name="title" placeholder="Sujet">
		<input type="text" name="senderName" placeholder="Votre nom">
		<input type="email" name="email" placeholder="Email">
		<textarea name="content" placeholder="Bonjour..."></textarea>
		<button type="submit" name="contact"> Envoyer ! </button>
	</form>
<?php $this->stop('main_content') ?>