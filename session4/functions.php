<?php

function validate($input,$flag){

    $status = true;
    
    switch ($flag) {

        case "empty":
             //check if it's an empty input
            if(empty($input)){
                $status = false;
            }
            break;
    
        case "name":
            //validate name
            if(!preg_match('/^[a-zA-Z\s]*$/',$input)){
                $status = false;
            }
            break;
    
        case "email": 
            //validate email
            if(!filter_var($input,FILTER_VALIDATE_EMAIL)){
                $status = false;
            } 
            break; 

        case "password": 
            //check the password length
            if( strlen($input) < 6){
                $status = false;
            } 
            break;
            
        case "address": 
            //check the address length
            if( !(strlen($input) == 10) ){
                $status = false;
            } 
            break; 
        
        case "url": 
            //validate URL
            if(!filter_var($input, FILTER_VALIDATE_URL)){
                $status = false;
            } 
            break; 
    
    
        case 'photo': 
            $allowedExt = array("JPEG",
                                "JPG" ,
                                "png" ,
                                "GIF" ,
                                "TIFF",
                                "PSD" ,
                                "PDF" ,
                                "EPS" ,
                                "AI"  ,
                                "INDD",
                                "RAW");
    
            $extArray = explode('/',$input);
            $status = false;

            foreach ($allowedExt as $extention){

                if(in_array($extArray[1],$allowedExt)){
                    $status = true;
                }
            }
    
        break;
    
    }
    
        return $status;
    
    }
    
    
    
    
    
    function ClearInputs($input){
        
        $input = trim($input);
        $input = stripcslashes($input);
        $input = htmlspecialchars($input);
    
        return $input;
    }