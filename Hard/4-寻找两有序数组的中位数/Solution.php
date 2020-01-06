<?php
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
 }
class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Float
     */
    function findMedianSortedArrays($nums1, $nums2) {
        return $this->findMedianSortedArrays_v2($nums1,$nums2);
    }
    function findMedianSortedArrays_v1($nums1, $nums2) {
        $arr=array_merge($nums1,$nums2);
        sort($arr);
        $length=count($arr);
        $result=0;
        if($length/2){
            $result=$arr[intval($length/2)];
        }else{
            $result=($arr[$length/2]+$arr[$length/2-1])/2;
        }
        return $result;
    }
    function findMedianSortedArrays_v2($nums1, $nums2) {
        $arr=[];
        $i1=0;
        $i2=0;
        do{
            if(!isset($nums1[$i1])&&!isset($nums2[$i2])){
            break;
            }
            if(isset($nums1[$i1])&&$nums1[$i1]<=$nums2[$i2]){
                $arr[]=$nums1[$i1];
                $i1++;
            }elseif(isset($nums2[$i2])){
                $arr[]=$nums2[$i2];
                $i2++;
            }
        }while(True);
        $length=count($arr);
        $result=0;
        if($length/2){
            $result=$arr[intval($length/2)];
        }else{
            $result=($arr[$length/2]+$arr[$length/2-1])/2;
        }
        return $result;
    }
}

// To test 
$solution=new Solution();
$a1=[1,3,4,10];
$a2=[2,8,12];
$result=$solution->findMedianSortedArrays($a1,$a2);
echo "Result:{$result}";