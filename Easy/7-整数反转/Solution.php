<?php
class Solution
{
    public static $INT_MIN=0;
    public static $INT_MAX=0;
    function __construct(){
        self::$INT_MIN=-pow(2,31);
        self::$INT_MAX=pow(2,31)-1;
    }
    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        return $this->reverse_v1($x);
    }
    function reverse_v1($x){
        if($x>-10 && $x < 10){
            return $x;
        }
        // convert to string
        $x="{$x}";
        $sign=1;
        if($x[0]=='-'){
            $sign=-1;
        }
        if($x[0]=='-'||$x[0]=='+'){
            $x=substr($x,1,strlen($x));
        }
        //exchange
        $length=mb_strlen($x);
        for($i=0;$i<$length/2;$i++){
            $ex=$x[$length-1-$i];
            $x[$length-1-$i]=$x[$i];
            $x[$i]=$ex;
        }
        $result=$sign*intval($x);
        if($result>self::$INT_MAX||$result<self::$INT_MIN){
            $result=0;
        }
        return $result;
    }
    function reverse_v2($x){

    }
}

// To test 
$solution=new Solution();
$x=-3290;
$result=$solution->reverse($x);
echo 'Result:'.$result;