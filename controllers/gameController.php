<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Dit formulier accepteert alleen POST requests');
}

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit;

$action = $_POST['action'] ?? '';

if ($action == 'create') {

// Database verbinding
    require_once '../config/conn.php';

// Formulier gegevens ophalen en in variabelen zetten
    $name = trim($_POST['name'] ?? '');
    $image = trim($_POST['image'] ?? '');
    

    $platform = $_POST['platform'];

    $allowed_platform = [
        'PC',
        'Playstation',
        'Xbox',
        'Nintendo Switch'
    ];



    $genre = $_POST['genre'];

    $allowed_genre = [
        'Action',
        'Adventure',
        'RPG',
        'Shooter',
        'Horror',
        'Racing'
    ];

    $releaseYear = $_POST['release_year'];


    $status = $_POST['status'];

    $allowed_status = [
        'Wishlist',
        'In bezit',
        'Speelt nu',
        'Uitgespeeld'
    ];

    $note = trim($_POST['note'] ?? '' );

    $recommended = trim($_POST['recommended_by'] ?? '');

    $rating = $_POST['rating'] ?? '';


// Valideren 


    $errors = [];

    if (!in_array($platform, $allowed_platform, true)) {
        $errors[] = 'Kies een geldige platform';
    }

    if(!is_numeric($_POST['release_year'])) {
        $errors[] = 'Kies een geldig jaartal';
    } 

    if(!in_array($genre, $allowed_genre, true)) {
        $errors[] = 'Kies een geldige genre';
    }

      if(!in_array($status, $allowed_status, true)) {
        $errors[] = 'Kies een geldige status';
    }


    if ($errors !== []) {

        echo'<h1> Controleer het formulier </h1><ul>';
        
        foreach($errors as $error) {
            echo'<li>' . $error . '</li>';
        }

        echo'</ul>';
        exit;
    }



    // query 
    $query = '
    
    INSERT INTO games 
    (name, image, platform, genre, release_year, status, note, recommended_by, rating) 

    VALUES 
    (:name, :image, :platform, :genre, :release_year, :status, :note, :recommended_by, :rating)
    
    
    ';


    // prepare
    $statement = $conn->prepare($query);


    // execute
    $statement->execute([

    ':name' => $name,
    ':image' => $image,
    ':platform' => $platform,
    ':genre' => $genre,
    ':release_year' => $releaseYear,
    'status' => $status,
    ':note' => $note,
    ':recommended_by' => $recommended,
    ':rating' => $rating

    ]);


    // redirect

    header('location: ../public_html/games.php?toegevoegd=true');
    exit;
    
}



?>