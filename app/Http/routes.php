<?php

// 如果不使用 use 引用，那么抛出异常时需要使用这个：
// throw new \App\Exceptions\InvalidArgumentsException;
// 因为本文件处于全局命名空间中，因此上述的 App 前的反斜杠可以不写
// 但如果某文件在某命名空间内的话，就需要使用下面的 use 声明，或者使用 line 4 的语法抛出异常
use App\Exceptions\InvalidArgumentsException;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    // 这里就先不调用控制器了，效果差不多
    throw new InvalidArgumentsException;
});
