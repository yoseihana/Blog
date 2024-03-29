<div class="colonneGauche">
    <div class="article">
        <h1>
            <?php echo $view['data']['view_title']; ?>
        </h1>

        <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post">
            <fieldset>
                <div class="comment">
                    <p class="lien">
                        <a href="<?php echo Url::voirCategorie($view['data']['categorie'][Categorie::ID]); ?>">Retour à
                            la catégorie</a>
                    </p>
                </div>
                <?php if (MainController::isAuthenticated()): ?>
                <label for="categorie">
                    Catégorie:
                </label>
                <br/>
                <input type="text" id="categorie" name="categorie"
                       value="<?php echo ($view['data']['categorie'][Categorie::TITRE]); ?>"/>
                <br/>

                <div class="bouton">
                    <input type="submit" value="Modifier"/>
                </div>
                <?php else: ?>
                <p>
                    Vous devez vous connecter pour modifier une catégorie.
                </p>
                <?php endif; ?>
            </fieldset>
            <input type="hidden" name="c" value="<?php echo MainController::getLastController() ?>"/>
            <input type="hidden" name="a" value="<?php echo MainController::getLastAction() ?>"/>
            <input type="hidden" name="id_categorie"
                   value="<?php echo ($view['data']['categorie'][Categorie::ID]); ?>"/>

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
                   title="Voir la catégorie"><?php echo $categorie[Categorie::TITRE]; ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
