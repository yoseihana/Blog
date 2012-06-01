<div class="colonneGauche">
    <?php if (count($view['data'] ['articles']) > 0): ?>
    <?php foreach ($view['data']['articles'] as $article): ?>
        <div class="article">
            <div class="comment">
                <p class="lien">
                    <a href="<?php echo Url::voirArticle($article[Article::ID], 'comments'); ?>">Il y
                        a <?php echo $article[Article::NB_COM]; ?> commentaire(s)</a>
                </p>
            </div>

            <h1>
                <a href="<?php echo Url::voirArticle($article[Article::ID]); ?>"><?php echo $article[Article::TITRE]; ?></a>
            </h1>

            <p class="post">
                Poster le <?php echo $article['date_parution'] ?> par Anna
            </p>

            <p>
                <?php echo $article['article'] ?>
            </p>

            <div class="lien">
                <?php if (true): ?>
                <a href="<?php echo Url::modifierArticle($article[Article::ID]); ?>">Modifier</a>
                -
                <a href="<?php echo Url::supprimerArticle($article[Article::ID]); ?>">Supprimer</a>
                -
                <a href="<?php echo Url::ajouterArticle(); ?>">Ajouter
                    un article</a>
                <?php endif; ?>
            </div>
            <div class="lecture">
                <a href="<?php echo Url::voirArticle($article[Article::ID]); ?>">Lire la suite</a>
            </div>
            <div class="comment">
                <p class="lien">
                    <a href="<?php echo Url::ajouterCommentaire(); ?>">Poster un commentaire</a>
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
            <?php foreach ($view['data']['categories'] as $categorie): ?>
            <li>
                <a href="<?php echo Url::voirCategorie($categorie[Categorie::ID]); ?>"
                   title="Voir al catégorie"><?php echo $categorie[Categorie::TITRE]; ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>

</div>

