<div class="article">
    <h1>
        Etes-vous sûr de vouloir supprimer cette catégorie?
    </h1>

    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="POST">
        <fieldset>
            <h2>
                Titre:
            </h2>

            <p> <?php echo ($view['data']['categorie'][Categorie::TITRE]); ?> </p>


            <input type="hidden" name="c" value="<?php echo (MainController::getLastController()); ?>"/>
            <input type="hidden" name="a" value="<?php echo (MainController::getLastAction()); ?>"/>
            <input type="hidden" name="id_categorie"
                   value="<?php echo ($view['data']['categorie'][Categorie::ID]); ?>"/>

            <div class="bouton">
                <input type="submit" value="Supprimer"/>
            </div>
        </fieldset>
    </form>
</div>