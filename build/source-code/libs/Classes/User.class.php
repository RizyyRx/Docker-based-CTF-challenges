<?php
//check if the file has already been included, and if so, not include it again, require it.
require_once "Database.class.php";

class User{

   //executes signup using the credentials
   //returns $error as true or false
   public static function signup($user, $email, $pass, $phone){

       //using password_hash with cost for hashing password before inserting into DB
       //implementing password_hash is a good way to hash passwords that cant be reversible (generating rainbow table is almost impossible)
       $options = ['cost' => 9];
       $hashed_pass=password_hash($pass, PASSWORD_BCRYPT, $options);

       //get DB connection
       $conn=Database::getConnection();
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }

       //query statement for inserting
       $sql = "INSERT INTO `login_credentials` (`username`, `password`, `email`, `phone`) VALUES (?, ?, ?, ?)";
       
       //initialize error as false
       $error = false;
       
       try{

           //using prepared statements.
           $stmt = $conn->prepare($sql);
           if ($stmt === false) {
               throw new Exception('Prepare failed: ' . $conn->error);
           }
           $stmt->bind_param("ssss",$user,$hashed_pass,$email,$phone);
           if ($stmt->execute()) {

               //set error to false if query executed with no error
               $error = false;
           } else {
               // echo "Error: " . $sql . "<br>" . $conn->error;
               $error = $stmt->error;
           }
           $stmt->close();
       }
       catch (mysqli_sql_exception $e) {
           $error = $e->getMessage();  // Capture the exception message
       }
       catch (Exception $e) {
           $error = $e->getMessage();
       }
       finally {
           $conn->close();
       }
   
       //returning error
       return $error;
   }

   //login using username and password
   //succeeds if password on signup DB matches input password
   //sets username to $_SESSION
   public static function login($user,$pass){

       //get DB connection
       $conn=Database::getConnection();
       if ($conn->connect_error) {
           die("Connection failed: " . $conn->connect_error);
       }

       //query statement
       $sql = "SELECT * FROM `login_credentials` WHERE `username` = ? OR `email` = ?";
       try{

           //using prepared statements.
           $stmt=$conn->prepare($sql);
           if ($stmt === false) {
               throw new Exception('Prepare failed: ' . $conn->error);
           }
           $stmt->bind_param("ss",$user,$user);
           $stmt->execute();
           $result=$stmt->get_result();

           if($result->num_rows==1){

               //fetch_assoc returns the value in associative array format
               $row=$result->fetch_assoc();

               //verify password
               if(password_verify($pass,$row['password'])){
                   $username=$row['username'];
                   
                   //set username to $_SESSION
                   Session::set('username',$username);
                   return true;
               }
               else{
                   return false;
               }
           }
           else{
               return false;
           }
           $stmt->close();
       }
       catch (mysqli_sql_exception $e) {
           error_log("SQL Exception: " . $e->getMessage());
       } catch (Exception $e) {
           error_log("Exception: " . $e->getMessage());
       }
   }
}
?>