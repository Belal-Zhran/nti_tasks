<?php

/*
Create a form with the following inputs 
    (name, email, password, address, gender, linkedin url) 
    Validate inputs then return message to user .

* validation rules ... 
name  = [required , string]
email = [required,email]
password = [required,min = 6]
address = [required,length = 10 chars]
gender = [required]
linkedin url = [reuired | url]
*/
function clear_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//echo $_SERVER["REQUEST_METHOD"]."<br><br>";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

 
    // define variables and set to empty values
    $name    = $email    = $password    = $address    = $linkedin    = $gender = "";
    $nameErr = $emailErr = $passwordErr = $addressErr = $linkedinErr = $genderErr = "";

    


    // collect value of input field
    $name     = $_POST['name'] ;
    $email    =  clear_input($_POST['email']) ;
    $password =  $_POST['password'] ;
    $address  =  clear_input($_POST['address']) ;
    $linkedin =  $_POST['linkedin'] ;    
    $gender   = $_POST['gender'] ; 



    //Dealing with Name
    if(empty($name)){
        $nameErr = "name is required !<br>";
    }else{
        if(is_string($name)){
            clear_input($name);
        }else{
            $nameErr = "name should be string !<br>";
        }
    }


    //Dealing with Email
    if(empty($email)){
        $emailErr = "Email is required !<br>";
    }else {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format<br>";
        }else{
            $email = clear_input($_POST["email"]);
        }
        
    }
    
    //Dealing with Password
    if(empty($password)){
        $passwordErr = "password is required !<br>";
    }else{
        if( strlen($password) < 6){
            $passwordErr="password too short it should be more than 6 characters";
        }
    }

    //Dealing with Address
    if(empty($address)){
        $addressErr = "Address is required !<br>";
    }else{
        if(!(strlen($address)==10)){
            $addressErr ="Address lenght should be 10 characters";
        }
        
    }

     //Dealing with LinkedIn
     if(empty($linkedin)){
        $linkedinErr = "LinkedIn is required !<br>";
    }else {
        if (!(filter_var( $linkedin , FILTER_VALIDATE_URL))) {
            $linkedinErr = "Invalid URL format<br>";
        }        
        
    }

    //Dealing with Gender
    if(empty($gender)){
        $genderErr = "gender is required !<br>";
    }


    //Dealing with Errors
    $errors = array ($nameErr, $emailErr, $passwordErr, $addressErr, $linkedinErr, $genderErr);

    if (count($errors) == 0){
        
        echo "Thank you for submiting ^_^";
        
    }elseif(count($errors) > 0){
                
        //Showing Error Messages
        foreach($errors as $index => $errmsg){
                if (empty($errmsg)){
                continue;
                
                }else{
                    echo "<br>".$errmsg."<br>" ;
                }
            }//end foreach
    }



}else{
    echo "Sorry !<br>you don't have permission on this page!";
}