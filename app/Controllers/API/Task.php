<?php
namespace App\Controllers\API;

use App\Controllers\BaseController;

class Task extends BaseController
{
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

    public function show()
    {
        return $this->response->setStatusCode(200)
            ->setJSON(["message" => "success"]);
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
}
