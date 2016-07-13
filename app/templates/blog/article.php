<?php $this->layout('layout', ['title' => $article['title']]) ?>

<?php $this->start('main_content') ?>

	<article>
	       
	    <div>Posté le <?php echo $article['dateCreated'] ?>, par <?= $author['login'] ?></div>
	    <p><?php echo $article['content'] ?></p>

	</article>


<?php $this->stop('main_content') ?>