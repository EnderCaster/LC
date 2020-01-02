<?php
class Solution
{
    /**
     * @param String $s
     * @return Integer
     */
    function romanToInt($s) {
        return $this->romanToInt_v1($s);
    }
    function romanToInt_v1($s){
        $map=[
            'I'=>1,
            'V'=>5,
            'X'=>10,
            'L'=>50,
            'C'=>100,
            'D'=>500,
            'M'=>1000,
            'IV'=>4,
            'IX'=>9,
            'XL'=>40,
            'XC'=>90,
            'CD'=>400,
            'CM'=>900
        ];
        $length=mb_strlen($s);
        $result=0;
        for($i=0;$i<$length;$i++){
            $current=$s[$i];
            switch($current){
                case 'I':
                case 'X':
                case 'C':
                    if($i+1<$length&&array_key_exists($current.$s[$i+1],$map)){
                        $current=$current.$s[$i+1];
                        $i++;
                    }
            }
            $result+=$map[$current];
        }
        return $result;
    }
}

// To test 
$solution=new Solution();
$inputs=["III","IV","IX","LVIII","MCMXCIV"];
$result=[];
foreach($inputs as $input){
    $result[]=$solution->romanToInt($input);
}
echo "Result:".implode(',',$result);