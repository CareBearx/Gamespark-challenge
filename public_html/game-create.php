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
    <div class="breadcrumb">
        <a href="games.php">Games</a>
        <span>
            < </span>
                <span> Create game </span>
    </div>

    <form action="../controllers/gameController.php" method="POST">
        <input type="hidden" name="action" value="create">

        <h1>Nieuwe game toevoegen</h1>

        <div class="form-row">
            <div class="form-group">
                <label for="name">Game naam</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="image">Afbeelding URL</label>
                <input type="url" id="image" name="image">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="platform">Platform</label>
                <select id="platform" name="platform" required>
                    <option value="">Kies een platform</option>
                    <option value="PC">PC</option>
                    <option value="PlayStation">PlayStation</option>
                    <option value="Xbox">Xbox</option>
                    <option value="Switch">Nintendo Switch</option>
                </select>
            </div>

            <div class="form-group">
                <label for="genre">Genre</label>
                <select id="genre" name="genre" required>
                    <option value="">Kies een genre</option>
                    <option value="Action">Action</option>
                    <option value="Adventure">Adventure</option>
                    <option value="RPG">RPG</option>
                    <option value="Shooter">Shooter</option>
                    <option value="Horror">Horror</option>
                    <option value="Racing">Racing</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="release_year">Releasejaar</label>
                <input type="number" id="release_year" name="release_year" min="1980" max="2030" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="">Kies een status</option>
                    <option value="Wishlist">Wishlist</option>
                    <option value="In bezit">In bezit</option>
                    <option value="Speelt nu">Speelt nu</option>
                    <option value="Uitgespeeld">Uitgespeeld</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="note">Notitie</label>
                <textarea id="note" name="note" maxlength="250"></textarea>
            </div>




            <div class="form-group">
                <label for="recommended_by">Aangeraden door</label>
                <input type="text" id="recommended_by" name="recommended_by">



                <div class="rating-container">

                    <label>Rating</label>

                    <div class="rating">
                        <input type="radio" id="star5" name="rating" value="5">
                        <label for="star5">★</label>

                        <input type="radio" id="star4" name="rating" value="4">
                        <label for="star4">★</label>

                        <input type="radio" id="star3" name="rating" value="3">
                        <label for="star3">★</label>

                        <input type="radio" id="star2" name="rating" value="2">
                        <label for="star2">★</label>

                        <input type="radio" id="star1" name="rating" value="1">
                        <label for="star1">★</label>
                    </div>

                </div>


            </div>
        </div>



        <button type="submit">Game toevoegen</button>

    </form>


    <script src="../assets/js/script.js"></script>

</body>

</html>