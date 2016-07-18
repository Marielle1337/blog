<?php $this->layout('layout', ['title' => 'Liste des articles']) ?>

<?php $this->start('main_content') ?>
<?php //print_r($_SESSION) ?>
<section id="buttons">
    <a href="#"><div><i class="fa fa-list" aria-hidden="true"></i></div></a>
    <a href="<?= $this->url('grid') ?>"><div><i class="fa fa-th" aria-hidden="true"></i></div></a>
    <a href="<?= $this->url('add') ?>"><div id="add-button">Ajouter</div></a>
</section>

<section id="tasks" class="list">
    <ul>
        <?php foreach($articles as $article) : ?>
        <li class="task">
            <a href="#">
                <div class="name">
                    <?= $article['title'] ?>
                </div>
                <div class="date"><?= date('d/m', strtotime($article['dateCreated'])) ?></div>
            </a>
            <a href="<?= $this->url('article', array('id' => $article['id'])) ?>"> Lire l'article </a>
            <a href="<?= $this->url('delete', ['id' => $article['id']]) ?>" class="delete">
                <div>Supprimer</div>
            </a>
            <a href="<?= $this->url('editArticle', ['id'=>$article['id']]) ?>" >modifier l'article</a>
        </li>
        <?php endforeach; ?>
    </ul>
</section>


<a href="<?= $this->url('add') ?>" >retour a la page d'ajout</a>
<a href="<?= $this->url('grid') ?>" >retour a la grille</a>
<a href="<?= $this->url('home') ?>" >retour a la page d'accueil</a>


<?php $this->stop('main_content') ?>
