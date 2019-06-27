<?php

namespace App\Exceptions;

use Carbon\Carbon;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Telegram\Bot\Laravel\Facades\Telegram;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        if ($this->shouldReport($exception)) {
            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001169908452.0'),
                'parse_mode' => 'HTML',
                'text' => "<strong>App name: </strong>" . "iSHARE" . "\n" .
                    "<strong>Time : </strong>" . Carbon::now() . "\n" .
                    "<strong>Line : </strong>" . $exception->getLine() . "\n".
                    "<strong>On file : </strong>" . $exception->getFile() . "\n".
                    "<strong>With error : </strong>" . $exception->getMessage() . "\n".
                    "<strong>Status code : </strong>" . $exception->getCode(). "\n".
                    "<i>Message has send form Telegram bot of iSHARE website</i>"
            ]);
        }
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }
}
