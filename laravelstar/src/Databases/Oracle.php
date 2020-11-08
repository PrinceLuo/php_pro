<?php
namespace LaravelStar\Databases;

use LaravelStar\Contracts\Databases\DB;

class Oracle implements DB
{
    public function select(){

        return '操作oracle';
    }
}