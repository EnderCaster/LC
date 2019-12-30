<?php
class Solution
{

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target)
    {
        return $this->twoSum_v1($nums,$target);
    }
    function twoSum_v1($nums,$target){
        //
        foreach($nums as $key_1=>$v_1){
            foreach($nums as $key_2=>$v_2){
                if($key_1===$key_2){
                    continue;
                }
                if($v_1+$v_2===$target){
                    return [$key_1,$key_2];
                }
            }
        }
        return [];
    }
}

// To test 
$solution=new Solution();
$nums=[2,7,11,19];
$target=9;
$result=$solution->twoSum($nums,$target);
echo 'Result:['.implode(',',$result).']';