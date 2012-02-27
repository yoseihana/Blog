<div class="article">
    <h1>
        <?php echo $c . ' à ' . $a; ?>
    </h1>

    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post">
        <fieldset>
            <label for="titre">
                Titre:
            </label>
            <br/>
            <input type="text" name="titre" value="<?php echo ($view['data']['article']['titre']); ?>" size="75"/>
            <br/>
            <label for="article">
                Article:
            </label>
            <br/>
            <textarea rows="15" cols="75" name="article">
                <?php echo ($view['data']['article']['article']); ?>
            </textarea>

            <input type="hidden" name="c" value="<?php echo ($validEntities['article']); ?>"/>
            <input type="hidden" name="a" value="<?php echo ($validActions['modifier']); ?>"/>
            <input type="hidden" name="id_article" value="<?php echo ($view['data']['article']['id_article']); ?>"/>

            <div class="bouton">
                <input type="submit" value="Modifier"/>
            </div>
        </fieldset>
    </form>
</div>