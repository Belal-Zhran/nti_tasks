<?php
session_start();
/*
Create a form with the following inputs (name, email, password, address, gender, linkedin url) Validate inputs then return message to user . 
* validation rules ... 
name  = [required , string]
email = [required,email]
password = [required,min = 6]
address = [required,length = 10 chars]
gender = [required]
linkedin url = [reuired | url]
Profile image

Store data in your browser then read it in index page
*/

require'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    // define variables and set to empty values
    $name    = $email    = $password    = $address    = $linkedin    = $gender = "";
    $nameErr = $emailErr = $passwordErr = $addressErr = $linkedinErr = $genderErr = $picErr = "";


    // collect value of input field
    $name     = ClearInputs($_POST['name'] );
    $email    = ClearInputs($_POST['email']) ;
    $password =  $_POST['password'] ;
    $address  = ClearInputs($_POST['address']) ;
    $linkedin = ClearInputs($_POST['linkedin']) ;    
    $gender   = $_POST['gender'] ; 



    //Dealing with Name
    if(!validate($name, "empty")){
        $nameErr = "name is required !<br>";
    }else{
        if(!validate($name, "name")){
            $nameErr = "name should be string !<br>"; 
        }else{
            $_SESSION['info']['name'] = $name ;
        }
    }


    //Dealing with Email
    if(!validate($email, "empty")){
        $emailErr = "Email is required !<br>";
    }else{
        if(!validate($email, "email")){
            $emailErr = "Invalid email format<br>"; 
        }else{
            $_SESSION['info']['email'] = $email ;
        }
    }
    
    //Dealing with Password
    if(!validate($password, "empty")){
        $passwordErr = "password is required !<br>";
    }else{
        if(validate($password, "password")){
            $_SESSION['info']['password'] = $password ;
        }else{
            $passwordErr="password too short it should be more than 6 characters";
        }
    }

    //Dealing with Address
    if(!validate($address, "empty")){
        $addressErr = "Address is required !<br>";
    }else{
        if( validate($address ,"address")){
            $_SESSION['info']['address'] = $address ;
        }else{
            $addressErr ="Address lenght should be 10 characters";
        }
    }

     //Dealing with LinkedIn
    if(!validate($linkedin, "empty")){
        $linkedinErr = "LinkedIn is required !<br>";
    }else {
        if (!(validate($linkedin, "url"))) {
            $linkedinErr = "Invalid URL format<br>";
        }else{
            $_SESSION['info']['linkedin'] = $linkedin ;
        }  
        
    }

    //Dealing with Gender
    if(!validate($gender, "empty")){
        $genderErr = "gender is required !<br>";
    }else{
        $_SESSION['info']['gender'] = $gender ;
    }

    //Dealing with Profile Pic

    
    # FILE INFO ... 

   //echo "PicTmp_path :".$PicTmp_path."<br><br>"; => CVtmp_path :C:\xampp\tmp\phpB448.tmp
   //echo "PicName :"    .$PicName."<br><br>" ;    => CVname :Networks, Security and Virtualization.PNG
   //echo "PicSize :"    .$PicSize."<br><br>" ;    => CVsize :118802
   //echo "PicType :"    .$PicType."<br><br>" ;    => CVtype :image/png  

    if(validate($_FILES['ProfilePhoto']['name'], "empty")){

        $PicTmp_path = $_FILES['ProfilePhoto']['tmp_name'];
        $PicName     = $_FILES['ProfilePhoto']['name'];
        $PicSize     = $_FILES['ProfilePhoto']['size'];
        $PicType     = $_FILES['ProfilePhoto']['type'];


        if(validate( $PicType, "photo")){
        
            $extArray = explode('/',$PicType);

            $PhotoName =   rand().time().'.'.$extArray[1];


            $desPath = './uploads/'.$PhotoName;

            if(move_uploaded_file($PicTmp_path,$desPath)){

            $_SESSION['info']['pic']= $PhotoName;
            }else{
                $picErr= "Error In Uploading Try Again";
            }

        }else{
            $picErr= "Not Allowed Extension";
        }


    }else{
        $picErr = "photo Required";
    }


    //Dealing with Errors
    $errors = array ($nameErr, $emailErr, $passwordErr, $addressErr, $linkedinErr, $genderErr,$picErr);

    if(count($errors) > 0){
                
        //Showing Error Messages
        foreach($errors as $index => $errmsg){
                if (empty($errmsg)){
                continue;
                
                }else{
                    echo "<br>".$errmsg."<br>" ;
                }
            }//end foreach
    }else{
        //go to index page
        header("location: http://127.0.0.1:8080/projects/tasks/session4/index.php");
        exit;
    }



}else{
    echo "Sorry !<br>you don't have permission on this page!";
}