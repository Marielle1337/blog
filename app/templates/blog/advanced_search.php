<?php $this->layout('layout', ['title' => 'Recherche avancée']) ?>

<?php $this->start('main_content') ?>
	
	<form action="#" method="get" accept-charset="utf-8">
		<input type="text" name="title" placeholder="Titre">
		<input type="text" name="content" placeholder="Contenu">
		<input type="date" name="date" placeholder="Date">
		<button type="submit" name="advanced_search"> Recherche avancée </button>
	</form>
<?php $this->stop('main_content') ?>
