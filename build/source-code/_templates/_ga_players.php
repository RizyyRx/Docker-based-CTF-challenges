<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['comment'])) {
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $comment = $_POST['comment'];
            $player = $_POST['player'];

            // Validate and set comment
            if (!empty($username) && !empty($comment)) {
                Database::setComment($player, $username, $comment);
                // Redirect to avoid resubmission on page refresh
                header('Location: ' . $_SERVER['PHP_SELF']);
                exit;
            }
        } else {
            echo '
            <div class="modal show" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" style="display: block; background: rgba(0, 0, 0, 0.5);">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
                        </div>
                        <div class="modal-body">
                            Login to make comments.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="window.location.href=\'login.php\'">Login</button>
                        </div>
                    </div>
                </div>
            </div>';
        }
    }

    // Checks before deleting a comment
    if (isset($_POST['delete_comment_id'])) {
        $id = $_POST['delete_comment_id'];
        Database::deleteComment($id);
        // Redirect to avoid resubmission on page refresh
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

<div class="container-fluid d-flex justify-content-center py-4">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-pause="false" style="max-width: 900px;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/assets/images/cup.jpg" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="/assets/images/c9.jpg" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="/assets/images/esports.jpg" class="d-block w-100" alt="Slide 3">
            </div>
            <div class="carousel-item">
                <img src="/assets/images/scream.jpg" class="d-block w-100" alt="Slide 4">
            </div>
            <div class="carousel-item">
                <img src="/assets/images/ge.jpg" class="d-block w-100" alt="Slide 5">
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

<div class="container py-3" bis_skin_checked="1">
    <div class="p-3 text-center bg-body-tertiary" bis_skin_checked="1">
        <div class="container py-3" bis_skin_checked="1">
            <h1 class="text-body-emphasis">E-sports Players</h1>
            <p class="col-lg-8 mx-auto lead">
                Warriors of Competitive gaming
            </p>
        </div>
    </div>
</div>

<div class="container py-4">
    <!-- Player Card -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border rounded" style="width: 100%;">
                <img src="/assets/images/cards/scream.jpg" class="card-img-top" alt="Adil 'ScreaM' Benrlitom">
                <div class="card-body text-center">
                    <h5 class="card-title">ScreaM</h5>
                    <p class="card-text">Team: Team Liquid</p>
                    <p class="card-text">Game: CSGO and Valorant</p>
                    <p class="card-text">Description: Adil “ScreaM” Benrlitom is a professional VALORANT player from Belgium. ScreaM started his professional gaming career as a pro Counter-Strike: Global Offensive player, where he achieved great successes with teams such as G2, VeryGames, and EnVyUs.</p>

                    <!-- Accordion Button -->
                    <button class="accordion-button collapsed btn btn-primary mt-3 center-accordion" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Comments <span class="dropdown-arrow"></span>
                    </button>

                    <!-- Accordion Content -->
                    <div id="collapseOne" class="accordion-collapse collapse mt-3" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <!-- Comment Section -->
                            <h5 class="card-title">Leave a Comment</h5>
                            <form action="gamerz_arena_players.php" method="POST">
                                <div class="form-group">
                                    <textarea class="form-control" name="comment" rows="3" placeholder="Write your comment"></textarea>
                                </div>
                                <input type="hidden" name="player" value="scream">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>



                            <!-- Comments List -->
                            <div class="mt-3">
                                <h5 class="card-title">Comments</h5>
                                <ul class="list-group">
                                    <?php
                                    $player = 'scream';
                                    $comments = Database::getComment($player);
                                    // Check if there are comments to display
                                    if (!empty($comments)) {
                                        // Reverse array to display latest comments first
                                        //$comments = array_reverse($comments);
                                        foreach ($comments as $comment) {
                                            echo '<li class="list-group-item d-flex justify-content-between align-items-center">';

                                            // Display username and comment content
                                            echo '<div>';
                                            echo '<strong>' . htmlspecialchars($comment['username']) . ':</strong> ';

                                            // Escape HTML and break comment into lines if it exceeds 30 characters per line
                                            $commentContent = htmlspecialchars(wordwrap($comment['comment'], 30, "<br>\n", true));
                                            echo $commentContent;

                                            echo '</div>';

                                            // Display timestamp near delete button
                                            echo '<div class="d-flex align-items-center">';
                                            echo '<small class="text-muted mr-3">' . htmlspecialchars($comment['comment_time']) . '</small>';

                                            // Delete button form
                                            echo '<form method="post" action="gamerz_arena_players.php">';
                                            echo '<input type="hidden" name="delete_comment_id" value="' . htmlspecialchars($comment['id']) . '">';
                                            echo '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
                                            echo '</form>';

                                            echo '</div>'; // End timestamp and delete button container

                                            echo '</li>';
                                        }
                                    } else {
                                        // Display message if no comments exist
                                        echo '<li class="list-group-item">No comments yet.</li>';
                                    }
                                    ?>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-4">
    <!-- Player Card -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border rounded" style="width: 100%;">
                <img src="/assets/images/cards/tenz.jpg" class="card-img-top" alt="Adil 'ScreaM' Benrlitom">
                <div class="card-body text-center">
                    <h5 class="card-title">TenZ</h5>
                    <p class="card-text">Team: Sentinels</p>
                    <p class="card-text">Game: CSGO and Valorant</p>
                    <p class="card-text">Description: Tyson Van Ngo, better known as TenZ, is a Vietnamese-Canadian professional Valorant player for Sentinels. He is widely considered to be one of the greatest Valorant players of all time. He began his esports career in October 2019 as a Counter-Strike: Global Offensive player for Cloud9.</p>

                    <!-- Accordion Button -->
                    <button class="accordion-button collapsed btn btn-primary mt-3 center-accordion" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Comments <span class="dropdown-arrow"></span>
                    </button>

                    <!-- Accordion Content -->
                    <div id="collapseOne" class="accordion-collapse collapse mt-3" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <!-- Comment Section -->
                            <h5 class="card-title">Leave a Comment</h5>
                            <form action="gamerz_arena_players.php" method="POST">
                                <div class="form-group">
                                    <textarea class="form-control" name="comment" rows="3" placeholder="Write your comment"></textarea>
                                </div>
                                <input type="hidden" name="player" value="tenz">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>



                            <!-- Comments List -->
                            <div class="mt-3">
                                <h5 class="card-title">Comments</h5>
                                <ul class="list-group">
                                    <?php
                                    $player = 'tenz';
                                    $comments = Database::getComment($player);
                                    // Check if there are comments to display
                                    if (!empty($comments)) {
                                        // Reverse array to display latest comments first
                                        $comments = array_reverse($comments);
                                        foreach ($comments as $comment) {
                                            echo '<li class="list-group-item d-flex justify-content-between align-items-center">';

                                            // Display username and comment content
                                            echo '<div>';
                                            echo '<strong>' . htmlspecialchars($comment['username']) . ':</strong> ';

                                            // Escape HTML and break comment into lines if it exceeds 30 characters per line
                                            $commentContent = wordwrap($comment['comment'], 30, "<br>\n", true);
                                            echo $commentContent;

                                            echo '</div>';

                                            // Display timestamp near delete button
                                            echo '<div class="d-flex align-items-center">';
                                            echo '<small class="text-muted mr-3">' . htmlspecialchars($comment['comment_time']) . '</small>';

                                            // Delete button form
                                            echo '<form method="post" action="">';
                                            echo '<input type="hidden" name="delete_comment_id" value="' . htmlspecialchars($comment['id']) . '">';
                                            echo '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
                                            echo '</form>';

                                            echo '</div>'; // End timestamp and delete button container

                                            echo '</li>';
                                        }
                                    } else {
                                        // Display message if no comments exist
                                        echo '<li class="list-group-item">No comments yet.</li>';
                                    }
                                    ?>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-4">
    <!-- Player Card -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border rounded" style="width: 100%;">
                <img src="/assets/images/cards/shroud.jpg" class="card-img-top" alt="Adil 'ScreaM' Benrlitom">
                <div class="card-body text-center">
                    <h5 class="card-title">Shroud</h5>
                    <p class="card-text">Team: Ex-cloud9 and Ex-sentinels</p>
                    <p class="card-text">Game: Former csgo and valorant player</p>
                    <p class="card-text">Description: Michael Grzesiek, better known as Shroud, is a Canadian streamer, YouTuber, former professional Valorant player, and former professional Counter-Strike: Global Offensive player. </p>

                    <!-- Accordion Button -->
                    <button class="accordion-button collapsed btn btn-primary mt-3 center-accordion" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        Comments <span class="dropdown-arrow"></span>
                    </button>

                    <!-- Accordion Content -->
                    <div id="collapseOne" class="accordion-collapse collapse mt-3" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <!-- Comment Section -->
                            <h5 class="card-title">Leave a Comment</h5>
                            <form action="gamerz_arena_players.php" method="POST">
                                <div class="form-group">
                                    <textarea class="form-control" name="comment" rows="3" placeholder="Write your comment"></textarea>
                                </div>
                                <input type="hidden" name="player" value="shroud">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>



                            <!-- Comments List -->
                            <div class="mt-3">
                                <h5 class="card-title">Comments</h5>
                                <ul class="list-group">
                                    <?php
                                    $player = 'shroud';
                                    $comments = Database::getComment($player);
                                    // Check if there are comments to display
                                    if (!empty($comments)) {
                                        // Reverse array to display latest comments first
                                        $comments = array_reverse($comments);
                                        foreach ($comments as $comment) {
                                            echo '<li class="list-group-item d-flex justify-content-between align-items-center">';

                                            // Display username and comment content
                                            echo '<div>';
                                            echo '<strong>' . htmlspecialchars($comment['username']) . ':</strong> ';

                                            // Escape HTML and break comment into lines if it exceeds 30 characters per line
                                            $commentContent = htmlspecialchars(wordwrap($comment['comment'], 30, "<br>\n", true));
                                            echo $commentContent;

                                            echo '</div>';

                                            // Display timestamp near delete button
                                            echo '<div class="d-flex align-items-center">';
                                            echo '<small class="text-muted mr-3">' . htmlspecialchars($comment['comment_time']) . '</small>';

                                            // Delete button form
                                            echo '<form method="post" action="">';
                                            echo '<input type="hidden" name="delete_comment_id" value="' . htmlspecialchars($comment['id']) . '">';
                                            echo '<button type="submit" class="btn btn-danger btn-sm">Delete</button>';
                                            echo '</form>';

                                            echo '</div>'; // End timestamp and delete button container

                                            echo '</li>';
                                        }
                                    } else {
                                        // Display message if no comments exist
                                        echo '<li class="list-group-item">No comments yet.</li>';
                                    }
                                    ?>


                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>