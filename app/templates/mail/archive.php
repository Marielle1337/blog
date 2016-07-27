<?php $this->layout('layout', ['title' => 'Liste des newsletters', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>
<?php //print_r($_SESSION) ?>
<section id="buttons">
    <a href="<?= $this->url('newsletter') ?>"><i class="fa fa-plus" aria-hidden="true"></i>
    <span id="add-button">Ajouter</span></a>
</section>

<section id="tasks" class="list">
    <ul>
        <?php foreach($newsletters as $newsletter) : ?>
        <li class="task">
            <h3 class="newsletter"><?= $newsletter['title'] ?> </h3>
             <?= date('d/m/Y', strtotime($newsletter['sendDate']))  .     
              '<p class="newsletter">'.  $newsletter['content']  .'</p>' ?>
            <a href="<?= $this->url('editNewsletter', ['id'=>$newsletter['id']])?>"> Modifier la newsletter </a> 
        </li>
        <?php endforeach; ?>
    </ul>
</section>


<?php $this->stop('main_content') ?>
