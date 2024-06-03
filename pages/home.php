<?php

if(isset($_POST["logout"]) && empty($_POST["logout"])){
    session_destroy();
}

// var_dump($admin);
$animes = $db->selectAll("anime","App\Models\Anime");

?>
<section id="anime-container">
    <?php foreach($animes as $anime): ?>
        <article class="card">
            <figure style="background-color: <?= $anime->getColor() ?>;">
                <img src=<?= "../imgs/".$anime->getImage(); ?> alt=<?= $anime->getName(); ?>>
            </figure>
            <div class="card-text">
                <h2><?= $anime->getName(); ?></h2>
                <aside class="card-rate">
                    <h3>Note :</h3>
                    <?php for ($i=0; $i < 5; $i++):  ?>
                        <?php if($i < $anime->getRate()): ?>
                            <span class="fa fa-star checked"></span>
                        <?php else: ?>
                            <span class="fa fa-star"></span>
                        <?php endif ?>
                    <?php endfor ?>
                </aside>
                <a href="../public/index.php?p=anime&id=<?= $anime->getId(); ?>">
                    <button class="card-btn">Voir</button>
                </a>
            </div>
        </article>
    <?php endforeach ?>
</section>
