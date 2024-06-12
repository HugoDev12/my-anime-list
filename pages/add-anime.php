<?php
require_once "../Controller/formAnimeLogic.php";

?>

<h2 class="add-anime-title"><?= $title; ?></h2>
<section class="form-add-anime">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="top-block-add-anime">
            <div class="top-left">
                <div class="col-3">
                    <input class="effect" type="text" name="name" autocomplete="off" value="<?= $name; ?>">
                    <label for="name" class="label-effect">Nom</label>
                    <span style="color:red" class="hiddenAlert" <?= $hiddenAlertName; ?>>Ce champ ne peut être vide.</span>


                </div>

                <div class="col-3">
                    <select name="type" id="type" size="1" class="effect">
                        <option value="Shonen" <?= $select["Shonen"] ?>>Shonen</option>
                        <option value="Seinen" <?= $select["Seinen"] ?>>Seinen</option>
                        <option value="Shojo" <?= $select["Shojo"] ?>>Shojo</option>
                        <option value="Josei" <?= $select["Josei"] ?>>Josei</option>
                        <option value="Kodomomuke" <?= $select["Kodomomuke"] ?>>Kodomomuke</option>
                    </select>
                    <label for="type" class="label-effect"></label>

                </div>
                <div class="col-3 input-rate-container">
                    <input class="effect" type="number" name="rate" id="rate" min="1" max="5" value="<?= $rate; ?>">
                    <label for="rate" class="label-effect">Note (entre 1 et 5)</label>
                    <span style="color:red" class="hiddenAlert" <?= $hiddenAlertRate; ?>>Doit être compris entre 1 et 5 inclus.</span>


                </div>
            </div>
            <aside class="top-right">
                <div class="input-release-date-container">
                    <input type="date" name="release_date" id="release" value="<?= $release; ?>">
                    <label for="release_date">Date de sortie:</label>
                    <span style="color:red" class="hiddenAlert" <?= $hiddenAlertRelease; ?>>Vous devez choisir une date</span>
                </div>
                <label for="synopsis">Synopsis (alternatif)</label>
                <div class="textarea-container">
                    <textarea name="synopsis" id="synopsis" placeholder="..."><?= $synopsis; ?></textarea>
                </div>
            </aside>
        </div>
        <div class="bot-block-add-anime">
            <div class="bot-left">

                
                <label for="color">Couleur de fond:</label>
                <input type="color" id="color" name="color" value="<?= $color; ?>">

                <label for="image">
                    <span>Choisir une image</span>
                <input type="file" id="image" name="image" accept="image/png, image/jpeg" value=<?= $imgInput ?>/>
                </label>
                <span style="color:red" class="hiddenAlert" <?= $hiddenAlertImg; ?>><?= $errorImgMessage ?></span>

                <div class="container-img-added">
                    <span id="img-added"><p><?= $img; ?></p></span>
                    <div id="close-container">
                        <span id="cross"></span>
                    </div>
                </div>

            </div>
            <div class="bot-right">
                <button class="submit-add-anime" type="submit" name="submit-add-anime"><?= $btnContent ?></button>
            </div>
        </div>
    </form>
</section>