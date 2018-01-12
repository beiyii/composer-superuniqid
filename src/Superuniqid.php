<?php
namespace beiyii\superuniqid;
class Superuniqid
{
    private static $_instance = null;

    private function __construct() {
    }
    private function __clone() {
    }
    private static function getInstance() {
        if (is_null ( self::$_instance ) || isset ( self::$_instance )) {
            self::$_instance = new self ();
        }
        return self::$_instance;
    }

    public static function get()
    {
        $t=Superuniqid::getInstance();
        $s=implode("",$_SERVER);
        $p=getmypid ();
        $u=uniqid();
        return $t->getstr($s,4).$t->getstr($p,4).$t->getstr($u,12);
    }
    private function getstr($str,$length){
        $str=md5($str);
        return substr($str,0,$length);
    }
}