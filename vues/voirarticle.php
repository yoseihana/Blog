<div class="colonneGauche">
    <div class="article">
        <h1 class="voir">
            <?php echo $view['data']['article']['titre']; ?>
        </h1>

        <p class="post">
            Poster le <?php echo $view['data']['article']['date_parution'] ?> par Anna
        </p>

        <p>
            <?php echo $view['data']['article']['article'] ?>
        </p>
        <?php if ($connected): ?>
        <div class="lien">
            <a href="<?php echo modifierArticleUrl($view['data']['article']['id_article']) ?>">Modifier</a>
            -
            <a href="<?php echo supprimerArticleUrl($view['data']['article']['id_article']) ?>">Supprimer</a>
            -
            <a href="<?php echo ajouterArticleUrl($view['data']['article']['id_article']) ?>">Ajouter un article</a>
        </div>

        <?php endif; ?>
    </div>

    <div class="article">
        <!-- Liste des commentaires -->
        <div id="comments"></div>
        <h1 class="voir">
            Commentaires
        </h1>
        <?php if (count($view['data']['article']['commentaires']) > 0): ?>
        <?php foreach ($view['data']['article']['commentaires'] as $commentaire): ?>
            <p class="post">
                Poster le <?php echo $commentaire['date']; ?> par <?php echo $commentaire['nom_auteur']; ?>
            </p>
            <p>
                <?php echo($commentaire['texte']); ?>
            </p>
            <?php if ($connected): ?>
                <a href="<?php echo modifierCommentaireUrl($commentaire['id_commentaire']); ?>"> Modifier</a>
                -
                <a href="<?php echo supprimerCommentaireUrl($commentaire['id_commentaire']); ?>">Supprimer</a>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>
        <div class="comment">
            <p class="lien">
                <a href="<?php echo ajouterCommentaireUrl($view['data']['article']['id_article']); ?>">Ajouter un
                    commentaire</a>
            </p>
        </div>
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
