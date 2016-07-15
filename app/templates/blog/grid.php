<?php $this->layout('layout', ['title' => 'grille des articles']) ?>

<?php $this->start('main_content') ?>

<section id="buttons">
    <a href="<?= $this->url('liste') ?>"><div><i class="fa fa-list" aria-hidden="true"></i></div></a>
    <a href="#"><div><i class="fa fa-th" aria-hidden="true"></i></div></a>
    <a href="<?= $this->url('add') ?>"><div id="add-button">Ajouter</div></a>
</section>

<section id="tasks" class="grid">
    <?php foreach ($articles as $article) : ?>

        <article class="task">
            <a href="#">
                <div class="name">
                    <?= $article['title'] ?>
                </div>
            </a>
            <footer>
                <div class="date"><?= date('d/m', strtotime($article['dateCreated'])) ?></div>
                <a href="<?= $this->url('delete', ['id' => $article['id']]) ?>" class="delete"><div>Supprimer</div></a>
            </footer>
        </article>

    <?php endforeach; ?>

</section>


<a href="<?= $this->url('liste') ?>" >retour a la liste</a>
<a href="<?= $this->url('add') ?>" >retour a la page d'ajout</a>
<a href="<?= $this->url('home') ?>" >retour a la page d'accueil</a>


<?php $this->stop('main_content') ?>