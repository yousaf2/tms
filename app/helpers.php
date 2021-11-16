<?php
//convert object to array
if(!function_exists('convert_object_to_array')){
		
    function convert_object_to_array($object){

        foreach($object as $value){
            
            $converted_array[] =  (array) $value;
        }
        
        return $converted_array;
    }
}
?>