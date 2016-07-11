<?php $this->layout('layout', ['title' => 'suppression des articles']) ?>

<?php $this->start('main_content') ?>
<?php print_r($_SESSION) ?>
<section>
    <a href="#"><div><i  aria-hidden="true"></i></div></a>
    <a href="<?= $this->url('') ?>"><div><i  aria-hidden="true"></i></div></a>
    <a href="<?= $this->url('add') ?>"><div>Ajouter</div></a>
</section>

<section>
    <ul>
        <?php foreach($articles as $article) : ?>
        <li>
            <a href="#">
                <div>
                    <?= $article['title'] ?>
                </div>
                <div><?= date('d/m', strtotime($article['dateCreated'])) ?></div>
            </a>
            <a href="<?= $this->url('delete', ['id' => $article['id']]) ?>" >
                <div>Supprimer</div>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
</section>

<?php $this->stop('main_content') ?>
