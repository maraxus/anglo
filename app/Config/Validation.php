<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------
    public $task = [
        "descricao" => [
            "rules" => "required|string|max_length[140]|min_length[5]",
            "errors" => [
                "required" => "A tarefa precisa de uma descrição",
                "string" => "A descrição precisa ser uma 'string', texto entre aspas",
                "max_length" => "Tamanho mínimo é de 5 caractéres",
                "min_length" => "Tamanho máximo é de 140 caractéres"
            ]
        ],
        "responsavel" => [
            "rules" => "required|is_natural",
            "errors" => [
                "required" => "Deve haver um responsável associado á tarefa",
                "is_natural" => "Precisa ser um valor numérico, que identifique um responsável cadastrado"
            ]
        ],
        "data" => [
            "rules" => "required|valid_date",
            "errors" => [
                "required" => "Este campo é obrigatóiro",
                "valid_date" => "Deve conter uma data válida",
            ]
        ],
        "finalizacao" => [
            "rules" => "permit_empty|valid_date",
            "errors" => [
                "valid_date" => "Deve conter uma data válida",
            ]
        ],
        "categoria" => [
            "rules" => "required|is_natural",
            "errors" => [
                "required" => "A tarefa precisa estar associada á alguma categoria",
                "is_natural" => "Precisa ser um valor numérico, que represente uma categoria válida"
            ]
        ]
    ];
}
