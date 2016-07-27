<?php $this->layout('layout', ['title' => 'Accueil', 'categories'=>$categories]) ?>


<?php $this->start('main_content') ?>
	
	<?php for($i=0; $i<count($articles); $i++) { ?>
	<article>
		<h2><a href="<?= $this->url('article', array('id' => $articles[$i]['id'])) ?>"> <?= $articles[$i]['title'] ?></a></h2>
			<?php if($articles[$i]['picture']) { echo '<img class="banniere" src="'.$this->assetUrl('/uploads/'.$articles[$i]['picture']).'">'; } ?>
			<?php if($i < 2){ ?>
				<p><?= $articles[$i]['content'] ?></p>
			<?php } else { ?>
				<p><?= substr($articles[$i]['content'], 0, 255) ?>... <a href="<?= $this->url('article', array('id' => $articles[$i]['id'])) ?>"> Lire la suite </a></p>
			<?php } ?>
	</article>
	<?php } ?>

	<nav aria-label="...">
	  <ul class="pagination">
	    <li><a href="?page=<?= $_GET['page'] - 1 ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
	
	    <?php for ($i = 1 ; $i <= $pages ; $i++) {
           echo '<li><a href="?page=' . $i . '">' . $i . '<span class="sr-only">(current)</span></a></li></a> ';
        } ?>

        <li><a href="?page=<?php if($_GET['page'] >= $pages) { echo 0; } 
        						else { echo $_GET['page'] + 1; } ?>" 
        			aria-label="Next"><span aria-hidden="true">&raquo;</span>
        	</a>
        </li>

	  </ul>
	</nav>

<?php $this->stop('main_content') ?>



