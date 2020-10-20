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
    public function create(array $data) : array;

    /**
     * @throws NotFoundInCollectionException
     * @throws RequestNotValidException
     */
    public function findWithIdAndUpdate(int $id, array $data) : void;

    /**
     * @throws NotFoundInCollectionException
     */
    public function findWithIdAndDelete(int $id) : void;
}