<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/all.css">
    <link rel="stylesheet" href="../../public/css/home.css">
    <link rel="stylesheet" href="../../public/css/anime.css">
    <link rel="stylesheet" href="../../public/css/add-anime.css">
    <link rel="stylesheet" href="../../public/css/login.css">
    <link rel="icon" type="image/x-icon" href="../../imgs/f8d57c53ea2a50fdbd721c6191315fb5.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> <!-- Pour les classes fa (logos) -->
    <title>MyAnimeList</title>
</head>
<body>
    <header>
        <div id="header-block">
            <h1>MyAnimeList</h1>
            <?php if($_SESSION): ?>
                <aside id="logout">
                    <form action="" method="POST">
                        <button type="submit" name="logout">Logout</button>
                    </form>
                </aside>
            <?php else: ?>
                <aside id="login">
                    <a href="../../public/index.php?p=login">Login</a>
                </aside>
            <?php endif; ?>
            <nav>
                <ul>
                    <li>
                        <div><a href="../../public/index.php?p=home" class="nav-item">Accueil</a></div>
                    </li>
                    <li>
                        <div id="contact-nav-item"><a href="#" class="nav-item" id="contact-item">Contact</a></div>
                    </li>
                    <?php if($admin): ?>
                    <li>
                        <div id="contact-nav-item"><a href="../../public/index.php?p=add-anime" class="nav-item" id="contact-item">Ajouter</a></div>
                    </li>
                    <?php endif ?>
                </ul>
            </nav>
        </div>
    </header>
    <main>

        <?= $content; ?>

    </main>
    <footer>
        <h3>Mes réseaux</h3>
        <div class="social-icon-container"><a href="#" class="fa fa-linkedin"></a></div>
        <div class="social-icon-container"><a href="#" class="fa fa-twitter"></a></div>
        <div class="social-icon-container"><a href="#" class="fa fa-github"></a></div>
    </footer>
    <script src="/public/js/form-add-anime.js"></script>
</body>
</html>
