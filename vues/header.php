<div id="header">
    <h1>
        <a href="#" title="home">AnNa's Blog</a> <!-- Placer logo -->
    </h1>
    <ul id="nav">
        <li>
            <a href="<?php echo($_SERVER['PHP_SELF']); ?>" title="Retour à la page home">Home</a>
        </li>
        <li>
            <a href="?c=<?php echo $GLOBALS['validEntities']['article']; ?>&a=<?php echo $GLOBALS['validActions']['lister']; ?>">Articles</a>
        </li>
        <li>
            <a href="?c=<?php echo $GLOBALS['validEntities']['commentaire']; ?>&a=<?php echo $GLOBALS['validActions']['lister']; ?>">Commentaires</a>
        </li>
        <li>
            <a href="?c=<?php echo $GLOBALS['validEntities']['categorie']; ?>&a=<?php echo $GLOBALS['validActions']['lister']; ?>">Categorie</a>
        </li>
    </ul>
</div>
