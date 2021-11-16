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
//check image exist or not
if (!function_exists('image_exists')) {
		
    function image_exists($image){

        if($image!=''){

            if(file_exists('uploads/imgs/'.$image)){
                
                return true;	
            }else{

                return false;
            }
        }else{

            return false;
        }
    }
}
?>