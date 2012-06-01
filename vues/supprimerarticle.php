<div class="colonneGauche">
    <div class="article">
        <h1>
            Etes-vous sûr de vouloir supprimer cet article?
        </h1>

        <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="POST">
            <fieldset>
                <div class="comment">
                    <p class="lien">
                        <a href="<?php echo Url::voirArticle($view['data']['article'][Article::ID]); ?>">Retour à
                            l'article</a>
                    </p>
                </div>
                <h2> <?php echo ($view['data']['article'][Article::TITRE]); ?> </h2>

                <p class="post"> <?php echo ($view['data']['article']['article']); ?> </p>

                <input type="submit" value="Supprimer"/>
                <br/>
            </fieldset>
        </form>
        <input type="hidden" name="c" value="<?php echo (MainController::getLastController()); ?>"/>
        <input type="hidden" name="a" value="<?php echo (MainController::getLastAction()); ?>"/>
        <input type="hidden" name="id_article" value="<?php echo ($view['data']['article'][Article::ID]); ?>"/>
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