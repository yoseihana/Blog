<div class="article">
    <h1>
        <?php echo $view['data']['view_title']; ?>
    </h1>

    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="post">
        <fieldset>
            <label for="titre">
                Titre:
            </label>
            <br/>
            <input type="text" name="titre" value="Titre"/>
            <br/>
            <label for="id_article">
                ID article:
            </label>
            <br/>
            <input type="text" name="id_article" value="1"/>
            <br/>
            <label for="date">
                Date de parution:
            </label>
            <br/>
            <input type="text" name="date_parution" value="YYYY"/>
            <br/>
            <label for="article">
                Article:
            </label>
            <br/>
            <textarea cols="75" name="article" rows="15">
                Votre article:
            </textarea>
            <br/>
            <label for="commentaire">
                Nombre de commentaire:
            </label>
            <br/>
            <input type="text" name="commentaire" value="0"/>


            <input type="hidden" name="c" value="<?php echo ($validEntities['article']); ?>"/>
            <input type="hidden" name="a" value="<?php echo ($validActions['ajouter']); ?>"/>

            <div class="bouton">
                <input type="submit" value="Ajouter"/>
            </div>
        </fieldset>
    </form>
</div>
