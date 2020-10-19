<?php
namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Exceptions\Repository\NotFoundInCollectionException;
use App\Exceptions\Repository\RequestNotValidException;

class ApiBaseController extends BaseController
{
    protected static $notValidMessage = "There's a error with the request";
    protected static $notFoundMessage = "Can't complete operation because the task wasn't identified in the collection";
    protected static $uncaughtMessage = "A unexpected error occurred";

    protected function createErrorResponse (\Throwable $exception)
    {
        if ($exception instanceof NotFoundInCollectionException) {
            $data['message'] = static::$notFoundMessage;
            $this->response->setStatusCode(404);
            return $this->response->setJSON($data);
        }
        if ($exception instanceof RequestNotValidException) {
            $data['message'] = static::$notValidMessage;
            $this->response->setStatusCode(403);
            return $this->response->setJSON($data);
        }
        $data['message'] = static::$uncaughtMessage;
        $data['body']['message'] = $exception->getMessage();
        $this->response->setStatusCode(500);
        return $this->response->setJSON($data);
    }

}