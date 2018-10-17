<?php
    

    function getParts($type = 1){
        
        $sql = "SELECT * FROM tbl_parts where part_type ='$type'";
        
        return $sql;
    }
?>