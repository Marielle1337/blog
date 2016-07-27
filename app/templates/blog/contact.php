<?php $this->layout('layout', ['title' => 'Contact', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>
	
	<form action="#" method="post" accept-charset="utf-8">
        <label for="title">Titre
			<input type="text" name="title" id="title" placeholder="Sujet">
        </label>
            
        <label for="senderName">Votre nom
			<input type="text" name="senderName" id="senderName" placeholder="Votre nom">
        </label>
            
        <label for="email">Email
			<input type="email" name="email" id="email" placeholder="Email">
        </label>
            
        <label for="content">Contenu
			<textarea name="content" id="content" placeholder="Bonjour..."></textarea>
        </label>
            
		<button type="submit" name="contact"> Envoyer ! </button>
	</form>
<?php $this->stop('main_content') ?>