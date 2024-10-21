<?php
// Inicia a sessão para poder usar variáveis de sessão
session_start();

// Inclui o autoloader do Composer para carregar automaticamente as classes
require "../vendor/autoload.php";

// Importa a classe Cart do namespace apropriado
use app\classes\Cart;

// Obtém o ID do produto a ser adicionado ao carrinho, sanitizando para garantir que é um número inteiro
$id = filter_input(type: INPUT_GET, var_name: "id", filter: FILTER_SANITIZE_NUMBER_INT);

// Cria uma nova instância da classe Cart
$cart = new Cart;

// Adiciona o produto ao carrinho utilizando o ID obtido
$cart->add(product: $id);

// (Opcional) Pode ser utilizado para depurar o conteúdo do carrinho
// $cart->dump();

// Redireciona o usuário para a página inicial após adicionar o produto ao carrinho
header(header: "Location: /");
exit; // Finaliza o script para garantir que nenhum código adicional seja executado
