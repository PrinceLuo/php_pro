<?php

use LaravelStar\Foundation\Application;

if (! function_exists('app')) {
    /**
     * 应用程序的助手函数，可以快速调用解析哈数的实例方法make
     *
     * @param  string  $abstract
     * @param  array   $parameters
     * @return mixed|\LaravelStar\Foundation\Application
     */
    function app($abstract = null, array $parameters = [])
    {
        if (is_null($abstract)) {
//            return Container::getInstance();
            return Application::getInstance();
        }

        return Application::getInstance()->make($abstract, $parameters);
    }
}