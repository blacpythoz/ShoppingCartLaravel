<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Response;

trait CustomResponse {

    /**
     * @param $body
     * @param int $status
     * @param string $message
     * @param string $messageCode
     * @param array $headers
     * @return $this
     */
    public static function mainResponse($body, $status=Response::HTTP_OK, $message='OK', $messageCode='ok', $headers = []){
        return response()->json([
                'body'=>$body,
                'status'=>[
                    'message'=>$message,
                    'code'=>$messageCode
                ]
            ],$status)->withHeaders($headers);
        }
}