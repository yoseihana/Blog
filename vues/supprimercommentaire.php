<div class="article">
    <h1>
        Etes-vous sûr de vouloir supprimer ce commentaire?
    </h1>

    <form action="<?php echo ($_SERVER['PHP_SELF']) ?>" method="POST">
        <fieldset>
            <h2> Auteur:</h2>

            <p class="post"> <?php echo ($view['data']['commentaire']['nom_auteur']); ?> </p>
            </br>
            <h2> Commentaire:</h2>

            <p class="post"> <?php echo ($view['data']['commentaire']['texte']); ?> </p>

            <input type="hidden" name="c" value="<?php echo ($validControllers['commentaire']); ?>"/>
            <input type="hidden" name="a" value="<?php echo ($validActions['supprimer']); ?>"/>
            <input type="hidden" name="id_commentaire"
                   value="<?php echo ($view['data']['commentaire']['id_commentaire']); ?>"/>

            <input type="submit" value="Supprimer"/>
        </fieldset>
    </form>
</div>