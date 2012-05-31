<div class="article">
    <h1>
        Etes-vous sûr de vouloir supprimer ce commentaire?
    </h1>

    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="POST">
        <fieldset>
            <h2> Auteur:</h2>

            <p class="post"> <?php echo ($view['data']['commentaire'][Comment::NOM]); ?> </p>
            <br/>

            <h2> Commentaire:</h2>

            <p class="post"> <?php echo ($view['data']['commentaire'][Comment::TEXT]); ?> </p>

            <input type="hidden" name="c" value="<?php echo (MainController::getLastController()); ?>"/>
            <input type="hidden" name="a" value="<?php echo (MainController::getLastAction()); ?>"/>
            <input type="hidden" name="id_commentaire"
                   value="<?php echo ($view['data']['commentaire'][Comment::ID_COMMENTAIRE]); ?>"/>
            <input type="hidden" name="id_article" value="<?php echo ($view['data']['article'][Article::ID]); ?>"/>

            <input type="submit" value="Supprimer"/>
        </fieldset>
    </form>
</div>