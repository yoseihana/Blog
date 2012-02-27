<div class="article">
    <div class="comment">
        <p class="lien">
            <a href="?c=<?php echo $GLOBALS['validEntities']['commentaire']; ?>&a=<?php echo $GLOBALS['validActions']['voir']; ?>&id_commentaire=<?php echo($view['data']['commentaire']['id_commentaire']); ?>"><?php echo($article['nb_commentaire']); ?></a>
        </p>
    </div>
    <h1>
        <?php echo $view['data']['article']['titre']; ?>
    </h1>

    <p class="post">
        Poster le <?php echo $view['data']['article']['date_parution'] ?> par Anna
    </p>

    <p>
        <?php echo $view['data']['article']['article'] ?>
    </p>
    <a href="?c=<?php echo $GLOBALS['validEntities']['article']; ?>&a=<?php echo $GLOBALS['validActions']['modifier']; ?>&id_article=<?php echo($view['data']['article']['id_article']); ?>">modifier</a>
    -
    <a href="?c=<?php echo $GLOBALS['validEntities']['article']; ?>&a=<?php echo $GLOBALS['validActions']['supprimer']; ?>&id_article=<?php echo($view['data']['article']['id_article']); ?>">supprimer</a>

    <div class="comment">
        <p class="lien">
            <!--<a href="./article.html" title="commentaires">2</a>-->
            <a href="?c=<?php echo $GLOBALS['validEntities']['commentaire']; ?>&a=<?php echo $GLOBALS['validActions']['ajouter']; ?>&id_article=<?php echo($view['data']['article']['id_article']); ?>">Poster
                un commentaire</a>
        </p>
    </div>
</div>