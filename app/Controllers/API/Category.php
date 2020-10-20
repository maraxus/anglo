<?php
namespace App\Controllers\API;

use App\Exceptions\Repository\RequestNotValidException;
use App\Services\Repositories\RepositoryInterface;
use Throwable;

class Category extends ApiBaseController
{

    /**
     * @var RepositoryInterface
     */
    private $categories;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        // attaching Task Repository service
        $this->categories = \Config\Services::CategoryRepository();
    }

    public function index()
    {
        try {
            $data = $this->categories->getCollection();
        } catch (Throwable $exception) {
            return $this->createErrorResponse($exception);
        }
        return $this->response->setStatusCode(200)
            ->setJSON($data);
    }

}
