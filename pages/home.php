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

<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=my_anime_list','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // var_dump($pdo);
    

} catch(PDOException $e){
    echo "Connection failed:" . $e->getMessage();
    exit();
} 
var_dump($pdo);
// $pdo->query()
?>