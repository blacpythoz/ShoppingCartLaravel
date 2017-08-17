<?php
/**
 * Created by PhpStorm.
 * User: Amar
 * Date: 12/31/2016
 * Time: 12:23 AM
 */

namespace NicoSystem\Foundation;


use Illuminate\Http\Response;

trait NicoResponseTraits
{
    protected $api = true;
    /**
     * @param mixed $body
     * @param int $status
     * @param string $message
     * @param string $messageCode
     * @param array $headers
     * @return mixed
     */
    public function nicoResponse($body, $status=Response::HTTP_OK, $message='OK', $messageCode='ok', $headers = []){
        return response()->json([
            'body'=>$body,
            'status'=>[
                'message'=>$message,
                'code'=>$messageCode
            ]
        ],$status)->withHeaders($headers);

    }

    /**
     * @param $body
     * @param string $message
     * @param string $messageCode
     * @param array $headers
     * @return mixed
     */
    public function responseOk($body,$message='ok',$messageCode='ok',$headers =[]){
        return $this->nicoResponse($body,Response::HTTP_OK,$message,$messageCode,$headers);
    }

    /**
     * @param $body
     * @param int $status
     * @param string $message
     * @param string $messageCode
     * @param array $headers
     * @return mixed
     */
    public function responseError($body,$status=Response::HTTP_INTERNAL_SERVER_ERROR,$message='server error',$messageCode='server_error',$headers=[]){
        return $this->nicoResponse($body,$status,$message,$messageCode,$headers);
    }

    /**
     * @param string $message
     * @param string $code
     * @param array $headers
     * @return mixed
     */
    public function responseServerError($message='internal server error occured',$code='internal_server_error',$headers=[]){
        return $this->responseError(null,Response::HTTP_INTERNAL_SERVER_ERROR,$message,$code);
    }

    /**
     * @param string $message
     * @param string $code
     * @param array $headers
     * @return mixed
     */
    public function responseUnAuthorize($message = 'unauthorized',$code = 'unauthorized',$headers=[]){
        return $this->responseError(null,Response::HTTP_UNAUTHORIZED,$message, $code,$headers);
    }

    /**
     * @param string $message
     * @param string $code
     * @param array $headers
     * @return mixed
     */
    public function responseForbidden($message = 'forbidden',$code = 'forbidden',$headers=[]){
        return $this->responseError(null,Response::HTTP_FORBIDDEN,$message,$code,$headers);
    }

    /**
     * @param string $message
     * @param string $code
     * @param array $headers
     * @return mixed
     */
    public function responseNotFound($message = 'not found',$code = 'not_found',$headers=[]){
        return $this->responseError(null,Response::HTTP_NOT_FOUND,$message,$code,$headers);
    }

    /**
     * @param string $message
     * @param string $code
     * @param array $headers
     * @return mixed
     */
    public function responseBadRequest($message = 'bad request',$code ='bad_request',$headers=[]){
        return $this->responseError(null,Response::HTTP_BAD_REQUEST,$message,$code,$headers);
    }

    /**
     * @param string $body
     * @param string $message
     * @param string $code
     * @param array $headers
     * @return mixed
     */
    public function responsePreConditionFailed($body='',$message='precondition failed',$code='precondition_failed',$headers=[]){
        return $this->responseError($body,Response::HTTP_PRECONDITION_FAILED,$message,$code,$headers);
    }

    /**
     * @param null $body
     * @param string $message
     * @param string $code
     * @param array $headers
     * @return mixed
     */
    public function responseConflict($body=null,$message='conflict',$code='conflict',$headers=[]){
        return $this->responseError($body,Response::HTTP_CONFLICT,$message,$code,$headers);
    }

    /**
     * @param null $body
     * @param string $message
     * @param string $code
     * @param array $headers
     * @return mixed
     */
    public function responseExpectationFailed($body=null,$message='expectation failed',$code='expectation_failed',$headers=[]){
        return $this->responseError($body,Response::HTTP_EXPECTATION_FAILED,$message,$code,$headers);
    }

    /**
     * @param null $body
     * @param string $message
     * @param string $code
     * @param array $headers
     * @return mixed
     */
    public function responseValidationError($body=null,$message='form validation failed',$code='form_validation_error',$headers=[]){
        return $this->responseError($body,Response::HTTP_EXPECTATION_FAILED,$message,$code,$headers);
    }

}