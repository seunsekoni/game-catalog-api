<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public static function sendResponse($result=NULL, $message, $execution_time, $print_memory_usage)
    {
        $convertToKB = $print_memory_usage/1024;
        if($result === NULL) {
            $response = [
                'success' => true,
                'message' => $message,
                'execution_time(seconds)' => $execution_time,
                'memory_usage(KB)' => $convertToKB,

                // 'memory_usage(KB)' => $convertToKB.'KB',
            ];
        } else {
            $response = [
                'success' => true,
                'data'    => $result,
                'message' => $message,
                'execution_time(seconds)' => $execution_time,
                'memory_usage(KB)' => $convertToKB,
                // 'memory_usage(KB)' => $convertToKB.'KB',
            ];
        }


        return response()->json($response, 200);
    }

    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public static function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }


        return response()->json($response, $code);
    }

    /**
     * Handles server error response
     *
     * @return \Illuminate\Http\Response
     */
    public static function sendServerError($message)
    {
        return response()->json([
            'success'   => false,
            'message'   => $message
        ], 500);
    }

    /**
     * Return validation error response.
     *
     * @return \Illuminate\Http\Response
     */
    public static function validationErrorResponse($data)
    {
        return response()->json([
            'success'   => false,
            'data'      => $data,
            'message'   => 'Failed validation.'
        ]);
    }
}
