<?php
namespace App\Controllers\API;

use App\Exceptions\Repository\RequestNotValidException;
use App\Exceptions\Repository\NotFoundInCollectionException;
use Throwable;

class Task extends ApiBaseController
{

    public function index()
    {
        try {
            $data = $this->getCollection();
        } catch (Throwable $exception) {
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
        } catch (Throwable $exception) {
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
     * @throws NotFoundInCollectionException | RequestNotValidException
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

}
