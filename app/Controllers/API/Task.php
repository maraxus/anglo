<?php
namespace App\Controllers\API;

use App\Services\Repositories\RepositoryInterface;
use Throwable;

class Task extends ApiBaseController
{

    /**
     * @var RepositoryInterface
     */
    private $tasks;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        // attaching Task Repository service
        $this->tasks = \Config\Services::TaskRepository();
    }

    public function index()
    {
        try {
            $data = $this->tasks->getCollection();
        } catch (Throwable $exception) {
            return $this->createErrorResponse($exception);
        }
        return $this->response->setStatusCode(200)
            ->setJSON($data);
    }

    public function show($id)
    {
        try {
            $data = $this->tasks->getFromId($id);
        } catch (Throwable $exception) {
            return $this->createErrorResponse($exception);
        }

        return $this->response->setStatusCode(200)
            ->setJSON($data);
    }

    public function edit($id)
    {

        return $this->response->setStatusCode(200)
            ->setJSON(["message" => "success"]);
    }

    public function delete($id)
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
