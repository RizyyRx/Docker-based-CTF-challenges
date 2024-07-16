<?php
class Session
{
    //starts session
    public static function start(){
        session_start();
    }

    //sets key and value to the $_SESSION array
    public static function set($key, $value){  
        $_SESSION[$key] = $value;
    }

    //unsets all variables in $_SESSION
    public static function unset(){
        session_unset();
    }

    //destroys the session
    public static function destroy(){
        session_destroy();
    }

    //deletes a $_SESSION variable using key name 
    public static function delete_session($key){ 
        unset($_SESSION[$key]);
    }

    //checks if key is set on $_GET array
    public static function isset_get($key){ 
        return isset($_GET[$key]);
    }

    //checks if key is set on $_SESSION array
    public static function isset_session($key){ 
        return isset($_SESSION[$key]);
    }

    //fetches value on $_SESSION using key
    public static function get($key, $default = false){
        if (Session::isset_session($key)) {
            return ($_SESSION[$key]); //returns the key
        } 
        else {
            return $default; //returns false if no such key exists
        }
    }


}

?>