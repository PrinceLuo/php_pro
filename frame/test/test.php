<?php
require_once __DIR__.'/../vendor/autoload.php';
use App\Index;
use LaravelStar\Foundation\Application;

//$app = new Application($_ENV['APP_BASE_PATH'] ?? dir(__DIR__));
$app = new Application(dirname(__DIR__)); // 直接进到此脚本所以要在此创建application
echo (new Index())->index();