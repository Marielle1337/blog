<?php $this->layout('layout', ['title' => 'Liste des tâches']) ?>

<?php $this->start('main_content') ?>

	<ul>
	<?php foreach($allTasks as $task){ ?>
		<?php if($task['priority'] == '1') {
			$priority = 'Urgent';
		} else {
			$priority = 'A faire';
		} ?>
			<li> <?= $task['name'] .', à faire le '. $task['date'] .', '. $priority ?> </li>
		
	<?php } ?>
	</ul>

<?php $this->stop('main_content') ?>