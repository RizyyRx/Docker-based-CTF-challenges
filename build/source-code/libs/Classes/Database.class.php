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

    public static function setCompletionStatus($challenge_name)
    {
        try {
            $conn = Database::getConnection();

            // Prepare the SQL statement to update completion status
            $sql = "UPDATE `flags` SET `completion_status` = '1' WHERE `challenge_name` = ?";

            // Using prepared statements to prevent SQL injection
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                throw new Exception('Prepare failed: ' . $conn->error);
            }

            // Bind parameters and execute the statement
            $stmt->bind_param("s", $challenge_name);
            $stmt->execute();

            // Check if the update was successful
            if ($stmt->affected_rows > 0) {
                return true; // Success
            } else {
                return false; // Failed to update (challenge name may not exist)
            }
        } catch (Exception $e) {
            // Handle any exceptions (e.g., log, display error message, etc.)
            error_log('Error in setCompletionStatus: ' . $e->getMessage());
            throw new Exception('Failed to update completion status');
        }
    }

    public static function checkCompletionStatus($challenge_name)
    {
        try {
            $completion_status = null;
            $conn = Database::getConnection();

            // Prepare the SQL statement to select completion status
            $sql = "SELECT `completion_status` FROM `flags` WHERE `challenge_name` = ?";

            // Using prepared statements to prevent SQL injection
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                throw new Exception('Prepare failed: ' . $conn->error);
            }

            // Bind parameters and execute the statement
            $stmt->bind_param("s", $challenge_name);
            $stmt->execute();

            // Bind result variables
            $stmt->bind_result($completion_status);

            // Fetch the result
            $stmt->fetch();

            // Check if completion status was fetched
            if ($completion_status !== null) {
                // Convert completion status to boolean
                return ($completion_status == 1); // True if completion_status is 1, false otherwise
            } else {
                // No completion status found for the challenge name
                return false;
            }
        } catch (Exception $e) {
            // Handle any exceptions (e.g., log, display error message, etc.)
            error_log('Error in checkCompletionStatus: ' . $e->getMessage());
            throw new Exception('Failed to check completion status');
        }
    }
    
    public static function resetProgress()
    {
        try {
            $conn = Database::getConnection();

            // Prepare the SQL statement to update all completion statuses to 0
            $sql = "UPDATE `flags` SET `completion_status` = 0";

            // Using prepared statements to prevent SQL injection
            $stmt = $conn->prepare($sql);
            if ($stmt === false) {
                throw new Exception('Prepare failed: ' . $conn->error);
            }

            // Execute the statement
            $stmt->execute();

            // Check if any rows were updated
            $rowsAffected = $stmt->affected_rows;

            // Close the statement
            $stmt->close();

            // Return true if at least one row was updated, otherwise false
            return $rowsAffected > 0;
        } catch (Exception $e) {
            // Handle any exceptions (e.g., log, display error message, etc.)
            error_log('Error in resetProgress: ' . $e->getMessage());
            throw new Exception('Failed to reset progress');
        }
    }
}
