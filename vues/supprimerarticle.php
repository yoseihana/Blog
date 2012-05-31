<div class="article">
    <h1>
        Etes-vous sûr de vouloir supprimer cet article?
    </h1>

    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="POST">
        <fieldset>
            <h1> <?php echo ($view['data']['article'][Article::TITRE]); ?> </h1>

            <p class="post"> <?php echo ($view['data']['article']['article']); ?> </p>

            <input type="hidden" name="c" value="<?php echo (MainController::getLastController()); ?>"/>
            <input type="hidden" name="a" value="<?php echo (MainController::getLastAction()); ?>"/>
            <input type="hidden" name="id_article" value="<?php echo ($view['data']['article'][Article::ID]); ?>"/>

            <input type="submit" value="Supprimer"/>
        </fieldset>
    </form>
</div>