<div id="header">
    <h1>
        <a href="<?php echo Url::listerArticle(); ?>" title="home" id="logo">AnNa's Blog</a> <!-- Placer logo -->
    </h1>
    <ul id="nav">
        <li>
            <a href="<?php echo Url::listerArticle(); ?>" title="Retour à la page home">Article</a>
        </li>
        <li>
            <a href="<?php echo Url::listerCategorie(); ?>">Categorie</a>
        </li>
        <li>
            <?php if (MainController::getLastController() == 'article'): ?>
            <a href="<?php echo Url::ajouterArticle(); ?>">Ajouter un article</a>
            <?php else: ?>
            <a href="<?php echo Url::ajouterCategorie(); ?>">Ajouter une Catégorie</a>
            <?php endif; ?>
        </li>
    </ul>
</div>
