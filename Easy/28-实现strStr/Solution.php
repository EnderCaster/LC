<?php
class Solution {

    /**
     * @param String $haystack
     * @param String $needle
     * @return Integer
     */
    function strStr($haystack, $needle) {
        return $this->strStr_v1($haystack, $needle);
    }
    function strStr_v1($haystack, $needle) {
        if(empty($needle)){
            return 0;
        }
        if(empty($haystack)){
            return -1;
        }
        if(strlen($needle)>strlen($haystack)){
            return -1;
        }
        for($i=0;$i<strlen($haystack);$i++){
            $return=true;
            for($j=0;$j<strlen($needle);$j++){
                if($needle[$j]!=$haystack[$i+$j]){
                    $return=false;
                break;
                }
            }
            if($return){
                return $i;
            }
        }
        return -1;
    }
}
$solution=new Solution();
$haystack="mississippi";
$needle="issip";
$result=$solution->strStr($haystack,$needle);
echo "Result:".$result;