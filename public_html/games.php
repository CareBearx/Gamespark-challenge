<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cantarell:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">
    <link rel="icon" href="../assets/img/favicon.png" />
</head>

<body>
    <?php require_once '../assets/includes/header.php'; ?>


    <div class="games-title-row">
        <h2 class="page-title"> GAMES </h2>
        <a href="game-create.php">+ Game toevoegen</a>
    </div>

    <?php

  if(isset($_GET['toegevoegd'])) {
        echo '<h2 class="confirmation">Game toegevoegd</h2>';
    }

    // verbinding
    require_once '../config/conn.php';
    
    // query
    $query = "SELECT * FROM games ";


    // prepare
    $statement = $conn->prepare($query);

    // execute
    $statement->execute([]);


    //fetch all
    $games = $statement->fetchAll();



if (count($games) > 0) {

    foreach ($games as $game) { ?>

    <div class='game-container'>
        <img class="game-image" src="<?= $game['image']?>">

        <div class="game-content">
            <div class='game-box'>
                <div>
                    <h4><?=$game['release_year']?></h4>
                    <h2><?=$game['name']?></h2>
                    <p><?=$game['note']?></p>
                </div>

                <div>
                    <h3><?= $game['genre']?></h3>
                    <h3><?= $game['platform']?></h3>
                    <h3><?php for ($i = 1; $i <= 5; $i++) {
                        
                        if ($i <= $game['rating']) {
                        echo'<span class="star-filled">★</span>';
                        
                        } else echo '<span class="star-empty">☆</span>';
                    
                    } ?> </h3>
                </div>
            </div>
            <div class='game-box'>
                <div>
                    <h3><?= $game['status']?></h3>
                    <h3><?php if(!empty($game['recommended_by'])) { echo "Aangeraden door: " . $game['recommended_by']; }?></h3>
                </div>

                <div>
                    <h4> Verwijderen </h4>

                    <a class="button-styling" <?= " href='game-edit.php?id=".$game['id']."'>"; ?> Bewerken </a>

                        <h3> Lees meer </h3>
                </div>
            </div>
        </div>
    </div>


    <?php
    }

} else {
    echo "<div class='game-container'><h2>Er zijn nog geen games toegevoegd</h2></div>";
}

?>


    <script src="../assets/js/script.js"></script>
</body>

</html>