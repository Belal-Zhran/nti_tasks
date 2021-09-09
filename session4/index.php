<?php  
session_start();

echo 'Name  : '     . $_SESSION['info']['name'].'<br>';
echo 'Email : '     . $_SESSION['info']['email'].'<br>';
echo 'Password  : ' . $_SESSION['info']['password'].'<br>';
echo 'Address: '    . $_SESSION['info']['address'].'<br>';
echo 'LinkedIn  : ' . $_SESSION['info']['linkedin'].'<br>';
echo 'Gender : '    . $_SESSION['info']['gender'].'<br>';




$pic = $_SESSION['info']['pic'];
echo "Profile photo:<br> <a href="."\/uploads/".$pic.">cv</a>";

