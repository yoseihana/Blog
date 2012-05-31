<div class="colonneGauche">
    <div class="article">
        <h1 class="voir">
            <?php echo $view['data']['article'][Article::TITRE]; ?>
        </h1>

        <p class="post">
            Poster le <?php echo $view['data']['article'][Article::DATE_PARUTION] ?>
            par Anna
        </p>

        <p>
            <?php echo $view['data']['article'][Article::ARTICLE] ?>
        </p>
        <?php if (true): ?>
        <div class="lien">
            <a href="<?php echo Url::modifierArticle($view['data']['article'][Article::ID]) ?>">Modifier</a>
            -
            <a href="<?php echo Url::supprimerArticle($view['data']['article'][Article::ID]) ?>">Supprimer</a>
            -
            <a href="<?php echo Url::ajouterArticle() ?>">Ajouter un article</a>
        </div>
        <?php endif; ?>
    </div>
    <div class="article">
        <!--Liste des commentaires-->
        <div id="comments"></div>
        <h1 class="voir">
            Commentaires
        </h1>

        <?php if (count($view['data']['article'][Article::NB_COM]) > 0): ?>
        <?php foreach ($view['data']['commentaires'] as $commentaire): ?>
            <p class="post">
                Poster le <?php echo $commentaire[Comment::DATE]; ?> par <?php echo $commentaire[Comment::NOM]; ?>
            </p>
            <p>
                <?php echo($commentaire[CommenT::TEXT]); ?>
            </p>

            <?php if (true): ?>
                <div class="lien">
                    <a href="<?php echo Url::modifierCommentaire($commentaire[Comment::ID_COMMENTAIRE]); ?>">
                        Modifier</a>
                    -
                    <a href="<?php echo Url::supprimerCommentaire($commentaire[Comment::ID_COMMENTAIRE]); ?>">Supprimer</a>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="comment">
            <p class="lien">
                <a href="<?php echo Url::ajouterCommentaire(); ?>">Ajouter
                    un
                    commentaire</a>
            </p>
        </div>
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
                <?php echo $categorie[Categorie::TITRE]; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>
</div>
