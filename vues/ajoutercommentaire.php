<div class="article">
    <h1>
        <?php echo $view['data']['view_title']; ?>
    </h1>

    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post">
        <fieldset>
            <label for="nom_auteur">
                Nom:
            </label>
            <br/>
            <input type="text" id="nom_auteur" name="nom_auteur" value="Nom"/>
            <br/>
            <label for="texte">
                Texte:
            </label>
            <br/>
            <textarea cols="75" id="texte" name="texte" rows="15">

            </textarea>

            <input type="hidden" name="c" value="<?php echo ($validControllers['commentaire']); ?>"/>
            <input type="hidden" name="a" value="<?php echo ($validActions['ajouter']); ?>"/>
            <input type="hidden" name="id_article" value="<?php echo ($view['data']['article']['id_article']); ?>"/>

            <div class="bouton">
                <input type="submit" value="Ajouter"/>
            </div>
        </fieldset>
    </form>
</div>
