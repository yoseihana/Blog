<div class="article">
    <h1>
        Etes-vous sûr de vouloir supprimer cet article?
    </h1>

    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="POST">
        <fieldset>
            <h1> <?php echo ($view['data']['article']['titre']); ?> </h1>

            <p class="post"> <?php echo ($view['data']['article']['article']); ?> </p>

            <input type="hidden" name="c" value="<?php echo ($validEntities['article']); ?>"/>
            <input type="hidden" name="a" value="<?php echo ($validActions['supprimer']); ?>"/>
            <input type="hidden" name="id_article" value="<?php echo ($view['data']['article']['id_article']); ?>"/>

            <input type="submit" value="Supprimer"/>
        </fieldset>
    </form>
</div>