<div class="article">
    <h1>
        <?php echo $view['data']['categorie']['categorie']; ?>
    </h1>
    <a href="<?php echo modifierCategorieUrl($view['data']['categorie']['id_categorie']) ?>">Modifier</a>
    -
    <a href="<?php echo supprimerCategorieUrl($view['data']['categorie']['id_categorie']) ?>">Supprimer</a>
    -
    <a href="<?php echo ajouterCategorieUrl($view['data']['categorie']['id_categorie']) ?>">Ajouter une catégorie</a>
</div>