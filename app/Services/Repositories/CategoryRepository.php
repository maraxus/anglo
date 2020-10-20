<?php
namespace App\Services\Repositories;


use App\Exceptions\Repository\NotFoundInCollectionException;
use App\Exceptions\Repository\RequestNotValidException;
use \CodeIgniter\Model;
class CategoryRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    private $category;

    /**
     * CategoryRepository constructor.
     * @param Model $categoryModel
     */
    public function __construct(\CodeIgniter\Model $categoryModel)
    {
        $this->category = $categoryModel;
    }

    public function getCollection(): iterable
    {
        return $this->category->findAll();
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