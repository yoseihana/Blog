<div class="article">
    <h1>
        <?php echo $view['data']['view_title']; ?>
    </h1>

    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post">
        <fieldset>
            <label for="nom">
                Nom:
            </label>
            <br/>
            <input type="text" id="nom" name="nom" value="<?php echo ($view['data']['commentaire'][Comment::NOM]); ?>"/>
            <br/>
            <label for="text">
                Texte:
            </label>
            <br/>
            <textarea rows="15" id="text" cols="75" name="text">
                <?php echo ($view['data']['commentaire']['texte']); ?>
            </textarea>

            <input type="hidden" name="c" value="<?php echo (MainController::getLastController()); ?>"/>
            <input type="hidden" name="a" value="<?php echo (MainController::getLastAction()); ?>"/>
            <input type="hidden" name="id_commentaire"
                   value="<?php echo ($view['data']['commentaire'][Comment::ID_COMMENTAIRE]); ?>"/>
            <input type="hidden" name="id_article"
                   value="<?php echo ($view['data']['commentaire'][Comment::ID_ARTICLE]); ?>"/>

            <div class="bouton">
                <input type="submit" value="Modifier"/>
            </div>
        </fieldset>
    </form>
</div>