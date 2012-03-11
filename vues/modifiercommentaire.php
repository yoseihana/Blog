<div class="article">
    <h1>
        <?php echo $c . ' à ' . $a; ?>
    </h1>

    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post">
        <fieldset>
            <label for="nom_auteur">
                Nom:
            </label>
            <br/>
            <input type="text" id="nom_auteur" name="nom_auteur" value="<?php echo ($view['data']['commentaire']['nom_auteur']); ?>"/>
            <br/>
            <label for="texte">
                Texte:
            </label>
            <br/>
            <textarea rows="15" id="texte" cols="75" name="texte">
                <?php echo ($view['data']['commentaire']['texte']); ?>
            </textarea>

            <input type="hidden" name="c" value="<?php echo ($validControllers['commentaire']); ?>"/>
            <input type="hidden" name="a" value="<?php echo ($validActions['modifier']); ?>"/>
            <input type="hidden" name="id_commentaire" value="<?php echo ($view['data']['commentaire']['id_commentaire']); ?>"/>
            <input type="hidden" name="id_article" value="<?php echo ($view['data']['commentaire']['id_article']); ?>"/>

            <div class="bouton">
                <input type="submit" value="Modifier"/>
            </div>
        </fieldset>
    </form>
</div>