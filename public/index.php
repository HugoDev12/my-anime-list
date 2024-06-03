<?php
session_start();
$admin = false;
if(isset($_SESSION) && 
    isset($_SESSION["user"]["role"]) && 
    $_SESSION["user"]["role"] === "[ROLE_ADMIN]")
{
    $admin = true;
}

use App\Database;

require '../app/Autoloader.php';
App\Autoloader::register();

$db = new Database();
$today = new DateTime();

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
if($route === "login"){
    require '../pages/login.php';
}
if($route === "anime"){
    require '../pages/anime.php';
}
if($route === "add-anime" && $admin){
    require '../pages/add-anime.php';
}

// if($route === "update-anime"){
//     require '../pages/update-anime.php';
// }



$content = ob_get_clean(); // et là il va être affiché
require '../pages/templates/default.php';


?>
