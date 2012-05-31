<div class="article">
    <h1>
        <?php echo $view['data']['view_title']; ?>
    </h1>

    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post">
        <fieldset>
            <label for="id_categorie">
                ID catégorie:
            </label>
            <br/>
            <input id='id_categorie' type="text" name="id_categorie" value="c1"/>
            <br/>
            <label for="categorie">
                Catégorie:
            </label>
            <br/>
            <input id='categorie' type="text" name="categorie" value="Apple"/>


            <input type="hidden" name="c" value="<?php echo MainController::getLastController() ?>"/>
            <input type="hidden" name="a" value="<?php echo MainController::getLastAction() ?>"/>

            <div class="bouton">
                <input type="submit" value="Ajouter"/>
            </div>
        </fieldset>
    </form>
</div>