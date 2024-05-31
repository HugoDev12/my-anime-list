<?php
require '../app/Autoloader.php';
App\Autoloader::register();


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
if($route === "add-anime"){
    require '../pages/add-anime.php';
}
if($route === "login"){
    require '../pages/login.php';
}

$content = ob_get_clean(); // et là il va être affiché
require '../pages/templates/default.php';

?>
