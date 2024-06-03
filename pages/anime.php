<?php
var_dump($admin);
$anime = $db->select("id", $_GET['id'], "anime", "App\Models\Anime");
// var_dump($anime);

if(isset($_POST["delete"]) && empty($_POST["delete"])){
    // htmlspecialchars($_POST["delete"], ENT_QUOTES);
    $db->delete($anime->getId(), "anime", $anime->getImage());
    header("Location: index.php?p=home");
    exit;
}

?>

<section>
    <h2><?= $anime->getName(); ?></h2>
    <div id="anime-content">   
        <div>
            <figure>
                <img src="../imgs/<?= $anime->getImage(); ?>" alt="<?= $anime->getName(); ?>">
            </figure>
        </div>

        <aside>
            <?php  if($admin): ?>
                <form action="../public/index.php?p=add-anime" method="post" id="update-anime">
                    <input type="text" name="anime-id" value="<?= $anime->getId(); ?>" hidden>
                    <button class="card-btn" name="update-anime" type="submit">Modifier</button>
                </form>

                <form action="" method="post" id="delete-anime">
                    <button class="card-btn" name="delete" type="submit">Supprimer</button>
                </form>
            <?php endif ?>

            <h3>Date de sortie : <?= $anime->getRelease_date(); ?> </h3>
            <h3>Catégorie : <?= $anime->getType(); ?></h3>
            <h3>Note : <?= $anime->getRate(); ?>/5</h3>

            <h3>Synopsis: </h3>
            <?php if(strlen($anime->getSynopsis()) === 0): ?>
                <p>Aucune synopsis ajouté pour le moment.</p>
            <?php else: ?>
                <p><?= $anime->getSynopsis(); ?></p>
            <?php endif ?>

        </aside>
    </div>

</section>






