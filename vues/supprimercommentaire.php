<div class="colonneGauche">
    <div class="article">
        <h1>
            Etes-vous sûr de vouloir supprimer ce commentaire?
        </h1>

        <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="POST">
            <fieldset>
                <div class="comment">
                    <p class="lien">
                        <a href="<?php echo Url::listerArticle(); ?>">Retour àl a liste des articles</a>
                    </p>
                </div>
                <h2> Auteur:</h2>

                <p class="post"> <?php echo ($view['data']['commentaire'][Comment::NOM]); ?> </p>
                <br/>

                <h2> Commentaire:</h2>

                <p class="post"> <?php echo ($view['data']['commentaire'][Comment::TEXT]); ?> </p>

                <input type="submit" value="Supprimer"/>
            </fieldset>
            <input type="hidden" name="c" value="<?php echo (MainController::getLastController()); ?>"/>
            <input type="hidden" name="a" value="<?php echo (MainController::getLastAction()); ?>"/>
            <input type="hidden" name="id_commentaire"
                   value="<?php echo ($view['data']['commentaire'][Comment::ID_COMMENTAIRE]); ?>"/>
            <input type="hidden" name="id_article"
                   value="<?php echo ($view['data']['commentaire'][Comment::ID_ARTICLE]); ?>"/>
        </form>
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