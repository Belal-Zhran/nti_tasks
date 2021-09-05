<?php
/*    >>>>>>>>> Task1 <<<<<<<<<<

Write a PHP program to calculate electricity bill .
Conditions:

    => For first 50 units – 3.50/unit
    => For next 100 units – 4.00/unit
    => For units above 150 – 6.50/unit
    => You can use conditional statements.
*/

$bill;
$units;


if( $units <= 50 ){
    $bill = 3.5*$units;
    echo "Your electricity bill cost: ".$bill;

}elseif( $units > 50 && $units <= 150){
    $bill = 4*$units;
    echo "Your electricity bill cost: ".$bill;

}elseif( $units > 150){
    $bill = 6.5*$units;
    echo "Your electricity bill cost: ".$bill;
    
}else{
    echo "Sorry something wrong about your bill >_< ! ";
}