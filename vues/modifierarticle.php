<div class="colonneGauche">
    <div class="article">
        <h1>
            <?php echo $view['data']['view_title']; ?>
        </h1>

        <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="comment">
                    <p class="lien">
                        <a href="<?php echo Url::voirArticle($view['data']['article'][Article::ID]); ?>">Retour à
                            l'article</a>
                    </p>
                </div>
                <?php if (MainController::isAuthenticated()): ?>
                <label for="titre">
                    Titre:
                </label>
                <br/>
                <input type="text" id="titre" name="titre"
                       value="<?php echo ($view['data']['article'][Article::TITRE]); ?>"
                       size="75"/>
                <br/>
                <label for="article">
                    Article:
                </label>
                <br/>
                <textarea rows="15" id="article" cols="65" name="article">
                    <?php echo ($view['data']['article'][Article::ARTICLE]); ?>
                </textarea>
                <br/>
                <label for="categorie">
                    Catégorie :
                </label>
                <br/>
                <select name="id_categorie" id="categorie">
                    <?php foreach ($view['data']['categories'] as $categorie): ?>
                    <option <?php if ($view['data']['categorie'][Categorie::ID] == $categorie[Categorie::ID]): ?>selected="selected"<?php endif;?>
                        value="<?php echo $categorie[Categorie::ID]; ?>"><?php echo $categorie[Categorie::TITRE];?></option>
                    <?php endforeach; ?>
                </select>
                <br/>
                <label for="fichier">
                    Ajouter une image
                </label>
                <br/>
                <?php if (isset($view['data']['article'][Article::IMAGE])): ?><img
                    src="./vues/img/<?php echo $view['data']['article'][Article::IMAGE] ?>" alt="image"/><?php endif; ?>
                <br/>
                <input type="file" name="fichier" id="fichier"/>

                <div class="bouton">
                    <input type="submit" value="Modifier"/>
                </div>
                <?php else: ?>
                <p>
                    Vous devez vous connecter pour modifier un article.
                </p>
                <?php endif; ?>
            </fieldset>
            <input type="hidden" name="c" value="<?php echo MainController::getLastController() ?>"/>
            <input type="hidden" name="a" value="<?php echo MainController::getLastAction() ?>"/>
            <input type="hidden" name="image" value="<?php echo $view['data']['article'][Article::IMAGE] ?>"/>
            <input type="hidden" name="id_article" value="<?php echo ($view['data']['article'][Article::ID]); ?>"/>
            <input type="hidden" name="id_categorie2"
                   value="<?php echo $view['data']['categories'][Categorie::ID] ?>"/>
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
