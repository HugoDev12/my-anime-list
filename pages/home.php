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

// try {
//     $pdo = new PDO('mysql:host=localhost;dbname=my_anime_list','root','');
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // var_dump($pdo);
    

// } catch(PDOException $e){
//     echo "Connection failed:" . $e->getMessage();
//     exit();
// } 
// var_dump($pdo);
// $today = new DateTime();
// ------------------- Insertion 1 user ----------------- //
// $insertUser = $pdo->prepare("INSERT INTO user (username,password,email,roles,date) 
//     VALUES (
//     :username,
//     :password,
//     :email,
//     :roles,
//     :date    
//     )
// ");
// $insertUser->bindParam('username', "hugo", PDO::PARAM_STR);
// $insertUser->bindParam('password', "admin", PDO::PARAM_STR);
// $insertUser->bindParam('email', "occelli.hugo@hotmail.fr", PDO::PARAM_STR);
// $insertUser->bindParam('roles', "[ROLE_ADMIN]", PDO::PARAM_STR);
// $insertUser->bindParam('date', strtotime(date("Y-m-d H:i:s")), PDO::PARAM_STR);

// la méthode execute fait aussi le bind param pour éviter les injections SQL, sauf que toutes les valeurs auront PDO::PARAM_STR d'attaché

//raffraichir la page pour l'insertion
// $insertUser->execute([ 
//     "username" => "hugo",
//     "password" => "admin",
//     "email" => "occelli.hugo@hotmail.fr",
//     "roles" => "[ROLE_ADMIN]",
//     "date" => date("Y-m-d H:i:s")
// ]);

//raffraichir la page pour l'insertion
// $insertUser->execute([
//     "username" => "hugo2",
//     "password" => "n\'import",
//     "email" => "yosh.yash@gmail.com",
//     "roles" => "[ROLE_USER]",
//     "date" => date("Y-m-d H:i:s")
// ]);


// var_dump($pdo, $insertUser);
// $pdo->query()
?>