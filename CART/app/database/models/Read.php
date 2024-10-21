<?php

namespace app\database\models;

class Read extends Model // A classe Read estende a classe Model
{
    // Método para recuperar todos os registros de uma tabela
    public function all($table, $fields = "*") 
    {
        try {
            // Prepara a consulta SQL para selecionar os campos especificados da tabela
            $query = $this->connect->prepare("SELECT {$fields} FROM {$table}");
            $query->execute(); // Executa a consulta

            return $query->fetchAll(); // Retorna todos os registros encontrados
        } catch (\Throwable $th) { // Captura qualquer exceção que ocorra durante a execução
            var_dump(value: $th->getMessage()); // Exibe a mensagem de erro
        }
    }
}
