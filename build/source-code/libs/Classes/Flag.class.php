<?php
class Flag
{
	public static function setFlag($challenge_name, $flag)
	{
		$options = ['cost' => 9];
		$hashed_flag = password_hash($flag, PASSWORD_BCRYPT, $options);

		//get DB connection
		$conn = Database::getConnection();
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		//query statement for inserting
		$sql = "INSERT INTO `flags` (`challenge_name`, `flag`) VALUES (?, ?)";

		try {
			//using prepared statements.
			$stmt = $conn->prepare($sql);
			if ($stmt === false) {
				throw new Exception('Prepare failed: ' . $conn->error);
			}

			$stmt->bind_param("ss", $challenge_name, $hashed_flag);
			if ($stmt->execute()) {
				print("Query successful");
			} else {
				throw new Exception('Execute failed: ' . $stmt->error);
			}
		} catch (mysqli_sql_exception $e) {
			// Capture and handle SQL exceptions
			$error = 'MySQLi SQL Exception: ' . $e->getMessage();
			error_log($error);
			print($error);
		} catch (Exception $e) {
			// Capture and handle general exceptions
			$error = 'General Exception: ' . $e->getMessage();
			error_log($error);
			print($error);
		}
	}

	public static function verifyFlag($challenge_name,$flag)
	{
		//get DB connection
		$conn = Database::getConnection();
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT `flag` FROM `flags` WHERE `challenge_name` = ?";

		try {
			//using prepared statements.
			$stmt = $conn->prepare($sql);
			if ($stmt === false) {
				throw new Exception('Prepare failed: ' . $conn->error);
			}

			$stmt->bind_param("s", $challenge_name);
			$stmt->execute();
			$result = $stmt->get_result();

			if ($result->num_rows == 1) {
				// Fetch the row
				$row = $result->fetch_assoc();

				//verify password
				if (password_verify($flag, $row['flag'])) {
					return true;
				} else {
					return false;
				}
			} else {
				return false;
			}
		} catch (mysqli_sql_exception $e) {
			error_log("SQL Exception: " . $e->getMessage());
			return false;
		} catch (Exception $e) {
			error_log("Exception: " . $e->getMessage());
			return false;
		}
	}
}
