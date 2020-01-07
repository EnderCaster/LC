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
        if(empty($l1)){
            return $l2;
        }
        if(empty($l2)){
            return $l1;
        }
        $now=$l1;
        do{
            if($now->next){
                $now=$now->next;
            }
        }while($now->next);
        $now->next=$l2;
        $now=$l1;
        $p=$l1;
        //你会写归并为什么还是要冒泡？
        //我开心，你打我呀？
        while($p->next){
            $now=$p;
            $q=$p;
            while($now->next){
                if($now->val<=$q->val){
                    $q=$now;
                }
                $now=$now->next;
            }
            $ex=$q->val;
            $q->val=$p->val;
            $p->val=$ex;
            $p=$p->next;
        }
        return $l1;
    }
    function mergeTwoLists_v2($l1, $l2) {
        $result=new ListNode(0);
        $p=$result;
        do{
            if(!isset($l1)&&!isset($l2)){
            break;
            }
            if(isset($l1)&&(isset($l2)&&$l1->val<=$l2->val || !isset($l2))){
                $p->next=$l1;
                $p=$p->next;
                $l1=$l1->next;
            }elseif(isset($l2)){
                $p->next=$l2;
                $p=$p->next;
                $l2=$l2->next;
            }
        }while(True);
        return $result->next;
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
$input="-2->5,-9->-6->-3->-1->1->6";
[$l1,$l2]=build_input($input);
$l1=construct_list($l1);
$l2=construct_list($l2);
$result=$solution->mergeTwoLists($l1,$l2);
echo "Result:".serialize_list($result);