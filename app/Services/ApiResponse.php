<?php

namespace App\Services;

use \Illuminate\Support\Facades\Response;

class ApiResponse
{

    public static function success($data, $message = 'success', $code = 200)
    {
        return Response::json([
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ], $code);
    }

    function list($data, $columns, $message = 'success', $code = 200) 
    {
        return Response::json([
            'message' => $message,
            'code' => $code,
            'data' => $data,
            'columns' => $columns->columns(),
        ], $code);
    }

    public static function error($message = 'Data tidak ditemukan', $code = 404, $data = [])
    {
        if ($code === 0) {
            $code = 500;
        } elseif ($code > 999) {
            $code = 500;
        }

        return Response::json([
            'message' => $message,
            'code' => $code,
            'data' => $data,
        ], $code);
    }
    public static function error_code_log($message = 'Tidak Ditemukan', $log = 'error', $data = null)
    {
        return Response::json([
            'message' => $message,
            'log' => $log,
            'code' => 404,
            'data' => $data,
        ], 500);
    }

    public static function error_code($message = 'Tidak Ditemukan', $code = 404)
    {
        return Response::json([
            'message' => $message,
            'code' => $code,
        ], 500);
    }

    public static function store($data, $message = 'Success')
    {
        return static::success($data, $message, 201);
    }

    public static function update($data, $message = 'Success')
    {
        return static::success($data, $message);
    }

    public static function delete($data, $message = 'Berhasil Menghapus Data')
    {
        return static::success($data, $message);
    }
}