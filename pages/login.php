<h2 id="login-title">Login / Sign in</h2>

<section id="form-login">
    <form action="" method="POST">
        <div id="login-top">
            <div class="col-3" id="login-username-container">
                <input type="text" name="username" id="username" class="effect" autocomplete="off">
                <label for="username">Nom</label>
                <span style="color:red" hidden=<?= $spanAlert; ?>>Ce champ ne peut être vide.</span>
                <span class="focus-border"></span>
            </div>

            <div class="col-3" id="login-pass-container">
                <input type="password" name="pass" id="pass" class="effect">
                <label for="pass">Mot de passe:</label>
                <span style="color:red" hidden=<?= $spanAlert; ?>>Ce champ ne peut être vide.</span>
                <span class="focus-border"></span>
            </div>
        </div>
        <div id="btn-login-container">
            <button type="submit" name="login">Se connecter</button>
            <button type="submit" name="sign-in">S'enregistrer</button>
        </div>


    </form>
</section>