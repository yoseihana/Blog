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
            <input type="text" name="id_categorie" value="c1"/>
            <br/>
            <label for="categorie">
                Catégorie:
            </label>
            <br/>
            <input type="text" name="categorie" value="Apple"/>


            <input type="hidden" name="c" value="<?php echo ($validControllers['categorie']); ?>"/>
            <input type="hidden" name="a" value="<?php echo ($validActions['ajouter']); ?>"/>
            <input type="hidden" name="id_article" value="<?php echo ($view['data']['categorie']['id_categorie']); ?>"/>

            <div class="bouton">
                <input type="submit" value="Ajouter"/>
            </div>
        </fieldset>
    </form>
</div>