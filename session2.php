<?php 

/*             >>>>>>>>>>>> TASK 1 <<<<<<<<<<<<<
        Write a PHP function to print the next character of a specific character.
        input : 'a'
        Output : 'b'
        input : 'z'
        Output : 'a'


              >>>>>>>>>>>> TASK 2 <<<<<<<<<<<<<
        Write a PHP function to extract the file name from the following string.
        input : 'www.example.com/public_html/index.php'
        Output : 'index.php'
 */

// Function of the first task
function next_letter ($letter){

        $letters = array( "a", "b", "c", "d", "e", "f", "g",
        "h", "i", "j", "k","l", "m", "n", "o",
        "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

        if ($letter == "z"){
            return "z is the last letter so the output is: a";
        }else{
            
            foreach ( $letters as $key => $value){

            
                if($letter == $value){
                    return "The next letter is: ". $letters[++$key];
                }
            
            }
            

        }


}

// Function of the first task with ASKI code
function Anext_letter ($letter){
    $ASKI = ord($letter);

    if ( $letter == "z" || $letter == "Z"){

        if ($letter == "z"){
            return "z is the last letter so the output is: a";
        }elseif( $letter == "Z"){
            return "Z is the last letter so the output is: A";
        }

    }else{
    return chr((++$ASKI));
    }

}

// Function of the second task
function pick_file_name ($line){

   // $file_types = array ("php","html","css","js");

  $separated = explode("/",$line);
  $file_name = $separated[(count($separated)-1)];
  return $file_name;
 
}



//out put of the first task

echo "First task :<br><br>";

echo "The input is: k<br>";
$letter1 = "k";
echo next_letter($letter1);//or next_letter($litter);  by replacing return in function with echo;"

echo "<br>With ASKI function: ".Anext_letter($letter1);
echo "<br><br>";

echo "The input is: z<br>";
$letter2 = "z";
echo next_letter($letter2);//or next_letter($litter);  by replacing return in function with echo;"
echo "<br>With ASKI function: ".Anext_letter($letter2);
echo "<br><br><br>";

//out put of the  task

echo "Second task :<br>";
$link = "www.example.com/public_html/index.php";
echo "The Text is: ".$link."<br>The file name is: ".pick_file_name($link);


