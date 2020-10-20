<?php


namespace App\Models;


class Category extends \CodeIgniter\Model
{
    protected $table = "categoria";
    protected $primaryKey = "id";
    protected $allowedFields = ['descricao'];
}