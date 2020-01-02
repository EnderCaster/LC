<?php
class Solution
{
    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        return $this->isPalindrome_v1($x);
    }
    function isPalindrome_v1($x){
        if($x<0){
            return false;
        }
        $x="{$x}";
        $length=mb_strlen($x);
        for($i=0;$i<($length/2);$i++){
            $j=$length-1-$i;
            if($x[$i]!=$x[$j]){
                return false;
            }
        }
        return true;
    }
}

// To test 
$solution=new Solution();
$x=-3290;
$result=$solution->isPalindrome($x);
$result=$result?"True":"False";
echo 'Result:'.$result;