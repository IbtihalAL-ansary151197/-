<?php

class  validetor {

    
function clean($input){

    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    $input = trim($input);

    return $input;

}
   
function validate($input,$flag,$length = 6){
   
    $status = true;

    switch ($flag) {
        case 1:
            # code...
            if(empty($input)){
                $status = false;
            }
            break;

        case 2: 
            # code ... 
             if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
                $status = false;
             }
            break;
        
        case 3: 
            #code ... 
            if(strlen($input) < 6 ){
                $status = false;
            }    
            break;

            case 4: 
                # code ... 
           if(!filter_var($input,FILTER_VALIDATE_NAME)){
                    $status = false;
                 }
                break;
           # code ...
           case 5:  
           if(!filter_var($input,FILTER_VALIDATE_INT)){
            $status = false;
         }
        break;   
        
        case 6: 
            # code ... 
            $allowdEx  = ['png','jpg','jpeg'];
 
             if(!in_array($input,$allowdEx)){
                 $status = false;

             }
             break;
    }
    return $status;

}
}
$obj = new validetor();
// var_dump($obj->validate('1',7));
// var_dump($obj->validate('',7));



?>