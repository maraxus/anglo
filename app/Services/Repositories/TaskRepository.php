<?php
namespace App\Services\Repositories;

use CodeIgniter\Model;

class TaskRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    private $task;

    /**
     * TaskRepository constructor.
     */
    public function __construct(\CodeIgniter\Model $model)
    {
        $this->task = new $model();
    }

    public function getCollection(): iterable
    {
        return $this->task->findAll();
    }

    public function getFromId(int $id): iterable
    {
        return $this->task->find(['id'=>$id]);
    }

    public function create(iterable $data): iterable
    {
        // TODO: Implement create() method.
    }

    public function findWithIdAndUpdate(int $id, iterable $data): iterable
    {
        // TODO: Implement findWithIdAndUpdate() method.
    }

    public function findWithIdAndDelete(int $id): iterable
    {
        // TODO: Implement findWithIdAndDelete() method.
    }
}