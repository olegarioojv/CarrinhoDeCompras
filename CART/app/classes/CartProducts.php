<?php

namespace app\classes;

use app\database\models\Read;
use app\interfaces\CartInterface;

class CartProducts
{
    // Construtor da classe, atualmente sem funcionalidade
    public function __construct()
    {
    }

    // Método para obter produtos do carrinho com detalhes
    public function products(CartInterface $cartInterface): array
    {
        // Obtém os produtos atualmente no carrinho
        $productsInCart = $cartInterface->cart();
        
        // Obtém todos os produtos do banco de dados
        $productsInDatabase = (new Read)->all(table: "products");

        $read = new Read; // Criação de uma nova instância de Read (não usada posteriormente)

        $products = []; // Inicializa um array para armazenar os produtos detalhados
        $total = 0; // Inicializa a variável total para calcular o total do carrinho

        // Itera sobre cada produto no carrinho
        foreach ($productsInCart as $productId => $quantity) 
        {
            // Filtra os produtos do banco de dados para encontrar o correspondente ao ID do produto no carrinho
            $product = [...array_filter(array: $productsInDatabase, callback: fn($product): bool => (int)$product->id === $productId)];

            // Adiciona os detalhes do produto ao array de produtos, incluindo subtotal
            $products[] = [
                "id" => $productId, // ID do produto
                "product" => $product[0]->name, // Nome do produto
                "price" => $product[0]->price, // Preço do produto
                "qty" => $quantity, // Quantidade do produto no carrinho
                "subtotal" => $quantity * $product[0]->price // Subtotal para o produto
            ];
            
            // Atualiza o total do carrinho
            $total += $quantity * $product[0]->price;
        }

        // Retorna um array com os produtos e o total do carrinho
        return [
            "products" => $products,
            "total" => $total
        ];
    }
}
