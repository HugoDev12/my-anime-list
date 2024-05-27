<?php

if(isset($_GET["p"])){
    $route = $_GET["p"];
} else {
    $route = "home";
}

// ob_start() et ob_get_clean() permet de stocker tout ce qui va être afficher dans une variable --> $content ici
ob_start();
if($route === "home"){
    require '../pages/home.php'; // le contenu de la home page va être stocker ici
}

$content = ob_get_clean(); // et là il va être affiché
require '../pages/templates/default.php';

?>
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" type="image/x-icon" href="../imgs/f8d57c53ea2a50fdbd721c6191315fb5.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>MyAnimeList</title>
</head>
<body>
    <header>
        <div id="header-block">
            <h1>MyAnimeList</h1>
            <nav>
                <ul>
                    <li>
                        <div><a href="index.php" class="nav-item">Accueil</a></div>
                    </li>
                    <li>
                        <div id="contact-nav-item"><a href="#" class="nav-item" id="contact-item">Contact</a></div>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <section>
            <article class="card" id="naruto">
                <figure>
                    <img src="../imgs/94c030b99797a631acd6e9f3a858edf2-removebg-preview.png" alt="naruto" loading="lazy">
                </figure>
                <div class="card-text">
                    <h2>Naruto</h2>
                    <aside class="card-rate">
                        <h3>Note :</h3>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                    </aside>
                    <button class="card-btn">Voir</button>
                </div>
            </article>
        </section>

    </main>
    <footer>
        <h3>Mes réseaux</h3>
        <div class="social-icon-container"><a href="#" class="fa fa-linkedin"></a></div>
        <div class="social-icon-container"><a href="#" class="fa fa-twitter"></a></div>
        <div class="social-icon-container"><a href="#" class="fa fa-github"></a></div>
    </footer>
</body>
</html>
-->
