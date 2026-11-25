   <?php
$page = basename($_SERVER['PHP_SELF']);
   ?>
   <header>
        <div class="header-box">
        <img src="../assets/img/logo.png" alt="Kamado logo" class="logo" />
        <h1>GAMESPARK</h2>
        </div>

        <nav class="navbar">
            <ul class="nav-menu">
                <li class="nav-item">
                    <a class="nav-link <?php if($page === 'index.php') {echo 'active';} ?>" href="/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page === 'games.php') {echo 'active';} ?>" href="/public_html/games.php">Games</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if($page === 'login.php') {echo 'active';} ?>" href="/public_html/login.php">Inloggen</a>
                </li>
            </ul>
        </nav>
    </header>

    