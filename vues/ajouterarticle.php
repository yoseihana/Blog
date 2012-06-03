<div class="colonneGauche">
    <div class="article">
        <h1>
            <?php echo $view['data']['view_title']; ?>
        </h1>

        <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post">
            <fieldset>
                <div class="comment">
                    <p class="lien">
                        <a href="<?php echo Url::listerArticle(); ?>">Retour à la liste des articles</a>
                    </p>
                </div>
                <?php if (MainController::isAuthenticated()): ?>
                <label for="titre">
                    Titre:
                </label>
                <br/>
                <input type="text" id="titre" name="titre" value="Titre"/>
                <br/>
                <label for="categorie">
                    Catégorie :
                </label>
                <br/>
                <select name="id_categorie" id="categorie">
                    <?php foreach ($view['data']['categories'] as $categorie): ?>
                    <option
                        value="<?php echo $categorie[Categorie::ID]; ?>"><?php echo $categorie[Categorie::TITRE] ?></option>
                    <?php endforeach; ?>
                </select>
                <br/>
                <label for="article">
                    Article:
                </label>
                <br/>
                <textarea id="article" cols="60" name="article" rows="15">
                </textarea>

                <p>
                    Vous pouvez utiliser les balises HTML pour avoir une structure du code
                </p>

                <div class="bouton">
                    <input type="submit" value="Ajouter"/>
                </div>
                <?php else: ?>
                <p>
                    Vous devez vous connecter pour ajouter un article.
                </p>
                <?php endif; ?>
            </fieldset>
            <input type="hidden" name="c" value="<?php echo MainController::getLastController() ?>"/>
            <input type="hidden" name="a" value="<?php echo MainController::getLastAction() ?>"/>
            <input type="hidden" name="image" value="<?php echo $view['data']['article'][Article::IMAGE] ?>"/>
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
