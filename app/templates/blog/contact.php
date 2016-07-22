<?php $this->layout('layout', ['title' => 'Contact', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>
	
	<form action="#" method="post" accept-charset="utf-8">
            <label>
		<input type="text" name="title" placeholder="Sujet">
            </label><br/>
            
            <label>
		<input type="text" name="senderName" placeholder="Votre nom">
            </label><br/>
            
            <label>
		<input type="email" name="email" placeholder="Email">
            </label><br/>
            
            <label>
		<textarea name="content" placeholder="Bonjour..."></textarea>
            </label><br/>
            
		<button type="submit" name="contact"> Envoyer ! </button>
	</form>
<?php $this->stop('main_content') ?>