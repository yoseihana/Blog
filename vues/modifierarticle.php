<div class="article">
    <?php if (true): ?>
    <h1>
        <?php echo $view['data']['view_title']; ?>
    </h1>

    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post">
        <fieldset>
            <label for="titre">
                Titre:
            </label>
            <br/>
            <input type="text" id="titre" name="titre" value="<?php echo ($view['data']['article'][Article::TITRE]); ?>"
                   size="75"/>
            <br/>
            <label for="article">
                Article:
            </label>
            <br/>
            <textarea rows="15" id="article" cols="75" name="article">
                <?php echo ($view['data']['article'][Article::ARTICLE]); ?>
            </textarea>
            <br/>
            <label for="categorie">
                Catégorie :
            </label>
            <br/>

            <select name="id_categorie" id="categorie">
                <?php foreach ($view['data']['categories'] as $categorie): ?>
                <option <?php if ($categorie[Categorie::ID] == $categorie[Categorie::ID]): ?>selected="selected"<?php endif;?>
                    value="<?php echo $categorie[Categorie::ID]; ?>"><?php echo $categorie[Categorie::TITRE] ?></option>
                <?php endforeach; ?>
            </select>
            <br/>
            <label for="fichier">
                Ajouter une image
            </label>
            <br/>
            <img src="./img/<?php echo $view['data']['article'][Article::IMAGE] ?>" alt="image"/>
            <br/>
            <input type="file" name="fichier" id="fichier"/>

            <input type="hidden" name="c" value="<?php echo MainController::getLastController() ?>"/>
            <input type="hidden" name="a" value="<?php echo MainController::getLastAction() ?>"/>
            <input type="hidden" name="image" value="<?php echo $view['data']['article'][Article::IMAGE] ?>"/>
            <input type="hidden" name="id_article" value="<?php echo ($view['data']['article'][Article::ID]); ?>"/>
            <input type="hidden" name="id_categorie2" value="<?php echo $view['data']['categories'][Categorie::ID] ?>"/>

            <div class="bouton">
                <input type="submit" value="Modifier"/>
            </div>
        </fieldset>
    </form>

    <? else: ?>
    <p>Vous devez vous connectez pour modifier un article</p>
    <?php endif; ?>
</div>