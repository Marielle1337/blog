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
            <a href="#">
                <div class="name">
                    <?= $newsletter['title'] ?>
                </div>
                <div class="date">
                    <?= date('d/m', strtotime($newsletter['sendDate'])) ?>
                </div>
                <div class="name">
                    <?= $newsletter['content'] ?>
                </div>
            </a>
            
        </li>
        <?php endforeach; ?>
    </ul>
</section>



<a href="<?= $this->url('home') ?>" >retour a la page d'accueil</a>


<?php $this->stop('main_content') ?>
