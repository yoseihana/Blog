<div class="colonneGauche">
    <div class="article">
        <div class="comment">
            <p class="lien">
                <a href="<?php echo Url::listerArticle(); ?>">Retour à la liste des articles</a>
            </p>
        </div>
        <h1 class="voir">
            <?php echo $view['data']['article'][Article::TITRE]; ?>
        </h1>

        <p class="post">
            Poster le <?php echo $view['data']['article'][Article::DATE_PARUTION] ?>
            par Anna dans "<a href="<?php echo Url::voirCategorie($view['data']['categorie'][Categorie::ID]); ?>"
                              title="Voir la catéhorie"><?php echo $view['data']['categorie'][Categorie::ID]; ?></a>"
        </p>

        <p>
            <?php echo $view['data']['article'][Article::ARTICLE] ?>
        </p>
        <?php if (true): ?>
        <div class="lien">
            <a href="<?php echo Url::modifierArticle($view['data']['article'][Article::ID]) ?>">Modifier</a>
            -
            <a href="<?php echo Url::supprimerArticle($view['data']['article'][Article::ID]) ?>">Supprimer</a>
        </div>
        <div class="comment">
            <p class="lien">
                <a href="<?php echo Url::ajouterArticle() ?>">Ajouter un article</a>
            </p>
        </div>
        <?php endif; ?>
    </div>
    <div class="article">
        <!--Liste des commentaires-->
        <h1 class="voir">
            Commentaires
        </h1>

        <?php if (count($view['data']['article'][Article::NB_COM]) > 0): ?>
        <?php foreach ($view['data']['commentaires'] as $commentaire): ?>
            <p class="post">
                Poster le <?php echo $commentaire[Comment::DATE]; ?> par <?php echo $commentaire[Comment::NOM]; ?>
            </p>
            <p class="commentaire">
                <?php echo($commentaire[CommenT::TEXT]); ?>
            </p>

            <?php if (true): ?>
                <div class="lien commentaire">
                    <a href="<?php echo Url::modifierCommentaire($commentaire[Comment::ID_COMMENTAIRE]); ?>">
                        Modifier</a>
                    -
                    <a href="<?php echo Url::supprimerCommentaire($commentaire[Comment::ID_COMMENTAIRE]); ?>">Supprimer</a>
                </div>
                <div class="comment">
                    <p class="lien">
                        <a href="<?php echo Url::ajouterCommentaire(); ?>">Poster un commentaire</a>
                    </p>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
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

