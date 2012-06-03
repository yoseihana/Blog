<div class='colonneGauche'>
    <div class="article">
        <div class="comment">
            <p class="lien">
                <a href="<?php echo Url::listerCategorie(); ?>">Retour à la liste des catégorie</a>
            </p>
        </div>
        <h1 class="categorie">
            <?php echo $view['data']['categorie'][Categorie::TITRE]; ?>
        </h1>
        <ul>
            <?php foreach ($view['data']['articles'] as $articles): ?>
            <li>
                <?php echo $articles[Article::TITRE]; ?>
            </li>
            <?php endforeach; ?>
        </ul>
        <?php if (MainController::isAuthenticated()): ?>
        <a href="<?php echo Url::modifierCategorie($view['data']['categorie'][Categorie::ID]) ?>">Modifier</a>
        -
        <a href="<?php echo Url::supprimerCategorie($view['data']['categorie'][Categorie::ID]) ?>">Supprimer</a>
        <?php endif; ?>
    </div>
</div>
<div class="colonneDroite">
    <?php include('apropos.php'); ?>
    <!-- FIN contenu -->

    <?php include('liens.php'); ?>
    <div class="contenu">
        <h1>
            Catégories
        </h1>

        <ul class="lien">
            <?php foreach ($view['data']['categories'] as $categorie): ?>
            <li>
                <a href="<?php echo Url::voirCategorie($categorie[Categorie::ID]); ?>"
                   title="Voir al catégorie"><?php echo $categorie[Categorie::TITRE]; ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>