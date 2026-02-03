<?php

//Limits the maximum execution time of the script to 1000 seconds.
set_time_limit(1000);

//Checks if the user enters an input.
if (!isset($_POST['txtInput']))
    die("No password was entered.");

//Create the hash that the program is trying to guess from the user's input.
$password = hash('sha256', $_POST['txtInput']);

//Sets the maximum length of the possible password.
$maxLenght = 8;

//Defines all of the possible characters in the character set.
$characterSet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ*';

//Gets the number of characters.
$characterSetLenght = strlen($characterSet);

//Gets the number of possible combinations.
$possibleCombinations = pow($characterSetLenght, $maxLenght);

//For counting the attempts.
$attemptNum = 1;



//Check if the current combination is the correct password.
function TestPassword($testPassword) {
    global $password;

    return ($password == hash('sha256', $testPassword) ? true : false);
}



//A recursive function that loops over all of the sub-combinations.
function ComboFunc($width, $position = 0, $character = '')
{   
    //Makes the initialisation variables accessible in the function.
	global $password, $characterSet, $characterSetLenght, $possibleCombinations, $attemptNum; 
		
	for ($i = 0; $i < $characterSetLenght; $i++) 
	{
		if ($position < $width - 1) 
		{    
			ComboFunc($width, $position + 1, $character . $characterSet[$i]); 
		}
		     
        if (TestPassword($character . $characterSet[$i]))
        {
            $foundPassword = $character . $characterSet[$i];

            ?>

            <br>
            <small><?= $password ?></small>
            <h1>Password Found!!!</h1>
            <p>Your password was: <strong><?= $foundPassword ?></strong></p>
            <p>It was found on attempt number <strong><?= number_format($attemptNum) ?></strong> out of <strong><?= number_format($possibleCombinations) ?></strong></p>

            <?php

            exit;
        }

        $attemptNum++;
        // echo $character . $characterSet[$i] . "<br>";
	}
}

for ($i = 0; $i < $maxLenght + 1; $i++)
{ 
    ComboFunc($i);
}

?>

<br>
<small><?= $password ?></small>
<h1>Password NOT Found!</h1>
<p>The password that you entered was not found using the provided character set.</p>