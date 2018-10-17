<?php
    
    class FileUpload{
        
        private $errors = array();
        
        private $bool = true;
        
        private $newname;
        
        /*  DIRECTORY */
        
        private $dir = '../../../images/';
        public function image($file){
            
            $extentions = array('jpg','jpeg','bitmap','png');
            
            $name = $_FILES[$file]['name'];
            $tmp  = $_FILES[$file]['tmp_name'];
            
            $ext = explode('.',$name);
            $ext = strtolower(end($ext));
            
            if(empty($name)){
                $this->addError("File is empty");
            }
            
            if(!in_array($ext , $extentions)) {
                $this->addError("Your File Extension '{$ext}' is not supported.");
                $this->bool = false;
            }
            
            
            /*Check if Errors is empty*/
            
            if(!empty($this->errors)){
                return false;
            }
            else{
                $newname = uniqid('',true).'.'.$ext;
                $this->newname = $newname;
                
                if( move_uploaded_file($tmp , $this->dir.$newname) ){
                    return true;
                }
                else{
                    return false;
                }
            }
        }
        
        private function addError($error){
            $this->errors[] = $error;
        }
        public function errors(){
            return $this->errors;
        }
        
        public function newName(){
            return $this->newname;
        }
        
        
    }
?>