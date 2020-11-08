<?php
namespace LaravelStar\Foundation;

use LaravelStar\Container\Container;

class Application extends Container
{
    protected $basePath;

    public function __construct($basePath = null)
    {
        if ($basePath) {
            $this->setBasePath($basePath);
        }

        $this->registerBaseBindings();

//        $this->registerBaseServiceProviders();

        $this->registerCoreContainerAliases();

        // 真实的Larael并不是在此处设置
        \LaravelStar\Support\Facades\Facade::setFacadeApplication($this);
    }

    public function setBasePath($path){
        $this->basePath = rtrim($path, '\/');
    }

    public function registerBaseBindings(){
        static::setInstance($this);
        $this->instance('app',$this);
    }

    public function registerCoreContainerAliases(){
        $binds = [
            'config' => \LaravelStar\Config\Config::class,
            'cookie' => \LaravelStar\Cookie\Cookie::class,
//            'db' => \LaravelStar\Databases\MySql::class,
            'db' => \LaravelStar\Databases\Oracle::class,

            // Laravel 写法
//            'db' => [\LaravelStar\Databases\Oracle::class,\LaravelStar\Contracts\Databases\DB::class],
        ];
        foreach ($binds as $key=>$bind){
            $this->bind($key,$bind);
        }
    }
}
