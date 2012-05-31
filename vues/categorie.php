<div class="contenu">
    <h1>
        Catégories
    </h1>

    <ul class="lien">
        <?php foreach ($view['data']['categories'] as $categorie): ?>
        <li>
            <?php echo $categorie[Categorie::TITRE]; ?>
        </li>
        <?php endforeach; ?>
    </ul>
</div>