<div class="article">
    <h1>
        <?php echo $view['data']['view_title']; ?>
    </h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <fieldset>
            <label from="email">
                Email
            </label>
            <input type="text" name="email" id="email"/> <br/>
            <label from="mdp">
                Mot de passe
            </label>
            <input type="password" name="mdp" id="mdp"/> <br/>
            <input type="submit" value="verifier"/>
        </fieldset>

        <input type="hidden" name="a" value="<?php echo $validActions['connecter'] ?>"/>
        <input type="hidden" name="c" value="<?php echo $validEntities['membre'] ?>"/>

    </form>
</div>