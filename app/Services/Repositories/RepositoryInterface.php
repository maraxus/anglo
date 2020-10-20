<?php
namespace App\Services\Repositories;

use App\Exceptions\Repository\NotFoundInCollectionException;
use App\Exceptions\Repository\RequestNotValidException;

interface RepositoryInterface
{
    public function getCollection() : Iterable;

    /**
     * @throws NotFoundInCollectionException
     */
    public function getFromId(int $id) : Iterable;

    /**
     * @throws RequestNotValidException
     */
    public function create(iterable $data) : Iterable;

    /**
     * @throws NotFoundInCollectionException
     * @throws RequestNotValidException
     */
    public function findWithIdAndUpdate(int $id, iterable $data) : Iterable;

    /**
     * @throws NotFoundInCollectionException
     */
    public function findWithIdAndDelete(int $id) : Iterable;
}