<?php $this->layout('layout', ['title' => 'Liste des newsletters']) ?>

<?php $this->start('main_content') ?>
<?php //print_r($_SESSION) ?>
<section id="buttons">
    <a href="#"><div><i class="fa fa-list" aria-hidden="true"></i></div></a>
    <a href="<?= $this->url('grid') ?>"><div><i class="fa fa-th" aria-hidden="true"></i></div></a>
    <a href="<?= $this->url('newsletter') ?>"><div id="add-button">Ajouter</div></a>
</section>

<section id="tasks" class="list">
    <ul>
        <?php foreach($newsletters as $newsletter) : ?>
        <li class="task">
            <?= $newsletter['title']. ' , '.
            date('d/m/Y', strtotime($newsletter['sendDate'])) . ' : ' .     
            $newsletter['content'] ?>
            <a href="<?= $this->url('editNewsletter', ['id'=>$newsletter['id']])?>"> Modifier la newsletter </a> 
        </li>
        <?php endforeach; ?>
    </ul>
</section>


<?php $this->stop('main_content') ?>
