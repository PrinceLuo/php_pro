<?php
namespace LaravelStar\Container;

use Closure;
use ArrayAccess;

// 创建ioc容器
class Container implements ArrayAccess
{
    // 单例
    protected static $instance;

    // 容器
    protected $bindings = [];
//    protected $aliases = [];

    /**
     * 共享容器，对容器进行单例的创建和运用
     * @var array
     */
    protected $instances = [];

    public function __construct()
    {
    }

    /**
     * @param string $abstract 容器标识
     * @param null $contrete 实例对象/对象地址/闭包
     * @param bool $shared
     */
    public function bind($abstract, $contrete = null, $shared = false){
        $this->bindings[$abstract] = compact('contrete','shared');
    }

    public function singleton($abstract, $contrete = null){
        $this->bind($abstract, $contrete, true);
    }

    /**
     * @param string $abstract 标识
     * @param array $parameters
     * @return mixed object/执行结果
     * @throws \Exception
     */
    public function make($abstract, $parameters = []){
        return $this->resolve($abstract, $parameters);
    }

    //
    protected function resolve($abstract, $parameters = [], $shared = false){


        // 判断是否之前创建过
        if(isset($this->instances[$abstract])){
            return $this->instances[$abstract];
        }

        if(!$this->has($abstract)){
            throw new \Exception("解析的对象不存在".$abstract, 500);
        }

        //
        //return $this->bindings[$abstract];
        $object = $this->bindings[$abstract]['contrete'];
        if($this->bindings[$abstract]['shared']){
            $this->instances[$abstract] = $object;
        }
        if($object instanceof Closure){
            // 执行闭包返回结果
            return $object();
        }

        /*
        // 判断是否为一个object对象
        if(\is_object($object)){
            return $object;
        }else{
            // 创建对象并return
            return new $object(...$parameters);
        }
        */

        // 判断是否为一个object对象
        if(!is_object($object)){
            $object = new $object(...$parameters);
        }

        return $object;
    }

    public function getBindings(){
        return $this->bindings;
    }

    public function instance($abstract, $instance){

        // 从容器中移除
        $this->removeBindings($abstract);
        $this->instances[$abstract] = $instance;
    }

    public function removeBindings($abstract){
        if(!isset($this->bindings[$abstract])){
            return;
        }
        unset($this->bindings[$abstract]);
    }

    public function has($abstract){
        return isset($this->bindings[$abstract])||isset($this->instances[$abstract]);
    }

    // 单例

    public static function setInstance($container = null)
    {
        return static::$instance = $container;
    }

    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static;
        }

        return static::$instance;
    }

    /**
     * Determine if a given offset exists.
     *
     * @param  string  $key
     * @return bool
     */
    public function offsetExists($key)
    {
//        return $this->bound($key);
    }

    /**
     * Get the value at a given offset.
     *
     * @param  string  $key
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->make($key);
    }

    /**
     * Set the value at a given offset.
     *
     * @param  string  $key
     * @param  mixed   $value
     * @return void
     */
    public function offsetSet($key, $value)
    {
//        $this->bind($key, $value instanceof Closure ? $value : function () use ($value) {
//            return $value;
//        });
    }

    /**
     * Unset the value at a given offset.
     *
     * @param  string  $key
     * @return void
     */
    public function offsetUnset($key)
    {
//        unset($this->bindings[$key], $this->instances[$key], $this->resolved[$key]);
    }
}