<?php

namespace app\database\models;

use app\database\Connect; // Importa a classe Connect para gerenciamento de conexão com o banco de dados

abstract class Model
{
    protected $connect; // Atributo protegido para armazenar a conexão com o banco de dados

    // Construtor da classe
    public function __construct()
    {
        // Estabelece a conexão com o banco de dados usando a classe Connect
        $this->connect = Connect::connect();
    }
}
