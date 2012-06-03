<div class="colonneGauche">
    <div class="article">
        <div class="comment">
            <p class="lien">
                <a href="<?php echo Url::listerArticle(); ?>">Retour à la liste des articles</a>
            </p>
        </div>
        <h1>
            <?php echo $view['data']['view_title']; ?>
        </h1>

        <p>
            <?php echo $view['data']['message']; ?>
        </p>
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
                   title="Voir la catégorie"><?php echo $categorie[Categorie::TITRE]; ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
