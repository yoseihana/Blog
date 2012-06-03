<div class="colonneGauche">
    <?php foreach ($view['data']['categories'] as $categorie): ?>
        <div class="article">
            <h1 class="categorie">
                <a href="<?php echo Url::voirCategorie($categorie[Categorie::ID]) ?>"><?php echo $categorie[Categorie::TITRE]; ?></a>
            </h1>
    <?php if (true): ?>
        <a href="<?php echo Url::modifierCategorie($categorie[Categorie::ID]) ?>">Modifier</a>
        -
        <a href="<?php echo Url::supprimerCategorie($categorie[Categorie::ID]) ?>">Supprimer</a>
        </div>
         <?php endif; ?>
    <?php endforeach; ?>

    <div class="pagination">
        <?php for ($i = 1; $i <= $view['data']['nbPage']; $i++): ?>
        <a href="index.php?a=lister&c=categorie&page=<?php echo $i ?>"><?php echo $i ?></a>
        <?php endfor; ?>
    </div>
</div>

<div class="colonneDroite">
    <?php include('apropos.php'); ?>

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

