<?php
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val) { $this->val = $val; }
 }
class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        return $this->addTwoNumbers_v1($l1,$l2);
    }
    function addTwoNumbers_v1($l1, $l2) {
        $root=$l1;
        $acc=0;
        do{
            $l1->val+=$l2?$l2->val:0;
            $l1->val+=$acc;
            $acc=$l1->val-10<0?0:1;
            $l1->val=$l1->val%10;
            if(!$l1->next&&!$l2->next&&!$acc){
                break;
            }
            if(!$l1->next){
                $l1->next=new ListNode(0);
            }
            $l1=$l1->next;
            if(!$l2->next){
                $l2->next=new ListNode(0);
            }
            $l2=$l2->next;
        }while($l1||$l2||$acc);
        return $root;
    }
}
function construct_list(array $array){
    $root=$now=new ListNode($array[0]);
    foreach($array as $val){
        $current=new ListNode($val);
        $now->next=$current;
        $now=$now->next;
    }
    return $root->next;
}
function serialize_list(ListNode $root){
    $result=[];
    do{
        $result[]=$root->val;
        $root=$root->next;
    }
    while($root);
    return implode("->",$result);
}
function build_input($input){
    [$l1,$l2]=explode(',',$input);
    $l1=trim($l1);
    $l2=trim($l2);
    $l1=explode('->',$l1);
    $l2=explode('->',$l2);
    return [$l1,$l2];
}
// To test 
$solution=new Solution();
$input="1->2,1->3->4";
[$l1,$l2]=build_input($input);
$l1=construct_list($l1);
$l2=construct_list($l2);
$result=$solution->addTwoNumbers($l1,$l2);
echo "Result:".serialize_list($result);