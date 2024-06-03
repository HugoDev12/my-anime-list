<?php

$passwordErrorMsg = "";
$spanAlertPw = "hidden";
$emailErrorMsg = "";
$spanAlertEmail = "hidden";
$errorMsg = "";
$spanAlertGlobal = "hidden";

if(isset($_POST["sign-in"]) && empty($_POST["sign-in"])){
    
    // email
    $validEmail = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    if(!$validEmail){
        $emailErrorMsg = "L'email rentré n'est pas valide.";
        $spanAlertEmail = "";
    } 

    // password
    $validPw = false;
    $pass = htmlspecialchars($_POST["pass"]);
    if(strlen($pass) === 0 || strlen($pass) < 6){
        $passwordErrorMsg = "Vous devez définir un mot de passe avec au moins 6 caractères.";
        $spanAlertPw = "";
    } else {
        $validPw = true;
    }
    if(str_contains($pass, ' ')){
        $passwordErrorMsg = "Le mot de passe ne doit pas contenir d'espaces.";
        $spanAlertPw = "";
    }else {
        $validPw = true;
    }// d'autres conditions avec les regex

    if($validEmail && $validPw){

        $hashPass = password_hash($pass, PASSWORD_DEFAULT);

        $params["email"] = $validEmail;
        $params["password"] = $hashPass;
        $params["roles"] = "[ROLE_ADMIN]";
        $params["date"] = $today->format("Y-m-d H-i-s");

        // var_dump($params);

        $user = $db->insert("user", $params);
        $_SESSION["user"] = [
            "email" => $user->getEmail(),
            "role" => $user->getRoles()
        ];
        header("Location: index.php?p=home");
        exit();
        // ok jusque là
    }
}

if(isset($_POST["login"]) && empty($_POST["login"])){

    // email
    $validEmail = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    if(!$validEmail){
        $emailErrorMsg = "L'email rentré n'est pas valide.";
        $spanAlertEmail = "";
    } 

    // get user with email
    $user = $db->select("email", $validEmail, "user", "App\Models\User");

    // verity if there is user and if user's password match with hash password in db
    if($user && password_verify($_POST["pass"], $user->getPassword())){
        $_SESSION["user"] = [
            "email" => $user->getEmail(),
            "role" => $user->getRoles()
        ];
        header("Location: index.php?p=home");
        exit();
    } else {
        $spanAlertGlobal = "";
        $errorMsg = "Identifiants invalides.";
    }

}




?>
<h2 id="login-title">Login / Sign in</h2>

<section id="form-login">
    <form action="" method="POST">
        <div id="login-top">
            <div class="col-3" id="login-email-container">
                <input type="text" name="email" id="email" class="effect" autocomplete="off">
                <label for="email">Email</label>
                <span style="color:red" <?= $spanAlertEmail; ?>><?= $emailErrorMsg; ?></span>
            </div>

            <div class="col-3" id="login-pass-container">
                <input type="password" name="pass" id="pass" class="effect">
                <label for="pass">Mot de passe:</label>
                <span style="color:red" <?= $spanAlertPw; ?>><?= $passwordErrorMsg; ?></span>
            </div>
            <span style="color:red" <?= $spanAlertGlobal; ?>><?= $errorMsg; ?></span>

        </div>
        <div id="btn-login-container">
            <button type="submit" name="login">Se connecter</button>
            <button type="submit" name="sign-in">S'enregistrer</button>
        </div>


    </form>
</section>