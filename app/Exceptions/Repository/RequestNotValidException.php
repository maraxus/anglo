<?php
namespace App\Exceptions\Repository;

use CodeIgniter\Exceptions\ExceptionInterface;
use phpDocumentor\Reflection\Types\Iterable_;
use phpDocumentor\Reflection\Types\This;

class RequestNotValidException extends \RuntimeException implements ExceptionInterface
{
    protected $errors;

    public function setErrors (Iterable $errors) : void
    {
        $this->errors = $errors;
    }

    public function getErrors(): Iterable
    {
        return $this->errors ?? [];
    }

    public function hasErrors(): bool
    {
        return $this->errors ? true : false;
    }
}