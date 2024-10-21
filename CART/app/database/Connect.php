<?php

namespace app\database;

use PDO;
use PDOException;

class Connect
{
    private static $pdo = null; // Instância PDO estática, inicializada como nula

    // Método para conectar ao banco de dados e retornar a instância PDO
    public static function connect(): PDO
    {
        try {
            // Verifica se a instância PDO ainda não foi criada
            if (static::$pdo === null) {
                // Cria uma nova instância PDO com as configurações fornecidas
                static::$pdo = new PDO(
                    dsn: "mysql:host=localhost;dbname=loja", // Data Source Name com host e nome do banco de dados
                    username: "root", // Nome de usuário do banco de dados
                    password: "", // Senha do banco de dados
                    options: [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Define o modo de erro para exceções
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // Define o modo de busca padrão para objetos
                        PDO::ATTR_EMULATE_PREPARES => false // Desativa emulação de prepared statements
                    ]
                );
            }
            // Retorna a instância PDO
            return static::$pdo;
        } catch (PDOException $e) {
            // Captura exceções e exibe mensagem de erro ao falhar na conexão
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
