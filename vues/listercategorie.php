<?php if (count($view['data'] ['categories'])): ?>
<?php foreach ($view['data']['categories'] as $categorie): ?>
    <div class="article">
        <h1>
            <a href="<?php echo Url::voirCategorie($categorie[Categorie::ID]) ?>"><?php echo $categorie[Categorie::TITRE]; ?></a>
        </h1>
        <?php if (true): ?>
        <a href="<?php echo Url::modifierCategorie($categorie[Categorie::ID]) ?>">Modifier</a>
        -
        <a href="<?php echo Url::supprimerCategorie($categorie[Categorie::ID]) ?>">Supprimer</a>
        -
        <a href="<?php echo Url::ajouterCategorie() ?>">Ajouter une catégorie</a>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

