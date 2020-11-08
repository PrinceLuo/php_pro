<?php
require_once __DIR__.'/../vendor/autoload.php';
use LaravelStar\Foundation\Application;

//var_dump((new Application())->getBindings());
//var_dump((new Application())->make('config')->all());
var_dump(app('config')->all());