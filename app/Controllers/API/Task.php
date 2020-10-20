<?php
namespace App\Controllers\API;

use App\Exceptions\Repository\RequestNotValidException;
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
        $fields = $this->request->getJSON(true);
        if($fields === null) {
            return $this->createErrorResponse(new RequestNotValidException("json invalid"));
        }
        try {
            $this->tasks->findWithIdAndUpdate($id, $fields);
            return $this->response->setStatusCode(204);
        } catch (Throwable $exception) {
            return $this->createErrorResponse($exception);
        }
    }

    public function delete($id)
    {
        try {
            $this->tasks->findWithIdAndDelete($id);
        } catch (Throwable $exception) {
            return $this->createErrorResponse($exception);
        }
        return $this->response->setStatusCode(204);
    }

    public function create()
    {
        try {
            $fields = $this->request->getJSON(true);
            if($fields === null) {
                return $this->createErrorResponse(new RequestNotValidException("json invalid"));
            }
            $data = $this->tasks->create($fields);
        } catch (Throwable $exception) {
            return $this->createErrorResponse($exception);
        }

        return $this->response->setStatusCode(200)
            ->setJSON($data);
    }

}
