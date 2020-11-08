<?php
namespace App;

class Index
{
    public function index(){
//        return app('config')->all();
//        return app('db')->select();
        return \LaravelStar\Support\Facades\DB::select();
    }
}
