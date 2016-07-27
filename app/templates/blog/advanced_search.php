<?php $this->layout('layout', ['title' => 'Recherche avancée', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>
	
	<form action="#" method="get" accept-charset="utf-8">
		<label for="titre">Titre
			<input id="titre" type="text" name="title" placeholder="Titre">
		</label>
		<label for="content">Contenu
			<textarea id="content" type="text" name="content" placeholder="Contenu"></textarea>
		</label>
		<label for="date">Date
			<input id="date" type="date" name="date" placeholder="Date">
		</label>
		<button type="submit" name="advanced_search"> Recherche avancée </button>
	</form>
<?php $this->stop('main_content') ?>
