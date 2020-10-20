<?php
namespace App\Models;

class Person extends \CodeIgniter\Model
{
    protected $table = "responsaveis";
    protected $primaryKey = "id";
    protected $allowedFields = ['nome'];
}