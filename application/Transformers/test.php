<?php
/**
 * Trait Responder
 * Dingo/Api Format Response Trait
 */

namespace App\Libraries\QeeZer\Api;

use Dingo\Api\Routing\Helpers;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\Paginator;
use App\Libraries\QeeZer\Api\CustomSerializer;

trait Responder
{
    use Helpers;

    public function responseCollection(Collection $collection, $transformer)
    {
        return $this->response->collection($collection, $transformer, [], function ($resource, $fractal) {
            $fractal->setSerializer(new CustomSerializer());
        });
    }

    public function responseItem($item, $transformer)
    {
        return $this->response->item($item, $transformer, [], function ($resource, $fractal) {
            $fractal->setSerializer(new CustomSerializer());
        });
    }

    public function responsePaginator(Paginator $paginator, $transformer)
    {
        return $this->response->paginator($paginator, $transformer, [], function ($resource, $fractal) {
            $fractal->setSerializer(new CustomSerializer());
        });
    }

    public function responseData(array $data, $message='成功')
    {
        return response()->json([
            'message' => $message,
            'status_code' => 200,
            'status' => 1,
            'data' => $data
        ], 200);
    }

    public function responseSuccess($message='成功')
    {
        return response()->json([
            'message' => $message,
            'status_code' => 200,
            'status' => 1
        ], 200);
    }

    /**
     * 前段要求 失败的200请求提示
     */
    public function responseFailedInfo($message='失败')
    {
        return response()->json([
            'message' => $message,
            'status_code' => 200,
            'status' => 0
        ], 200);
    }

    public function responseNoAuthenticate($message='未登录')
    {
        return response()->json([
            'message' => $message,
            'status_code' => 401,
            'status' => 0
        ], 401);
    }

    public function responseFailed($message='失败')
    {
        return response()->json([
            'message' => $message,
            'status_code' => 400,
            'status' => 0
        ], 400);
    }

    public function responseError($message='未知错误')
    {
        return response()->json([
            'message' => $message,
            'status_code' => 500,
            'status' => 0
        ], 500);
    }

    public function responseCreated($message='成功')
    {
        return response()->json([
            'message' => $message,
            'status_code' => 201,
            'status' => 1
        ], 201);
    }
}
