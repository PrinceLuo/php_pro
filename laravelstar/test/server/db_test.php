<?php

require_once '../../vendor/autoload.php';

use LaravelStar\Container\Container;

$ioc = new Container();

class mysql implements db
{
    function __construct()
    {
        echo "Object mysql established!\n\r";
    }

    public function index(){
        return 'function triggered!';
    }
}

class Wechat implements CommonPay
{
    public function pay($statement){
        return 'Wechat: '.$statement;
    }
}

class AliPay implements CommonPay
{
    public function pay($statement){
        return 'AliPay: '.$statement;
    }
}

interface CommonPay
{
    function pay($statement);
}

print_r('Run!');
//$ioc->bind(db::class,mysql::class);
//$ioc->bind('db1',mysql::class);
$ioc->bind('db2',function (){
    return (new mysql());
});
//$ioc->bind('db3',(new mysql()));
$ioc->bind('db4',function (){
    return (new mysql());
},true);

//print_r('check bindings: ');
//var_dump($ioc->getBindings());
//print_r('check make: ');
//var_dump($ioc->make('db4'));
