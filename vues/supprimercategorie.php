<div class="article">
    <h1>
        Etes-vous sûr de vouloir supprimer cette catégorie?
    </h1>

    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="POST">
        <fieldset>
            <h2>
                Titre:
            </h2>

            <p> <?php echo ($view['data']['categorie']['categorie']); ?> </p>


            <input type="hidden" name="c" value="<?php echo ($validControllers['categorie']); ?>"/>
            <input type="hidden" name="a" value="<?php echo ($validActions['supprimer']); ?>"/>
            <input type="hidden" name="id_categorie"
                   value="<?php echo ($view['data']['categorie']['id_categorie']); ?>"/>

            <div class="bouton">
                <input type="submit" value="Supprimer"/>
            </div>
        </fieldset>
    </form>
</div>