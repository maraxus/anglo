<?php
namespace App\Models;

use CodeIgniter\Model;

class Task extends Model
{
    protected $table = "tarefas";
    protected $primaryKey = "id";
    protected $allowedFields = ['descricao', 'data', 'finalizacao', 'responsavel', 'categoria'];
    protected $validationRules = 'task';
}