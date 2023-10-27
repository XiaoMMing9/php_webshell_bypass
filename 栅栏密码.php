<?php
function railFenceEncrypt($text)
{
    $rails = 3;
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
function decode_ming($str) {
    $n=3;
    $length = strlen($str);
    $table = array();
    $quotient = (int)($length / $n);
    $remainder = $length % $n;
    for ($i = 0; $i < $n; $i++) {
        $table[$i] = array();
    }
    $index = 0;
    for ($i = 0; $i < $n; $i++) {
        $rowCount = $quotient + ($i < $remainder ? 1 : 0);
        for ($j = 0; $j < $rowCount; $j++) {
            $table[$i][$j] = $str[$index++];
        }
    }
    $decodedStr = '';
    for ($i = 0; $i < $quotient + 1; $i++) {
        for ($j = 0; $j < $n; $j++) {
            if (isset($table[$j][$i])) {
                $decodedStr .= $table[$j][$i];
            }
        }
    }
    echo $decodedStr;
}
$text = "ela167531s3456741840rmingt";
$encryptedText = railFenceEncrypt($text);
echo $encryptedText.'</br>';
$ming=decode_ming($encryptedText);


?>
