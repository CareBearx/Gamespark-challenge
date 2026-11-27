<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cantarell:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <link rel="icon" href="assets/img/favicon.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>
    <?php require_once 'assets/includes/header.php'; ?>
    <section class="hero-section">
        <div class="hero-text">
            <h1> GAMESPARK </h1>
            <p> Bekijk welke games Liam speelt, heeft uitgespeeld
                en aanbeveelt. Ontdek zijn beoordelingen en
                favoriete games.</p>
            <div>
    </section>

    <section class="herolist-section">
        <div class="wrapper">
            <ul>
                <li class="list-style">
                    <i class="fa-solid fa-ghost"></i>
                    Horror
                </li>

                <li class="list-style">
                    <i class="fa-solid fa-person-rifle"></i>
                    Shooter
                </li>

                <li class="list-style">
                    <i class="fa-solid fa-truck-monster"></i>
                    Racing
                </li>

                <li class="list-style">
                    <i class="fa-solid fa-dragon"></i>
                    Adventure
                </li>
            </ul>
        </div>
    </section>


    <?php 

// verbinding
require_once 'config/conn.php';

// query
$query = ' SELECT * FROM games ORDER BY rating DESC LIMIT 6 ';

// prepare
$statement = $conn->prepare($query);

// execute
$statement->execute([]);

// fetch all
$games = $statement->fetchAll();

?>

    <section class="highlight-section">

        <h2>Best beoordeelde games van Liam</h2>

        <div class="highlight-slideshow">

            <?php foreach ($games as $game) { ?>

            <div class="highlight-box">
                <img src="<?=$game['image']?>" alt="game-picture">

                <h3><?=$game['name']?></h3>

                <h3><?php for ($i = 1; $i <= 5; $i++) {

                if($i <= $game['rating']) {

                    echo'<span class="star-filled">★</span>';
                } else {

                    echo'<span class="star-empty">☆</span>';
                }


                } ?></h3>

                <p>
                
                <?php if(strlen($game['note']) > 75) { 
                
                    echo substr($game['note'], 0, 75) . '...';
                
                } else { 
                    
                    echo $game['note']; } ?>
                
                </p>

                <a href="#">Lees meer</a>
            </div>

            <?php } ?>

        </div>

    </section>


    <?php

    // query
    $query = 'SELECT COUNT(*) FROM games WHERE status = "speelt nu" ';


    // prepare
    $statement = $conn->prepare($query);

    //execute
    $statement->execute([]);

    // fetch
    $statusPlaying = $statement->fetchcolumn();

        // query
    $query = 'SELECT COUNT(*) FROM games WHERE status = "wishlist" ';


    // prepare
    $statement = $conn->prepare($query);

    //execute
    $statement->execute([]);

    // fetch
    $statusWishlist = $statement->fetchcolumn();

        // query
    $query = 'SELECT COUNT(*) FROM games WHERE status = "uitgespeeld" ';


    // prepare
    $statement = $conn->prepare($query);

    //execute
    $statement->execute([]);

    // fetch
    $statusFinished = $statement->fetchcolumn();

           // query
    $query = 'SELECT COUNT(*) FROM games WHERE status = "in bezit" ';


    // prepare
    $statement = $conn->prepare($query);

    //execute
    $statement->execute([]);

    // fetch
    $statusOwned = $statement->fetchcolumn();
    
    ?>

    <section class="status-section">

         <div class="status-card">

        <h2>Liam's voortgang</h2>

        <p>Wishlist: <?=$statusWishlist?></p>
         <p>In bezit: <?=$statusOwned?> </p>
         <p>Speelt nu: <?=$statusPlaying?> </p>
        <p>Uitgespeeld: <?=$statusFinished?></p>

    </div>


    <?php 

    // query
    $query = 'SELECT name FROM games ORDER BY created_at DESC Limit 4';
    // prepare
    $statement = $conn->prepare($query);
    //execute
    $statement->execute([]);
    //fetchall
    $recentAdded = $statement->fetchall();
    ?>

    <div class="status-card">

        <h2>Recent toegevoegd</h2>

        <ul>
            <?php foreach($recentAdded as $recentAdd) { ?>
            <li><?= $recentAdd['name'] ?></li>
            <?php } ?>
        </ul>

    </div>

    </section>


    <?php require_once 'assets/includes/footer.php'; ?>
    <script src="assets/js/script.js"></script>

</body>

</html>