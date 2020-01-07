<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $val
     * @return Integer
     */
    function removeElement(&$nums, $val) {
        return $this->removeElement_v1($nums, $val);
    }
    function removeElement_v1(&$nums, $val) {
        for($i=0;$i<count($nums);$i++){
            for($j=0;$j<count($nums)-$i-1;$j++){
                if($nums[$j]==$val){
                    $ex=$nums[$j+1];
                    $nums[$j+1]=$nums[$j];
                    $nums[$j]=$ex;
                }
            }
        }
        for($i=0;$i<count($nums);$i++){
            if($nums[$i]==$val){
            break;
            }
        }
        return $i;
    }
}
$solution=new Solution();
$input=[4,4];
$result=$solution->removeElement($input,4);
echo "Result:".$result."\n";
echo "[".implode(',',array_slice($input,0,$result))."]";