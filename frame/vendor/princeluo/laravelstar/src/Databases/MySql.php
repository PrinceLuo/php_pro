<?php
namespace LaravelStar\Databases;

use LaravelStar\Contracts\Databases\DB;

class MySql implements DB
{
    public function select(){

        return '操作mysql';
    }
}