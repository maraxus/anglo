<?php
namespace App\Controllers\API;

use App\Controllers\BaseController;

class Task extends BaseController
{
    public function index()
    {
        return $this->response->setStatusCode(200)
            ->setJSON(["message" => "success"]);
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
}
