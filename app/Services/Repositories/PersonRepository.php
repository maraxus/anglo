<?php
namespace App\Services\Repositories;


use App\Exceptions\Repository\NotFoundInCollectionException;
use App\Exceptions\Repository\RequestNotValidException;
use CodeIgniter\Model;

class PersonRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    private $person;


    /**
     * PersonRepository constructor.
     * @param \App\Models\Person $personModel
     */
    public function __construct(\App\Models\Person $personModel)
    {
        $this->person = $personModel;
    }

    public function getCollection(): iterable
    {
        return $this->person->findAll();
    }

    public function getFromId(int $id): iterable
    {
        // TODO: Implement getFromId() method.
    }

    public function create(array $data): array
    {
        // TODO: Implement create() method.
    }

    public function findWithIdAndUpdate(int $id, array $data): void
    {
        // TODO: Implement findWithIdAndUpdate() method.
    }

    public function findWithIdAndDelete(int $id): void
    {
        // TODO: Implement findWithIdAndDelete() method.
    }
}