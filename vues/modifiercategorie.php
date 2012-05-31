<div class="article">
    <h1>
        <?php echo $view['data']['view_title']; ?>
    </h1>

    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post">
        <fieldset>
            <label for="id_categorie">
                ID categorie:
            </label>
            <br/>
            <input type="text" id="id_categorie" name="id_categorie"
                   value="<?php echo ($view['data']['categorie'][Categorie::ID]); ?>"/>
            <br/>
            <label for="categorie">
                Catégorie:
            </label>
            <br/>
            <input type="text" id="categorie" name="categorie"
                   value="<?php echo ($view['data']['categorie'][Categorie::TITRE]); ?>"/>

            <input type="hidden" name="c" value="<?php echo MainController::getLastController() ?>"/>
            <input type="hidden" name="a" value="<?php echo MainController::getLastAction() ?>"/>
            <input type="hidden" name="id_categorie"
                   value="<?php echo ($view['data']['categorie'][Categorie::ID]); ?>"/>

            <div class="bouton">
                <input type="submit" value="Modifier"/>
            </div>
        </fieldset>
    </form>
</div>