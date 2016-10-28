<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];


    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        // 因为该文件同样在命名空间 App\Exceptions 内，所以不用再说明完整的命名空间
        if ($e instanceof InvalidArgumentsException) {
            // 可以在这里进一步分析异常所带参数，对异常进行上报或者取消上报
            // 或者进一步修饰异常，或者上报不同类型的异常
        }
        parent::report($e);
    }
    
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e instanceof InvalidArgumentsException) {
            // 可以对特定的异常进行捕捉然后返回/渲染不同的错误页面
            return response()->json(['status' => 'error', 'info' => 'Invalid Argument(s)!'], 400);
        }
        // 使用默认的渲染方法
        return parent::render($request, $e);
    }
}
