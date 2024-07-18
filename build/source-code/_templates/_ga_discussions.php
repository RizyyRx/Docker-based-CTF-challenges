<div class="container py-3" bis_skin_checked="1">
    <div class="p-3 text-center bg-body-tertiary" bis_skin_checked="1">
        <div class="container py-3" bis_skin_checked="1">
            <h1 class="text-body-emphasis">Gamerz Arena Discussions</h1>
            <p class="col-lg-8 mx-auto lead">
                If you have any queries or message you want to tell the world...now's the right time.
            </p>
        </div>
    </div>
</div>

<?php
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if message is set
    if (isset($_POST['message'])) {
        // Check if user is logged in
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $message = $_POST['message'];

            // Validate and process the message
            if (!empty($username) && !empty($message)) {
                // Handle file upload if a file is provided
                if (isset($_FILES['file']) && $_FILES['file']['error'] !== UPLOAD_ERR_NO_FILE) {
                    $file = $_FILES['file'];

                    // Check for file upload errors
                    if ($file['error'] === UPLOAD_ERR_OK) {
                        $uploadDir = '/var/www/html/assets/uploads/';
                        $uploadFile = $uploadDir . basename($file['name']);

                        // Move uploaded file to destination
                        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
                            // File uploaded successfully, now save message and file path to database
                            Database::saveMessage($username, $message, $uploadFile);

                            // Redirect to avoid resubmission on page refresh
                            header('Location: ' . $_SERVER['PHP_SELF']);
                            exit;
                        } else {
                            // Handle file upload error
                            echo "Sorry, there was an error uploading your file.";
                        }
                    } else {
                        // Handle file upload error based on error code
                        switch ($file['error']) {
                            case UPLOAD_ERR_INI_SIZE:
                            case UPLOAD_ERR_FORM_SIZE:
                                echo "The uploaded file exceeds the maximum file size limit.";
                                break;
                            case UPLOAD_ERR_PARTIAL:
                                echo "The uploaded file was only partially uploaded.";
                                break;
                            case UPLOAD_ERR_NO_FILE:
                                echo "No file was uploaded.";
                                break;
                            case UPLOAD_ERR_NO_TMP_DIR:
                                echo "Missing temporary folder for file uploads.";
                                break;
                            case UPLOAD_ERR_CANT_WRITE:
                                echo "Failed to write file to disk.";
                                break;
                            case UPLOAD_ERR_EXTENSION:
                                echo "A PHP extension stopped the file upload.";
                                break;
                            default:
                                echo "Sorry, there was an unknown error uploading your file.";
                                break;
                        }
                    }
                } else {
                    // No file provided, save message without file path
                    Database::saveMessage($username, $message, '');

                    // Redirect to avoid resubmission on page refresh
                    header('Location: ' . $_SERVER['PHP_SELF']);
                    exit;
                }
            } else {
                echo "Username or message is empty.";
            }
        } else {
            // User is not logged in, show login modal
            echo '
        <div class="modal show" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" style="display: block; background: rgba(0, 0, 0, 0.5);">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
                    </div>
                    <div class="modal-body">
                        Login to participate in the discussions.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="window.location.href=\'login.php\'">Login</button>
                    </div>
                </div>
            </div>
        </div>';
        }
    } else {
        echo "Message not set.";
    }


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
        $comment_id = $_POST['delete_comment_id'];
        $comment_row = Database::getCommentRow($comment_id);
        if ($_SESSION['username'] == $comment_row['username']) {
            Database::deleteComment($comment_id);
            // Redirect to avoid resubmission on page refresh
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit;
        } else {
            Database::deleteComment($comment_id);
            echo '
    <div class="modal show" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" style="display: block; background: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Really?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Did you just delete other person comment?
                    Here, this is your penality for the unforgivable act you have done without thinking.
                    }?huh_553cc4_h5um_74h7_3v4h_u0y_05{ANERA_FTC
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>';
        }
    }

    // Check if a discussion deletion request is submitted
    if (isset($_POST['delete_discussion'])) {
        $discussion_id = $_POST['delete_discussion'];
        $discussion_row = Database::getDiscussionsRow($discussion_id);

        // Validate session or other authorization checks as needed
        if ($_SESSION['username'] == $discussion_row['username']) {

            // Fetch the discussion details from the database
            $discussion = Database::getDiscussionById($discussion_id);

            if ($discussion) {
                $file_path = $discussion['file_path'];

                // Delete the discussion from the database
                $deleted = Database::deleteDiscussion($discussion_id);

                if ($deleted) {
                    // Delete the file if it exists
                    if (!empty($file_path) && file_exists($file_path)) {
                        unlink($file_path);
                    }

                    // Redirect after deletion to prevent resubmission on refresh
                    header('Location: ' . $_SERVER['PHP_SELF']);
                    exit;
                } else {
                    echo "Failed to delete discussion.";
                }
            } else {
                echo "Discussion not found.";
            }
        } else {
            echo '
    <div class="modal show" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true" style="display: block; background: rgba(0, 0, 0, 0.5);">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Unauthorized</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    You are not authorized to delete this discussion post.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>';
        }
    }
}
?>



<div class="container mt-5">
    <form method="post" enctype="multipart/form-data" action="gamerz_arena_discussions.php" class="text-center">
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" class="form-control mx-auto" rows="4" required style="width: 100%;"></textarea>
        </div>
        <div class="form-group py-4">
            <label for="file">Upload Image or File:</label>
            <input type="file" id="file" name="file" class="form-control-file mx-auto">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php
// Fetch discussions from the database
$discussions = Database::getDiscussions();

// Check if discussions are retrieved successfully
if ($discussions) {
    foreach ($discussions as $discussion) {
        $username = htmlspecialchars($discussion['username']);
        $message = nl2br(htmlspecialchars($discussion['message'])); // Convert new lines to <br> tags for HTML display
        $file_path = htmlspecialchars($discussion['file_path']);
        $discussion_id = htmlspecialchars($discussion['id']);
        // Display each discussion item
        echo "<div class='container my-4' style='max-width: 600px;'>";
        echo "<div class='card border-primary' style='border-width: 2px; padding: 8px;'>";
        echo "<div class='card-body'>";
        echo "<p><strong>Username:</strong> $username</p>";
        echo "<p><strong>Message:</strong> $message</p>";

        // Display file if available
        if (!empty($file_path)) {
            $file_name = basename($file_path);
            // Check if file is an image (for demonstration purpose)
            $image_extensions = ['jpg', 'jpeg', 'png', 'gif'];
            $file_extension = pathinfo($file_path, PATHINFO_EXTENSION);

            if (in_array(strtolower($file_extension), $image_extensions)) {
                // Display image
                echo "<p><strong>File:</strong><br>";
                echo "<img src='/assets/uploads/$file_name' alt='Uploaded Image' style='max-width: 100%; height: auto; max-height: 300px;'>";
                echo "</p>";
            } else {
                // Display as download link if not an image
                echo "<p><strong>File:</strong> <a href='/assets/uploads/$file_name' download='$file_name'>$file_name</a></p>";
            }
        }

        // Delete discussion button
        echo "<form method='post' action='gamerz_arena_discussions.php'>";
        echo "<input type='hidden' name='delete_discussion' value='$discussion_id'>";
        echo "<button type='submit' class='btn btn-danger'>Delete Discussion</button>";
        echo "</form>";

        echo "</div>"; // End card-body

        // Comments Section
        echo "<button class='accordion-button collapsed btn btn-primary mt-3 center-accordion' type='button' data-bs-toggle='collapse' data-bs-target='#collapse_$discussion_id' aria-expanded='false' aria-controls='collapse_$discussion_id'>";
        echo "Comments <span class='dropdown-arrow'></span>";
        echo "</button>";

        // Comments Collapse
        echo "<div id='collapse_$discussion_id' class='accordion-collapse collapse mt-3' aria-labelledby='heading_$discussion_id' data-bs-parent='#accordionExample'>";
        echo "<div class='accordion-body'>";
        echo "<h5 class='card-title'>Leave a Comment</h5>";
        echo "<form action='gamerz_arena_discussions.php' method='POST'>";
        echo "<div class='form-group'>";
        echo "<textarea class='form-control' name='comment' rows='3' placeholder='Write your comment'></textarea>";
        echo "</div>";
        echo "<input type='hidden' name='player' value='$discussion_id'>";
        echo "<button type='submit' class='btn btn-primary'>Submit</button>";
        echo "</form>";

        // Comments List
        echo "<div class='mt-3'>";
        echo "<h5 class='card-title'>Comments</h5>";
        echo "<ul class='list-group'>";

        // Fetch comments for this discussion
        $comments = Database::getComment($discussion_id);

        // Check if there are comments to display
        if (!empty($comments)) {
            // Reverse array to display latest comments first
            //$comments = array_reverse($comments);
            foreach ($comments as $comment) {
                echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                echo "<div><strong>" . htmlspecialchars($comment['username']) . ":</strong> ";
                echo htmlspecialchars(wordwrap($comment['comment'], 30, "<br>\n", true)) . "</div>";
                echo "<div class='d-flex align-items-center'>";
                echo "<small class='text-muted mr-3'>" . htmlspecialchars($comment['comment_time']) . "</small>";
                echo "<form method='post' action='gamerz_arena_discussions.php'>";
                echo "<input type='hidden' name='delete_comment_id' value='" . htmlspecialchars($comment['id']) . "'>";
                echo "<button type='submit' class='btn btn-danger btn-sm'>Delete</button>";
                echo "</form>";
                echo "</div>"; // End timestamp and delete button container
                echo "</li>";
            }
        } else {
            // Display message if no comments exist
            echo "<li class='list-group-item'>No comments yet.</li>";
        }

        echo "</ul>";
        echo "</div>"; // End comments list
        echo "</div>"; // End accordion body
        echo "</div>"; // End accordion collapse

        echo "</div>"; // End card
        echo "</div>"; // End container
    }
} else {
    echo "<div class='d-flex justify-content-center align-items-center' style='height: 50vh;'>";
    echo "<div class='text-center'>";
    echo "<p>No discussions found.</p>";
    echo "</div>";
    echo "</div>";
}
?>