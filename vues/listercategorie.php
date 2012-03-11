<?php if (count($view['data'] ['categories'])): ?>
<?php foreach ($view['data']['categories'] as $categorie): ?>
    <div class="article">
        <h1>
            <a href="<?php echo voirCategorieUrl($categorie['id_categorie']) ?>"><?php echo $categorie['categorie']; ?></a>
        </h1>
        <?php if ($connected): ?>
        <a href="<?php echo modifierCategorieUrl($categorie['id_categorie']) ?>">Modifier</a>
        -
        <a href="<?php echo supprimerCategorieUrl($categorie['id_categorie']) ?>">Supprimer</a>
        -
        <a href="<?php echo ajouterCategorieUrl($categorie['id_categorie']) ?>">Ajouter une catégorie</a>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
<?php endif; ?>

