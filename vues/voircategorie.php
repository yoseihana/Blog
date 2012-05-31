<div class='colonneGauche'>
    <div class="article">
        <h1>
            <?php echo $view['data']['categorie'][Categorie::TITRE]; ?>
        </h1>
        <ul>
            <?php foreach ($view['data']['articles'] as $articles): ?>
            <li>
                <?php echo $articles[Article::TITRE]; ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <a href="<?php echo Url::modifierCategorie($view['data']['categorie'][Categorie::ID]) ?>">Modifier</a>
        -
        <a href="<?php echo Url::supprimerCategorie($view['data']['categorie'][Categorie::ID]) ?>">Supprimer</a>
        -
        <a href="<?php echo Url::ajouterCategorie() ?>">Ajouter une catégorie</a>
    </div>
</div>
<div class="colonneDroite">
    <?php include('apropos.php'); ?>
    <!-- FIN contenu -->

    <?php include('liens.php'); ?>

</div>