<?php
function generate(){
    $charset = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()-_=+1234567890';
    $resultString = str_repeat(' ', 25);
    $randomPositions = array_rand(range(0, 24), 5);
    $vowels = 'asert';
    foreach (str_split($vowels) as $index => $char) {
        $resultString[$randomPositions[$index]] = $char;
        if ($index==1){
            echo '$decodedStr[\''.$randomPositions[$index].'\']'.'.';
        }
        echo '$decodedStr[\''.$randomPositions[$index].'\']'.'.';
    }

    foreach (str_split($resultString) as $index => $char) {
        if ($char === ' ') {
            $randomChar = $charset[array_rand(str_split($charset))];
            $resultString[$index] = $randomChar;
        }
    }
    return $resultString;
}
function railFenceEncrypt($text,$rails)
{
    $railFence = array_fill(0, $rails, array());
    $rail = 0;

    for ($i = 0; $i < strlen($text); $i++) {
        $railFence[$rail][] = $text[$i];
        $rail = ($rail + 1) % $rails;
    }

    $encryptedText = "";
    foreach ($railFence as $rail) {
        $encryptedText .= implode("", $rail);
    }

    return $encryptedText;
}

$encryptedText = railFenceEncrypt(generate(),3);
echo "</br>";
echo $encryptedText;


?>
