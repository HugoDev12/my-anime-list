<?php

use App\Database;
use App\Models\Anime;



$hiddenAlertName = "hidden";
$hiddenAlertImg = "hidden";
$hiddenAlertRate = "hidden";
$hiddenAlertRelease = "hidden";


if(isset($_POST["submit-add-anime"])){
    unset($_POST["submit-add-anime"]);

    // Set parameters for the insertion later
    $today = new DateTime();
    $params = $_POST;
    $params["slug"] = $params["name"];
    $params["date"] = $today->format("Y-m-d H:i:s"); 

    // unset nullable / autocompleted values
    unset($_POST["synopsis"]);
    unset($_POST["type"]);
    unset($_POST["color"]);

    $validForm = !in_array("", array_values($_POST));

    if($validForm){


        $values[] = $_POST["name"];
        $values[] = $today->format("Y-m-d H:i:s");

        $db = new Database();
        $anime = $db->insert("anime",$params);

        // à continuer ici pour l'image à importer dans le dossier imgs

    }else{
        foreach($_POST as $key=>$value){
            switch ($key) {
                case 'name':
                    strlen($value) === 0 ? $hiddenAlertName = "" : $hiddenAlertName = "hidden";
                case 'rate':
                    intval($value) < 0 || intval($value) > 5 || empty($value) ? $hiddenAlertRate = "" : $hiddenAlertRate = "hidden";
                case 'img-anime':
                    strlen($value) === 0 ? $hiddenAlertImg = "" : $hiddenAlertImg = "hidden";
                case 'release':
                    strlen($value) === 0 ? $hiddenAlertRelease = "" : $hiddenAlertRelease = "hidden";
            }
        }
    }
}

?>


<h2 id="add-anime-title">Ajouter un anime</h2>
<section id="form-add-anime">
    <form action="" method="POST">
        <div id="top-block-add-anime">
            <div id="top-left">
                <div class="col-3" id="input-name-add-anime">
                    <input class="effect" type="text" name="name" autocomplete="off">
                    <label for="name">Nom</label>
                    <span style="color:red" class="hiddenAlert" <?= $hiddenAlertName; ?>>Ce champ ne peut être vide.</span>


                </div>

                <div class="col-3" id="input-select-type">
                    <select name="type" id="type" size="1" class="effect">
                        <option value="Shonen">Shonen</option>
                        <option value="Seinen">Seinen</option>
                        <option value="Shojo">Shojo</option>
                        <option value="Josei">Josei</option>
                        <option value="Kodomomuke">Kodomomuke</option>
                    </select>
                    <label for="type">Type</label>
                    <span class="focus-border"></span>

                </div>
                <div class="col-3" id="input-rate-container">
                    <input class="effect" type="number" name="rate" id="rate" min="0" max="5">
                    <label for="rate">Note (entre 0 et 5)</label>
                    <span style="color:red" class="hiddenAlert" <?= $hiddenAlertRate; ?>>Doit être compris entre 0 et 5 inclus.</span>


                </div>
            </div>
            <aside id="top-right">
                <div id="input-release-date-container">
                    <input type="date" name="release_date" id="release">
                    <label for="release_date">Date de sortie:</label>
                    <span style="color:red" class="hiddenAlert" <?= $hiddenAlertRelease; ?>>Vous devez choisir une date</span>
                </div>
                <label for="synopsis">Synopsis (alternatif)</label>
                <div id="textarea-container">
                    <textarea name="synopsis" id="synopsis" placeholder="..."></textarea>
                </div>
            </aside>
        </div>
        <div id="bot-block-add-anime">
            <div id="bot-left">

                
                <label for="color">Couleur de fond:</label>
                <input type="color" id="color" name="color" value="#ff0000">

                <label for="image">
                    <span>Choisir une image</span>
                <input type="file" id="image" name="image" accept="image/png, image/jpeg" />
                </label>
                <span style="color:red" class="hiddenAlert" <?= $hiddenAlertImg; ?>>Vous devez choisir une image</span>

                <div id="container-img-added">
                    <span id="img-added"><p></p></span>
                </div>

            </div>
            <div id="bot-right">
                <button id="submit-add-anime" type="submit" name="submit-add-anime">Ajouter</button>
            </div>
        </div>
    </form>
</section>