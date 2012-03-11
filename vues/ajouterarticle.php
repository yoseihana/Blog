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
            <input type="text" id="titre" name="titre" value="Titre"/>
            <br/>
            <label for="article">
                Article:
            </label>
            <br/>
            <textarea id="article" cols="75" name="article" rows="15">
                Votre article:
            </textarea>

            <input type="hidden" name="c" value="<?php echo ($validControllers['article']); ?>"/>
            <input type="hidden" name="a" value="<?php echo ($validActions['ajouter']); ?>"/>

            <div class="bouton">
                <input type="submit" value="Ajouter"/>
            </div>
        </fieldset>
    </form>
</div>
