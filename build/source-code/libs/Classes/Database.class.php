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
    public static function setComment($player,$username, $comment)
    {
        try {
            $conn = Database::getConnection();
            $sql = "INSERT INTO comments (player,username, comment, comment_time) VALUES (?, ?, ?, now())";
            $stmt = $conn->prepare($sql);

            $stmt->bind_param("sss",$player, $username, $comment);

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
}
