<?php
class Solution
{
    /**
     * @param String $s
     * @return Boolean
     */
    function isValid($s) {
        return $this->isValid_v1($s);
    }
    function isValid_v1($s) {
        if(empty($s)){
            return true;
        }
        $stack=[];
        $map=[')'=>'(',']'=>'[','}'=>'{'];
        $length=strlen($s);
        for($i=0;$i<$length;$i++){
            $bit=$s[$i];
            if(array_search($bit,$map)!==false){
                $this->push($stack,$bit);
            }
            if(array_key_exists($bit,$map)){
                $should=$this->pop($stack);
                if($should!=$map[$bit]){
                    return false;
                }
            }
        }
        if(empty($stack)){
            return true;
        }
        return false;
    }
    function pop(&$stack){
        $result=$stack[count($stack)-1];
        $stack=array_slice($stack,0,-1);
        return $result;
    }
    function push(&$stack,$val){
        $stack[]=$val;
    }
}

// To test 
$solution=new Solution();
$inputs=["()","()[]{}","(]","([)]","{[]}","{"];
$result=[];
foreach($inputs as $input){
    $res=$solution->isValid($input);
    $result[]=$res?"True":"False";
}
echo "Result:".implode(',',$result);