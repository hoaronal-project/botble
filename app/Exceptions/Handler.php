<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     */
    public function report(Exception $exception)
    {
        if ($this->shouldReport($exception) && !$this->isExceptionFromBot()) {
            if (!app()->isLocal()) {
                if (env('TELEGRAM_EXCEPTION_NOTIFY')) {
                    $apiToken = env('TELEGRAM_BOT_TOKEN');
                    $result = (function ($method, $url, $data) {
                        $ch = curl_init();
                        switch ($method) :
                            case "POST":
                                curl_setopt($ch, CURLOPT_POST, 1);
                                if ($data) :
                                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                                endif;

                                break;
                            case "PUT":
                                curl_setopt($ch, CURLOPT_PUT, 1);
                                break;
                            default:
                                if ($data) :
                                    $url = sprintf("%s?%s", $url, http_build_query($data));
                                endif;

                        endswitch;

                        // Optional Authentication:
                        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
                        // curl_setopt($ch, CURLOPT_USERPWD, "username:password");
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
                        $result = curl_exec($ch);
                        if ($result === false || curl_error($ch) || curl_errno($ch)) {
                            $error_msg = curl_error($ch);
                        } else {
                            ;
                        }
                        curl_close($ch);
                        if (isset($error_msg)) {
                            // TODO - Handle cURL error accordingly
                            return response()->json([
                                'error' => true,
                                'type' => 'error',
                                'title' => trans('Whoops!'),
                                'message' => trans('Whoops! There was an error'),
                                'errorMessage' => $error_msg
                            ])->setStatusCode(\Symfony\Component\HttpFoundation\Response::HTTP_BAD_REQUEST);
                        }

                        return $result;
                    })('POST', "https://api.telegram.org/bot$apiToken/sendMessage", [
                        'chat_id' => env('TELEGRAM_CHANNEL_ID'),
                        'text' => $exception->getMessage() . $exception->getLine()
                    ]);
                }
            }
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
