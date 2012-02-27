<?php if (count($view['data'] ['categories'])): ?>
<?php foreach ($view['data']['categories'] as $categorie): ?>
    <div class="article">
        <h1>
            <a href="?c=<?php echo $GLOBALS['validEntities']['categorie']; ?>&a=<?php echo $GLOBALS['validActions']['voir']; ?>&id_categorie=<?php echo($categorie['id_categorie']); ?>"><?php echo $categorie['categorie']; ?></a>
        </h1>
        <?php if ($connected): ?>
        <a href="?c=<?php echo $GLOBALS['validEntities']['categorie']; ?>&a=<?php echo $GLOBALS['validActions']['modifier']; ?>&id_categorie=<?php echo($categorie['id_categorie']); ?>">Modifier</a>
        -
        <a href="?c=<?php echo $GLOBALS['validEntities']['categorie']; ?>&a=<?php echo $GLOBALS['validActions']['supprimer']; ?>&id_categorie=<?php echo($categorie['id_categorie']); ?>">Supprimer</a>
        -
        <a href="?c=<?php echo $GLOBALS['validEntities']['categorie']; ?>&a=<?php echo $GLOBALS['validActions']['ajouter']; ?>">Ajouter
            ue catégorie</a>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

