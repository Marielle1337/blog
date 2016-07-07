<?php $this->layout('layout', ['title' => 'Ajouter une tâche']) ?>

<?php $this->start('main_content') ?>
	
	<form action="#" method="post" accept-charset="utf-8">
		<input type="text" name="name" placeholder="Intitulé de la tâche" <?php if(isset($_POST['name'])){ echo 'value="'.$_POST['name'].'"';} ?> />
		<?php if(isset($errors['name'])){ echo $errors['name']; } ?>
		<input type="date" name="date" placeholder="Date limite" <?php if(isset($_POST['date'])){ echo 'value="'.$_POST['date'].'"';} ?> />
		
		<input type="text" name="priority" placeholder="Priorité (1 = haute; 2 = faible)" <?php if(isset($_POST['priority'])){ echo 'value="'.$_POST['priority'].'"';} ?> />
		<?php if(isset($errors['priority'])){ echo $errors['priority']; } ?>
		<br/><br/>
		<button type="submit" name="add">Ajouter à la liste</button>
		<button type="submit" name="add_and_rest">Ajouter et rester</button>
	</form>

	<p> <a href="<?= $this->url('home') ?>">
			Retour
		</a> </p>
			
<?php $this->stop('main_content') ?>