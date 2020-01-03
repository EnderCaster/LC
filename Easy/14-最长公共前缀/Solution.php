<?php
class Solution
{
    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        return $this->longestCommonPrefix_v1($strs);
    }
    function longestCommonPrefix_v1($strs){
        $result="";
        foreach($strs as $str){
            $min_length=isset($min_length)&&$min_length<strlen($str)?$min_length:strlen($str);
        }
        for($i=0;$i<$min_length;$i++){
            if(!$this->check($strs,$i)){
                return $result;
            }
            $result.=$strs[0][$i];
        }
        return $result;
    }
    function check($strs,$index){
        $result=true;
        $length=count($strs);
        for($i=0;$i<$length-1;$i++){
            if($strs[$i][$index]!=$strs[$i+1][$index]){
                $result=false;
            break;
            }
        }
        return $result;
    }
}

// To test 
$solution=new Solution();
// $inputs=["III","IV","IX","LVIII","MCMXCIV"];
$inputs=["flower","flow","flight"];
$result=$solution->longestCommonPrefix($inputs);
echo "Result:\"".$result."\"";