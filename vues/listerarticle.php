<?php if (count($view['data'] ['articles']) > 0): ?>
<?php foreach ($view['data']['articles'] as $article): ?>
    <div class="article">
        <div class="comment">
            <p class="lien">
                <a href="<?php echo voirArticleUrl($article['id_article'], 'comments'); ?>"/><?php echo $article['nb_commentaire']; ?></a>
            </p>
        </div>

        <h1>
            <a href="<?php echo voirArticleUrl($article['id_article']); ?>"><?php echo $article['titre']; ?></a>
        </h1>

        <p class="post">
            Poster le <?php echo $article['date_parution'] ?> par Anna
        </p>

        <p>
            <?php echo $article['article'] ?>
        </p>

        <div class="lien">
            <?php if ($connected): ?>
            <a href="<?php echo modifierArticleUrl($article['id_article']); ?>">Modifier</a>
            -
            <a href="<?php echo supprimerArticleUrl($article['id_article']); ?>">Supprimer</a>
            -
            <a href="<?php echo ajouterArticleUrl(); ?>">Ajouter
                un article</a>
            <?php endif; ?>
        </div>
        <div class="lecture">
            <a href="<?php echo voirArticleUrl($article['id_article']); ?>">Lire la suite</a>
        </div>
        <div class="comment">
            <p class="lien">
                <a href="<?php echo ajouterCommentaireUrl(); ?>">Poster un commentaire</a>
            </p>
        </div>
    </div>

    <?php endforeach; ?>
<?php endif; ?>

