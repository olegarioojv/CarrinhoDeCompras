<?php
// Inicia a sessão para poder usar variáveis de sessão
session_start();

// Inclui o autoloader do Composer para carregar automaticamente as classes
require "../vendor/autoload.php";

// Importa a classe Cart do namespace apropriado
use app\classes\Cart;

// Obtém o ID do produto a partir da URL, filtrando e sanitizando a entrada
$id = filter_input(type: INPUT_GET, var_name: "id", filter: FILTER_SANITIZE_STRING);

// Cria uma nova instância da classe Cart
$cart = new Cart;

// Chama o método remove da classe Cart para remover o produto especificado do carrinho
$cart->remove(product: $id);

// Redireciona para a página do carrinho
header(header: "Location: cart.php");
