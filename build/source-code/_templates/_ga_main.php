<main>
    <div class="display-4 fw-bold text-white text-center pt-4" style="font-family: 'Press Start 2P', cursive;">Gamerz Arena</div>

    <?php
    if (Session::isset_session('isLoggedin')) {
        if (Session::get('isLoggedin') == 'true') {
            $username = Session::get('username'); ?>
            <div class="container pt-4">
                <div class="text-center" style="color: white;">
                    <h1 class="display-4">Welcome <?php echo htmlspecialchars($username); ?></h1>                 
                </div>
            </div>
        <?php
        }
    } else { ?>
        <div class="d-flex justify-content-center py-5">
            <a href="login.php" class="btn btn-primary mx-2">Login</a>
            <a href="signup.php" class="btn btn-secondary mx-2">Sign Up</a>
        </div>
    <?php
    }
    ?>



    <div class="container-fluid d-flex justify-content-center pb-4">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false" style="max-width: 700px;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/assets/images/valorant.jpg" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="/assets/images/got.jpg" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="/assets/images/inside.jpeg" class="d-block w-100" alt="Slide 3">
                </div>
                <div class="carousel-item">
                    <img src="/assets/images/gow.jpg" class="d-block w-100" alt="Slide 4">
                </div>
                <div class="carousel-item">
                    <img src="/assets/images/nfs.jpg" class="d-block w-100" alt="Slide 5">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="container py-4">
        <div class="rounded p-4 bg-lightgrey">
            <div class="jumbotron text-white text-center mb-0">
                <div class="container">
                    <div class="display-4 fw-bold py-4">Paradise for all gamers</div>
                    <p class="lead">
                        Get some good info about your favourite Games, Accessories, E-sports Players and many more
                    </p>
                </div>
            </div>
        </div>
    </div>

</main>