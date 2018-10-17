<?php
    class Filters{
        
        public static function str($val){
            return filter_var($val ,FILTER_SANITIZE_STRING);
        }
        public static function email($val){

            return filter_var($val ,FILTER_SANITIZE_EMAIL);
        }
        public static function url($val){

            return filter_var($val ,FILTER_SANITIZE_URL);
        }
     
    }
    //to use

    //$variable  = Filters::str($_POST['str']);
?>