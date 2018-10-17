<?php

    class Session{
        
        
        public static function set($name,$value){
            
            $_SESSION[$name] = $value;
        }
        
        public static function get($name){
            return $_SESSION[$name];
        }
        
        public static function exists($name){
            
            if( isset($_SESSION[$name]) ){
                return true;
            }
            else{
                return false;
            }
        }
        
        public static function remove($name){
            unset($_SESSION[$name]);
        }
    }
?>