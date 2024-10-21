<?php
// Inicia a sessão para poder usar variáveis de sessão
session_start();

// Importa as classes Cart e CartProducts do namespace apropriado
use app\classes\Cart;
use app\classes\CartProducts;

// Inclui o autoloader do Composer para carregar automaticamente as classes
require "../vendor/autoload.php";

// Cria uma nova instância da classe CartProducts
$cartProducts = new CartProducts();

// Obtém os produtos do carrinho utilizando a interface Cart
$products = $cartProducts->products(cartInterface: new Cart());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Cart</title>
</head>
<body>

    <h2>Cart | <a href="index.php">Home</a></h2> <!-- Cabeçalho com link para a página inicial -->
    <hr>

    <div id="container">
        <?php if (count($products["products"]) <= 0): ?> <!-- Verifica se não há produtos no carrinho -->
            <h3>Nenhum produto no carrinho de compras</h3> <!-- Mensagem informando que o carrinho está vazio -->
        <?php else: ?>
            <ul> <!-- Lista de produtos no carrinho -->
                <?php foreach($products["products"] as $product): ?> <!-- Itera sobre cada produto no carrinho -->
                    <li class="cart-product">
                        <?php echo htmlspecialchars($product["product"]); ?> <!-- Nome do produto, protegido contra XSS -->
                        <form action="quantidade.php" method="GET"> <!-- Formulário para atualizar a quantidade do produto -->
                            <input type="text" name="qty" value="<?php echo $product["qty"]; ?>" id="cart-input-qty"> <!-- Campo de entrada para quantidade -->
                            <input type="hidden" name="id" value="<?php echo $product["id"]; ?>"> <!-- ID do produto -->
                            <button type="submit">Atualizar</button> <!-- Botão para enviar o formulário -->
                        </form> 
                        x R$ <?php echo number_format($product["price"], decimals: 2, decimal_separator: ",", thousands_separator: "."); ?> | <!-- Preço unitário do produto -->
                        R$ <?php echo number_format($product["subtotal"], decimals: 2, decimal_separator: ",", thousands_separator: "."); ?> | <!-- Subtotal para a quantidade do produto -->
                        <a href="remove.php?id=<?php echo $product["id"]; ?>" id="cart-remove">Remover</a> <!-- Link para remover o produto do carrinho -->
                    </li>
                <?php endforeach; ?>
            </ul>
            <div id="cart-total-clear">
                <span id="cart-total">
                    Total: R$ <?php echo number_format(num: $products["total"], decimals: 2, decimal_separator: ",", thousands_separator: "."); ?> <!-- Total do carrinho -->
                </span>
                <span id="cart-clear">
                    <a href="clear.php">Limpar Carrinho</a> <!-- Link para limpar todo o carrinho -->
                </span>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
