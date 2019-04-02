<?php

namespace App\Http\Controllers\Crontab;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrontabController extends Controller
{
    public function test1(){
        echo '计划任务';
    }
}
