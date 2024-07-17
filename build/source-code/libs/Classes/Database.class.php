<?php
class Database
{
    public static $conn = NULL;

    // Gets Database connection using DB credentials
    public static function getConnection()
    {
        try {
            if (Database::$conn == NULL) {
                // DB credentials
                $servername = 'mysql';
                $username = 'root';
                $password = 'example';
                $dbname = 'rizyy_docker_ctf';

                // Create new mysqli connection
                $connection = new mysqli($servername, $username, $password, $dbname);

                // Check for connection errors
                if ($connection->connect_error) {
                    throw new Exception("Connection failed: " . $connection->connect_error);
                } else {
                    Database::$conn = $connection;
                    // Return the connection
                    return Database::$conn;
                }
            } else {
                // Return existing connection
                return Database::$conn;
            }
        } catch (Exception $e) {
            // Handle exception
            die("Connection failed: " . $e->getMessage());
        }
    }

    // Sets comment data in DB
    public static function setComment($player, $username, $comment)
    {
        try {
            $conn = Database::getConnection();
            $sql = "INSERT INTO comments (player,username, comment, comment_time) VALUES (?, ?, ?, now())";
            $stmt = $conn->prepare($sql);

            $stmt->bind_param("sss", $player, $username, $comment);

            $result = $stmt->execute();
            if ($result) {
                return true;
            } else {
                error_log("Failed to set comment: " . $stmt->error);
                return false;
            }
        } catch (Exception $e) {
            error_log("Exception caught: " . $e->getMessage());
            return false;
        }
    }


    // Gets comment data from DB using prepared statement
    public static function getComment($player)
    {
        try {
            $conn = Database::getConnection();

            // Prepare the SQL statement with a placeholder for the player parameter
            $sql = "SELECT * FROM `comments` WHERE `player` = ?";
            $stmt = $conn->prepare($sql);

            // Bind the parameter to the prepared statement as a string
            $stmt->bind_param("s", $player);

            // Execute the prepared statement
            $stmt->execute();

            // Get the result set
            $result = $stmt->get_result();

            // Check if there are rows returned
            if ($result->num_rows > 0) {
                // Fetch all rows into an associative array
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                // Return an empty array if no rows found
                return [];
            }
        } catch (Exception $e) {
            // Log any exceptions that occur
            error_log("Exception caught: " . $e->getMessage());
            return [];
        }
    }



    // Deletes a comment from DB using id
    public static function deleteComment($id)
    {
        try {
            $conn = Database::getConnection();
            $sql = "DELETE FROM `comments` WHERE `id` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);

            $result = $stmt->execute();
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            error_log("Exception caught: " . $e->getMessage());
            return false;
        }
    }

    public static function saveMessage($username, $message, $uploadFile)
    {
        try {
            $conn = Database::getConnection();
            $sql = "INSERT INTO discussions (username, message, file_path) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);

            $stmt->bind_param("sss", $username, $message, $uploadFile);

            $result = $stmt->execute();
            if ($result) {
                return true;
            } else {
                error_log("Failed to save message: " . $stmt->error);
                return false;
            }
        } catch (Exception $e) {
            error_log("Exception caught: " . $e->getMessage());
            return false;
        }
    }

    public static function getDiscussions()
    {
        try {
            $conn = Database::getConnection();

            // Prepare the SQL statement
            $sql = "SELECT * FROM discussions";
            $stmt = $conn->prepare($sql);

            // Execute the prepared statement
            $stmt->execute();

            // Get the result set
            $result = $stmt->get_result();

            // Check if there are rows returned
            if ($result->num_rows > 0) {
                // Fetch all rows into an associative array
                return $result->fetch_all(MYSQLI_ASSOC);
            } else {
                // Return an empty array if no rows found
                return [];
            }
        } catch (Exception $e) {
            // Log any exceptions that occur
            error_log("Exception caught: " . $e->getMessage());
            return [];
        }
    }

    public static function getDiscussionsRow($username)
    {
        try {
            $conn = Database::getConnection();

            // Prepare the SQL statement
            $sql = "SELECT * FROM `discussions` WHERE `username` = ?";
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                throw new Exception('Failed to prepare statement: ' . $conn->error);
            }

            // Bind the parameter
            $stmt->bind_param('s', $username);

            // Execute the prepared statement
            if (!$stmt->execute()) {
                throw new Exception('Failed to execute statement: ' . $stmt->error);
            }

            // Get the result set
            $result = $stmt->get_result();

            // Fetch the first row into an associative array
            return $result->fetch_assoc(); // Return only the first row
        } catch (Exception $e) {
            // Log any exceptions that occur
            error_log("Exception caught: " . $e->getMessage());
            return null;
        }
    }

    // Fetch discussion from DB by ID
    public static function getDiscussionById($discussion_id)
    {
        try {
            $conn = Database::getConnection();

            // Prepare the SQL statement
            $sql = "SELECT * FROM `discussions` WHERE `id` = ?";
            $stmt = $conn->prepare($sql);

            // Bind the parameter to the prepared statement as an integer
            $stmt->bind_param("i", $discussion_id);

            // Execute the prepared statement
            $stmt->execute();

            // Get the result set
            $result = $stmt->get_result();

            // Check if a discussion is found
            if ($result->num_rows > 0) {
                // Fetch the discussion as an associative array
                return $result->fetch_assoc();
            } else {
                // Return null if discussion not found
                return null;
            }
        } catch (Exception $e) {
            // Log any exceptions that occur
            error_log("Exception caught: " . $e->getMessage());
            return null;
        }
    }

    // Delete discussion from DB by ID
    public static function deleteDiscussion($discussion_id)
    {
        try {
            $conn = Database::getConnection();

            // Prepare the SQL statement
            $sql = "DELETE FROM `discussions` WHERE `id` = ?";
            $stmt = $conn->prepare($sql);

            // Bind the parameter to the prepared statement as an integer
            $stmt->bind_param("i", $discussion_id);

            // Execute the prepared statement
            $result = $stmt->execute();

            // Check if deletion was successful
            if ($result) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            // Log any exceptions that occur
            error_log("Exception caught: " . $e->getMessage());
            return false;
        }
    }
}
