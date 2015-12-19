<?php

namespace App\Exceptions;

use Bican\Roles\Exceptions\LevelDeniedException;
use Bican\Roles\Exceptions\PermissionDeniedException;
use Bican\Roles\Exceptions\RoleDeniedException;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        ModelNotFoundException::class,
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
        return parent::report($e);
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
        if ($e instanceof ModelNotFoundException) {
            abort(404);
        }
        if ($e instanceof RoleDeniedException) {
            //flash()->error('Your role does not allow you to perform this action!');
            abort(403);
        }
        if ($e instanceof MethodNotAllowedHttpException) {
            abort(401);
        }
        if($e instanceof BadRequestHttpException){
            abort(400);
        }
        return parent::render($request, $e);
    }
}
