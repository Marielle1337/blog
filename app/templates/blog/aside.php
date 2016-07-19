<?php $this->layout('layout') ?>

<?php $this->start('aside') ?>

	<nav id="navlaterale" class="categories">
		<ul>
		<?php foreach ($categories as $category) { ?>
			<li><a href="<?=$this->url('category', array('id' => $category['id'])) ?>" title="<?= $category['name'] ?>"><?= $category['name'] ?></a></li>
		<?php } ?>
		</ul>
	</nav>

<?php $this->stop('aside') ?>