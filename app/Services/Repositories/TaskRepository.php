<?php
namespace App\Services\Repositories;

use App\Exceptions\Repository\NotFoundInCollectionException;
use App\Exceptions\Repository\RequestNotValidException;
use CodeIgniter\Model;

class TaskRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    private $task;

    private $validation;

    /**
     * TaskRepository constructor.
     */
    public function __construct(\CodeIgniter\Model $model,\CodeIgniter\Validation\Validation $validation )
    {
        $this->task = new $model();
        $this->validation = $validation;
        $rules = $this->task->getValidationRules();
        $messages = $this->task->getValidationMessages();
        $this->validation->setRules(
            $rules,
            $messages
        );
    }

    public function getCollection(): iterable
    {
        return $this->task->findAll();
    }

    public function getFromId(int $id): iterable
    {
        return $this->task->find(['id'=>$id]);
    }

    public function create(array $fields): array
    {
        try {
            $this->ensureValidData($fields);
            return [
                'id' => $this->task->insert($fields)
            ];
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }

    public function findWithIdAndUpdate(int $id, array $data): void
    {
        try {
            $this->ensureValidData($data);
            $task = $this->task->find($id);
            if ($task === null) {
                throw new NotFoundInCollectionException();
            }
            $this->task->update($id, $data);
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }

    public function findWithIdAndDelete(int $id): void
    {
        try {
            $task = $this->task->find($id);
            if ($task === null) {
                throw new NotFoundInCollectionException();
            }
            $this->task->delete($id);
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }

    /**
     * @throws  RequestNotValidException
     */
    public function ensureValidData(array $data): void
    {
        $validates = $this->validation->run($data);
        if (!$validates) {
            $exception = new RequestNotValidException();
            $exception->setErrors($this->validation->getErrors());
            throw $exception;
        }
    }
}