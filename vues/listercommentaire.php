<?php if (count($view['data'] ['articles'])): ?>
<?php foreach ($view['data']['articles'] as $article): ?>
    <div class="article">
        <div class="comment">
            <p class="lien">
                <a href="?c=<?php echo $GLOBALS['validEntities']['commentaire']; ?>&a=<?php echo $GLOBALS['validActions']['voir']; ?>&id_commentaire=<?php echo($view['data']['commentaire']['id_commentaire']); ?>"><?php echo($article['nb_commentaire']); ?></a>
            </p>
        </div>
        <h1>
            <a href="?c=<?php echo $GLOBALS['validEntities']['article']; ?>&a=<?php echo $GLOBALS['validActions']['voir']; ?>&id_article=<?php echo($article['id_article']); ?>"><?php echo $article['titre']; ?></a>
        </h1>

        <p class="post">
            Poster le <?php echo $article['date_parution'] ?> par Anna
        </p>

        <p>
            <?php echo $article['article'] ?>
        </p>
        <?php if ($connected): ?>
        <a href="?c=<?php echo $GLOBALS['validEntities']['article']; ?>&a=<?php echo $GLOBALS['validActions']['modifier']; ?>&id_article=<?php echo($article['id_article']); ?>">Modifier</a>
        -
        <a href="?c=<?php echo $GLOBALS['validEntities']['article']; ?>&a=<?php echo $GLOBALS['validActions']['supprimer']; ?>&id_article=<?php echo($article['id_article']); ?>">Supprimer</a>
        -
        <a href="?c=<?php echo $GLOBALS['validEntities']['article']; ?>&a=<?php echo $GLOBALS['validActions']['ajouter']; ?>">Ajouter
            un article</a>
        <?php endif; ?>
        <div class="lecture">
            <a href="?c=<?php echo $GLOBALS['validEntities']['article']; ?>&a=<?php echo $GLOBALS['validActions']['voir']; ?>&id_article=<?php echo($article['id_article']); ?>">Lire
                la suite</a>
        </div>
        <?php if (count($view['data'] ['commentaires'])): ?>
        <?php foreach ($view['data']['commentaires'] as $commentaire): ?>
            <p class="post">
                Poster le <?php echo $commentaire['date'] ?> par Anna
            </p>
            <p>
                <?php echo $commentaire['texte'] ?>
            </p>
            <?php if ($connected): ?>
                <a href="?c=<?php echo $GLOBALS['validEntities']['commentaire']; ?>&a=<?php echo $GLOBALS['validActions']['modifier']; ?>&id_commentaire=<?php echo($commentaire['id_article']); ?>">Modifier</a>
                -
                <a href="?c=<?php echo $GLOBALS['validEntities']['commentaire']; ?>&a=<?php echo $GLOBALS['validActions']['supprimer']; ?>&id_commentaire=<?php echo($commentaire['id_commentaire']); ?>">Supprimer</a>

                <?php endif; ?>

            <?php endforeach; ?>
        <?php endif; ?>
        <div class="comment">
            <p class="lien">
                <a href="?c=<?php echo $GLOBALS['validEntities']['commentaire']; ?>&a=<?php echo $GLOBALS['validActions']['ajouter']; ?>">Ajouter
                    un commentaire</a>
            </p>
        </div>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

