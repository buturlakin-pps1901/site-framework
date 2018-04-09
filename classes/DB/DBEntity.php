<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 09.04.2018
 * Time: 21:45
 */

namespace DB;


abstract class DBEntity
{
    protected $keyName;

    protected $keyType;

    protected $tableName;

    protected $keyValue;

    abstract protected function GetTable():string;

    abstract protected function GetKeyName():string;

    abstract protected function GetKeyType():string;

    private $valuesCache=[];

    public static function Read($id){
        return ReadedEntity::ReadObject(get_called_class(),$id);
    }

    public function __construct($key)
    {
        $this->keyValue=$key;
    }

    function getValue($param){
        if(array_key_exists($param,$this->valuesCache)){
            return $this->valuesCache[$param];
        }

    }

}

class ReadedEntity{
    private $className;
    private $keyValue;
    private $object;
    /** @var ReadedEntity[]  */
    private static $readedEnties=[];

    public static function ReadObject($className,$keyValue):DBEntity{
        foreach (self::$readedEnties as $readedEntity){
            if($readedEntity->className==$className and $readedEntity->keyValue==$keyValue){
                return $readedEntity->object;
            }
        }
        try {
            $reflection = new \ReflectionClass($className);
        }catch (\ReflectionException $ex){

        }
        /** @var DBEntity $object */
        $object=$reflection->newInstance($keyValue);
        $readedEntity=new ReadedEntity($className,$keyValue,$object);
        self::$readedEnties[]=$readedEntity;
        return $object;
    }

    function __construct($className,$keyValue,$object)
    {
        $this->keyValue=$keyValue;
        $this->className=$className;
        $this->object=$object;
    }
}