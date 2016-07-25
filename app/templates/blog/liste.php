<?php $this->layout('layout', ['title' => 'Liste des articles', 'categories'=>$categories]) ?>

<?php $this->start('main_content') ?>
<?php //print_r($_SESSION) ?>
<section id="buttons">
    <a href="<?= $this->url('add') ?>"><div id="add-button">Ajouter un article</div></a>
</section>

<section id="tasks" class="list">
    <ul>
        <?php foreach($articles as $article) : ?>
        <li class="task">
            <h4> <?= $article['title'] ?></h4>
            <?= date('d/m/Y', strtotime($article['dateCreated'])) ?><?php if(isset($article['edited'])) { echo ', édité le '. date('d/m/Y', strtotime($article['edited'])); } ?>
            <div>
                <i class="fa fa-pencil" aria-hidden="true"></i>
                <a href="<?= $this->url('article', array('id' => $article['id'])) ?>"> Lire </a>

                <i class="fa fa-eye" aria-hidden="true"></i>
                <a href="<?= $this->url('editArticle', ['id'=>$article['id']]) ?>" > Modifier </a>

                <i class="fa fa-trash" aria-hidden="true"></i>
                <a href="<?= $this->url('delete', ['id' => $article['id']]) ?>" class="delete"> Supprimer </a>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
</section>

<?php $this->stop('main_content') ?>
