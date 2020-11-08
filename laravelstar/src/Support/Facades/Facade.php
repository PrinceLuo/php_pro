<?php

namespace LaravelStar\Support\Facades;

abstract class Facade
{
    protected static $app;
    protected static $resolvedInstances;

//    public static function __callStatic($name, $arguments)
//    {
//        // TODO: Implement __callStatic() method.
//    }

    public static function __callStatic($method, $params = [])
    {
        $instance = static::getFacadeRoot();
        if(!$instance){
            throw new \Exception('对不起，没有找到可解析的对象，请检查 facade 中的getFacadeAccessor 方法设置',500);
        }
        return $instance->$method(...$params);
    }

    public static function getFacadeRoot()
    {
        return static::resolveFacadeInstance(static::getFacadeAccessor());
    }

    public static function resolveFacadeInstance($object)
    {
        // 判断是否为数组
        if(is_object($object)){
            return $object;
        }

        // 判断是否之前创建过
        if(isset(static::$resolvedInstances[$object])){
            return static::$resolvedInstances[$object];
        }

        // 解析实例对象
        return static::$resolvedInstances[$object] = static::$app[$object];
    }

    protected static function getFacadeAccessor()
    {
        throw new \Exception('没有指明 facade 实例对象',500);
    }

    /**
     * Get the application instance behind the facade.
     *
     * @return \LaravelStar\Contracts\Foundation\Application
     */
    public static function getFacadeApplication()
    {
        return static::$app;
    }

    /**
     * Set the application instance.
     *
     * @param  \LaravelStar\Contracts\Foundation\Application  $app
     * @return void
     */
    public static function setFacadeApplication($app)
    {
        static::$app = $app;
    }
}