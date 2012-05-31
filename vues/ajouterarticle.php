<div class="article">
    <h1>
        <?php echo $view['data']['view_title']; ?>
    </h1>

    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post">
        <fieldset>
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
                <?php foreach ($view['data']['categorie'] as $categorie): ?>
                <option <?php if ($categorie[Categorie::ID] == $categorie[Categorie::ID]): ?>selected="selected"<?php endif;?>
                    value="<?php echo $categorie[Categorie::ID]; ?>"><?php echo $categorie[Categorie::TITRE] ?></option>
                <?php endforeach; ?>
            </select>
            <br/>
            <label for="article">
                Article:
            </label>
            <br/>
            <textarea id="article" cols="75" name="article" rows="15">
                Votre article:
            </textarea>

            <input type="hidden" name="c" value="<?php echo MainController::getLastController() ?>"/>
            <input type="hidden" name="a" value="<?php echo MainController::getLastAction() ?>"/>
            <input type="hidden" name="image" value="<?php echo $view['data']['article'][Article::IMAGE] ?>"/>

            <div class="bouton">
                <input type="submit" value="Ajouter"/>
            </div>
        </fieldset>
    </form>
</div>
