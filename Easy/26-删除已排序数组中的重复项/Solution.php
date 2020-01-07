<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function removeDuplicates(&$nums) {
        return $this->removeDuplicates_v1($nums);
    }
    function removeDuplicates_v1(&$nums) {
        if(empty($nums)){
            return 0;
        }
        $head=0;
        for($i=0;$i<count($nums);$i++){
            if($nums[$head]<$nums[$i]){
                $ex=$nums[$head+1];
                $nums[$head+1]=$nums[$i];
                $nums[$i]=$ex;
                $head++;
            }
        }
        return $head+1;
    }
}
$solution=new Solution();
$input=[0,0,1,1,1,2,2,3,3,4,4];
$result=$solution->removeDuplicates($input);
echo "Result:".$result."\n";
echo "[".implode(',',array_slice($input,0,$result))."]";