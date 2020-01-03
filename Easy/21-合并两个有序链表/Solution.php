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
    function mergeTwoLists($l1, $l2) {
        return $this->mergeTwoLists_v1($l1, $l2);
    }
    function mergeTwoLists_v1($l1, $l2) {
        $now=$l1;
        do{
            if($now->next){
                $now=$now->next;
            }
        }while($now->next);
        $now->next=$l2;
        $now=$l1;
        $p=$l1;
        while($p->next){
            $now=$p;
            while($now->next){
                if($now->val>$now->next->val){
                    $ex=$now->val;
                    $now->val=$now->next->val;
                    $now->next->val=$ex;
                }
                $now=$now->next;
            }
            $p=$p->next;
        }
        return $l1;
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
$input="1->2->4,1->3->4";
[$l1,$l2]=build_input($input);
$l1=construct_list($l1);
$l2=construct_list($l2);
$result=$solution->mergeTwoLists($l1,$l2);
echo "Result:".serialize_list($result);