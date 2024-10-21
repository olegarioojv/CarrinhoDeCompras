<?php
// Inicia a sessão para poder usar variáveis de sessão
session_start();

// Inclui o autoloader do Composer para carregar automaticamente as classes
require "../vendor/autoload.php";

// Importa a classe Cart do namespace apropriado
use app\classes\Cart;

// Cria uma nova instância da classe Cart e chama o método clear() para limpar o carrinho
(new Cart)->clear();

// Redireciona para a página do carrinho
header(header: "Location: cart.php");
