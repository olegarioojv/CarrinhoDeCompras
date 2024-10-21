<?php
// Importa as classes Read e Cart
use app\database\models\Read;
use app\classes\Cart;

// Inicia a sessão
session_start();

// Inclui o autoloader do Composer para carregar automaticamente as classes
require "../vendor/autoload.php";

// Cria uma instância da classe Cart
$cart = new Cart();
// Cria uma instância da classe Read para ler produtos do banco de dados
$read = new Read();
// Obtém todos os produtos da tabela "products"
$products = $read->all(table: "products"); 

// Obtém os produtos atualmente no carrinho
$productsInCart = $cart->cart();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css"> <!-- Inclui o arquivo CSS para estilização -->
    <title>Cart</title> <!-- Define o título da página -->
</head>
<body>

<div id="container"> <!-- Início do contêiner principal -->
    <h3>Cart: <?php echo count($productsInCart); ?> | <a href="cart.php">Go To Cart</a></h3> <!-- Exibe a contagem de produtos no carrinho e um link para ir ao carrinho -->
    <ul>
        <?php if (!empty($products)): ?> <!-- Verifica se há produtos disponíveis -->
            <?php foreach($products as $product): ?> <!-- Itera sobre cada produto -->
                <li>
                    <?php echo htmlspecialchars($product->name); ?> | <!-- Exibe o nome do produto de forma segura -->
                    R$ <?php echo number_format($product->price, 2, ",", "."); ?> <!-- Exibe o preço do produto formatado -->
                    <a href="add.php?id=<?php echo $product->id; ?>">add to cart</a> <!-- Link para adicionar o produto ao carrinho -->
                </li> 
            <?php endforeach; ?>
        <?php else: ?> <!-- Se não houver produtos -->
            <li>Nenhum produto encontrado.</li> <!-- Mensagem informando que não há produtos -->
        <?php endif; ?>
    </ul>
</div>
</body>
</html>
