<?php

        class Message{
            
            public static set($type , $message){
                $_SESSION['message_type'] = $type;
                $_SESSION['message']      = $message;
            }
            
            public static type(){
                return $_SESSION['message_type'];
            }
            
            public static get(){
                return $_SESSION['message'];
            }
            
            public static function end(){
                unset($_SESSION['message_type']);
                unset($_SESSION['message']);
            }
        }
?>