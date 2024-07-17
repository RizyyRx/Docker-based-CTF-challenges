<header>
    <nav class="navbar navbar-expand-lg bg-violet text-white" aria-label="Thirteenth navbar example">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample11" aria-controls="navbarsExample11" aria-expanded="false" aria-label="Toggle navigation">
                <a href="#" class="btn btn-primary">Go to CTF Arena page</a>
            </button>

            <div class="collapse navbar-collapse d-lg-flex" id="navbarsExample11">
                <a class="navbar-brand col-lg-3 me-0 text-white" href="gamerz_arena_index.php">Gamerz Arena</a>
                <ul class="navbar-nav col-lg-6 justify-content-lg-center">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="gamerz_arena_index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="gamerz_arena_accessories.php">Accessories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="gamerz_arena_players.php">Players</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="gamerz_arena_news.php">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="gamerz_arena_discussions.php">Discussions</a>
                    </li>
                </ul>
                <div class="d-lg-flex col-lg-3 justify-content-lg-end">
                    <?php
                    if(Session::get('isLoggedin') == 'true'){?>
                        <div class="btn-group me-2">
                        <a href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                    <?php
                    }
                    ?>
                    
                    <a href="index.php" class="btn btn-primary">Go to CTF Arena page</a>
                </div>
            </div>
        </div>
    </nav>
</header>
