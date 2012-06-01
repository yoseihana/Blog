<div class="colonneGauche">
    <div class="article">
        <h1>
            <?php echo $view['data']['view_title']; ?>
        </h1>

        <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post">
            <fieldset>
                <div class="comment">
                    <p class="lien">
                        <a href="<?php echo Url::voirArticle($view['data']['commentaire'][Comment::ID_ARTICLE]); ?>">Retour
                            à
                            l'article</a>
                    </p>
                </div>
                <label for="nom_auteur">
                    Nom:
                </label>
                <br/>
                <input type="text" id="nom_auteur" name="nom_auteur" value="Nom"/>
                <br/>
                <label for="texte">
                    Texte:
                </label>
                <br/>
                <textarea cols="75" id="texte" name="texte" rows="15">

                </textarea>

                <input type="hidden" name="c" value="<?php echo MainController::getLastController() ?>"/>
                <input type="hidden" name="a" value="<?php echo MainController::getLastAction() ?>"/>
                <input type="hidden" name="id_article"
                       value="<?php echo ($view['data']['commentaire'][Comment::ID_ARTICLE]); ?>"/>

                <div class="bouton">
                    <input type="submit" value="Ajouter"/>
                </div>
            </fieldset>
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
