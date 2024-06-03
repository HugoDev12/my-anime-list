<?php

use App\Database;
use App\Models\Anime;
use App\Image;

// var_dump($admin);

// form alerts
$hiddenAlertName = "hidden";
$hiddenAlertImg = "hidden";
$hiddenAlertRate = "hidden";
$hiddenAlertRelease = "hidden";
$errorImgMessage = "";

// form values
$name = "";
$type = "";
$img = "";
$imgInput= "";
$rate = "";
$color = "#ff6666";
$release = "";
$synopsis = "";
$title = "Ajouter un anime";
$btnContent = "Ajouter";
$select = [
    "Shonen"=> "",
    "Seinen" => "",
    "Shojo" => "",
    "Josei" => "",
    "Kodomomuke" => ""
];


// case we update anime
if(isset($_POST["update-anime"]) && empty($_POST["update-anime"])){

    $id = htmlspecialchars($_POST["anime-id"], ENT_QUOTES);

    $updateAnime = $db->select("id", $id, "anime", "App\Models\Anime");


    $title = "Modifier un anime"; //à voir
    $btnContent = "Modifier"; //à voir
    $name = $updateAnime->getName();
    $type = $updateAnime->getType();
    $img = $updateAnime->getImage();
    $rate = $updateAnime->getRate();
    $color = $updateAnime->getColor();
    $release = $updateAnime->getRelease_date();
    $synopsis = $updateAnime->getSynopsis();
    $_SESSION["update-anime-id"] = $updateAnime->getId();
    $_SESSION["anime-image"] = $updateAnime->getImage();

}



if(isset($_POST["submit-add-anime"])){
    unset($_POST["submit-add-anime"]);

    // Set parameters for the insertion later
    $params = $_POST;
    $params["slug"] = $params["name"];
    $params["date"] = $today->format("Y-m-d H:i:s"); 

    $validImage = false;
    $imgFile;

    if(isset($_SESSION["update-anime-id"])){ //case we update anime
        $updateAnime = true;
        $title = "Modifier un anime";
        $btnContent = "Modifier";
    }

  
    // check for image file
    if(isset($_FILES["image"]) && !empty($_FILES["image"]["name"])){

        $imgFile = new Image($_FILES["image"]);

        // $command = escapeshellcmd("python ../RemoveBg/remove_bg ". join(" ", $_FILES["image"]));
        // exec($command, $output, $resultCode);

        // echo"<pre>";
        // var_dump($imgFile->test2()); // //ok pour récupérer l'output du fichier python
        // echo"</pre>";

        if($imgFile->error()){
            $hiddenAlertImg = "";
            $errorImgMessage = $imgFile->error();
        } else {
            // case all went good
            $params["image"] = $_FILES["image"]["name"];
            $validImage = true;
        }

    } else{
        if(isset($updateAnime)){
            $params["image"] = $_SESSION["anime-image"];
            $validImage = true;
        } else {
            $hiddenAlertImg = "";
            $errorImgMessage = "Vous dever choisir une image";
        }

    }

    // unset nullable / autocompleted values
    unset($params["synopsis"]);
    unset($params["type"]);
    unset($params["color"]);

    // check if there is no empty values in form datas and if image is correctly uploaded
    $validForm = !in_array("", array_values($params)) && $validImage;

    if($validForm){

        // now set nullable / autocompleted values in $params
        $params["synopsis"] = $_POST["synopsis"];
        $params["type"] = $_POST["type"];
        $params["color"] = $_POST["color"];

      

        // update anime
        if(isset($updateAnime)){
            $update = $db->update($_SESSION["update-anime-id"], "anime", $params);
            if(isset($_FILES["image"])  && !empty($_FILES["image"]["name"])){
                $imgFile->replace($_SESSION["anime-image"]);
            }
            unset($_SESSION["anime-image"]);
            unset($_SESSION["change-image"]);
            header("Location: index.php?p=home");
            exit();
        // create anime
        }else{
            $anime = $db->insert("anime", $params);
            // upload image in imgs folder
            $imgFile->upload();
            // redirect to home 
            // add message to confirm anime added (later with session)
            header("Location: index.php?p=home");
            exit;
        }
      

    }else{
        foreach($_POST as $key=>$value){
            if($key === "name"){
                if(empty($value)){
                    $hiddenAlertName = "";
                    var_dump($hiddenAlertName);
                }else {
                    $hiddenAlertName = "hidden";
                    $name = $value;
                }
            }
            if($key === "type"){
                in_array($value, array_keys($select)) && $select[$value] = "Selected";
            }
            if($key === "rate"){    
                if(intval($value) < 1 || intval($value) > 5 || empty($value)){
                    $hiddenAlertRate = "";
                }else {
                    $hiddenAlertRate = "hidden";
                    $rate = $value;
                }
            }
            if($key === "release_date"){
                if(empty($value)){
                    $hiddenAlertRelease = "";
                }else {
                    $hiddenAlertRelease = "hidden";
                    $release = $value;
                }
            }
            if($key === "synopsis"){
                !empty($value) && $synopsis = $value;
            }
            if($key === "color"){
                $color = $value;
            }
        }
    }
}

?>