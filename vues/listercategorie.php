<div class="colonneGauche">
    <?php foreach ($view['data']['categories'] as $categorie): ?>
    <div class="article">
        <h1 class="categorie">
            <a href="<?php echo Url::voirCategorie($categorie[Categorie::ID]) ?>"><?php echo $categorie[Categorie::TITRE]; ?></a>
        </h1>
        <?php if (MainController::isAuthenticated()): ?>
        <a href="<?php echo Url::modifierCategorie($categorie[Categorie::ID]) ?>">Modifier</a>
        -
        <a href="<?php echo Url::supprimerCategorie($categorie[Categorie::ID]) ?>">Supprimer</a>
        <?php endif; ?>
    </div>
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

</div>

