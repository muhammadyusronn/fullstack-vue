<?php
if (!function_exists('successRespond')) {
    function successRespond($message = 'Data Berhasil Disimpan!', $code = 200,)
    {
        return [
            'statusCode' => $code,
            'message'    => $message,
        ];
    }
}

if (!function_exists('errorRespond')) {
    function errorRespond($message = null, $code = 400,)
    {
        return [
            'statusCode' => $code,
            'message'    => $message,
        ];
    }
}

if (!function_exists('getRespond')) {
    function getRespond($data = null)
    {
        return [
            'statusCode' => 200,
            'message'    => 'OK',
            'data'    => $data,
        ];
    }
}
