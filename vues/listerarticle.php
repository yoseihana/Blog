<div class="colonneGauche">
    <?php if (count($view['data'] ['articles']) > 0): ?>
    <?php foreach ($view['data']['articles'] as $article): ?>
        <div class="article">
            <div class="comment">
                <p class="lien">
                    <a href="<?php echo voirArticleUrl($article['id_article'], 'comments'); ?>"/>Il y
                    a <?php echo $article['nb_commentaire']; ?> commentaire(s)</a>
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

    <div class="pagination">
        <?php for ($i = 1; $i <= $view['data']['nbPage']; $i++): ?>
        <a href="index.php?a=lister&c=article&page=<?php echo $i ?>"><?php echo $i ?></a>
        <?php endfor; ?>
    </div>

</div>

<div class="colonneDroite">
    <?php include('apropos.php'); ?>
    <!-- FIN contenu -->

    <?php include('liens.php'); ?>

    <div class="contenu">
        <h1>
            Catégories
        </h1>

        <ul class="lien">
            <?php foreach ($view['data']['article']['categories'] as $categorie): ?>
            <li>
                <?php echo $categorie['categorie']; ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>

