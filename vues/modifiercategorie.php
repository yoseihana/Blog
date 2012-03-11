<div class="article">
    <h1>
        <?php echo $c . ' à ' . $a; ?>
    </h1>

    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post">
        <fieldset>
            <label for="id_categorie">
                ID categorie:
            </label>
            <br/>
            <input type="text" id="id_categorie" name="id_categorie" value="<?php echo ($view['data']['categorie']['id_categorie']); ?>"/>
            </br>
            <label for="categorie">
                Catégorie:
            </label>
            <br/>
            <input type="text" id="categorie" name="categorie" value="<?php echo ($view['data']['categorie']['categorie']); ?>"/>

            <input type="hidden" name="c" value="<?php echo ($validControllers['categorie']); ?>"/>
            <input type="hidden" name="a" value="<?php echo ($validActions['modifier']); ?>"/>

            <div class="bouton">
                <input type="submit" value="Modifier"/>
            </div>
        </fieldset>
    </form>
</div>