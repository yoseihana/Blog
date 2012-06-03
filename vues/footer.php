<div class="footer">
    <p>
        Annabelle BUFFART 2285 - INPRES 2012
    </p>
    <?php if (!MainController::isAuthenticated()): ?>
    <p>
        <a href="<?php echo Url::connexionMembre(); ?>">Connexion</a> - Annabelle Buffart - Mai 2012
    </p>
    <?php else: ?>
    <p>
        <a href="<?php echo Url::deconnexionMembre(); ?>">Deconnexion</a> - Annabelle Buffart - Mai 2012
    </p>
    <?php endif; ?>

</div>