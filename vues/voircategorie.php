<div class="article">
    <h1>
        <?php echo $view['data']['categorie']['categorie']; ?>
    </h1>
    <a href="?c=<?php echo $GLOBALS['validEntities']['categorie']; ?>&a=<?php echo $GLOBALS['validActions']['modifier']; ?>&id_categorie=<?php echo($view['data']['categorie']['id_categorie']); ?>">Modifier</a>
    -
    <a href="?c=<?php echo $GLOBALS['validEntities']['categorie']; ?>&a=<?php echo $GLOBALS['validActions']['supprimer']; ?>&id_categorie=<?php echo($view['data']['categorie']['id_categorie']); ?>">Supprimer</a>
    -
    <a href="?c=<?php echo $GLOBALS['validEntities']['categorie']; ?>&a=<?php echo $GLOBALS['validActions']['ajouter']; ?>&id_article=<?php echo($view['data']['categorie']['id_categorie']); ?>">Ajouter
        une catégorie</a>
</div>