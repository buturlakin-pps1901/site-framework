<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 09.04.2018
 * Time: 21:52
 */

class P{
    static function StatFunc(){
        echo "Parent static function\n";
        echo get_called_class(),"\n";
    }

    static function ReadNew(){
        $reflection=new ReflectionClass(get_called_class());
        return $reflection->newInstance();
    }
}

class C extends P{

}

$o=C::ReadNew();
var_dump($o);