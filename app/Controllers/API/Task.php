<?php
namespace App\Controllers\API;

use App\Controllers\BaseController;
use App\Exceptions\Repository\RequestNotValidException;
use App\Exceptions\Repository\NotFoundInCollectionException;

class Task extends BaseController
{
    protected static $notValidMessage = "There's a error with the request";
    protected static $notFoundMessage = "Can't complete operation because the task wasn't identified in the collection";
    protected static $uncaughtMessage = "A unexpected error occurred";

    public function index()
    {
        try {
            $data = $this->getCollection('task');
        } catch (\Throwable $exception) {
            $data['message'] = "Sorry, couldn't get Collection";
            $data['body']['message'] = $exception->getMessage();
            return $this->response->setStatusCode(500)
                ->setJSON($data);
        }
        return $this->response->setStatusCode(200)
            ->setJSON($data);
    }

    public function show($id)
    {
        try {
            $data = $this->getFromId($id);
        } catch (\Throwable $exception) {
            return $this->createErrorResponse($exception);
        }

        return $this->response->setStatusCode(200)
            ->setJSON(["message" => "success", "body" => $data]);
    }

    public function edit()
    {
        return $this->response->setStatusCode(200)
            ->setJSON(["message" => "success"]);
    }

    public function delete()
    {
        return $this->response->setStatusCode(200)
            ->setJSON(["message" => "success"]);
    }

    public function create()
    {
        return $this->response->setStatusCode(200)
            ->setJSON(["message" => "success"]);
    }

    protected function getCollection() : Iterable
    {
        return ["test"];
    }


    /**
     * @throws \App\Exceptions\Repository\NotFoundInCollectionException | \App\Exceptions\Repository\RequestNotValidException
     */
    protected function getFromId(int $id) : Iterable
    {
        if ($id == 1) {
            throw new NotFoundInCollectionException();
        } elseif ($id == 5) {
            throw new RequestNotValidException();
        }
        return ["test2"];
    }

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
