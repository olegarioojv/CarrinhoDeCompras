<?php

namespace app\classes;
use app\interfaces\CartInterface;

class Cart implements CartInterface
{
    // Método para adicionar um produto ao carrinho
    public function add($product): void
    {
        // Verifica se a sessão do carrinho não está definida
        if(!isset($_SESSION["cart"]))
        {
            $_SESSION["cart"] = []; // Inicializa o carrinho como um array vazio
        }

        // Adiciona o produto ao carrinho ou incrementa a quantidade se já existir
        (!isset($_SESSION["cart"][$product])) ?
            $_SESSION["cart"][$product] = 1 : // Se o produto não estiver no carrinho, adiciona com quantidade 1
            $_SESSION["cart"][$product] += 1; // Se já estiver, incrementa a quantidade
    }

    // Método para remover um produto do carrinho
    public function remove($product): void
    {
        // Verifica se o produto está no carrinho
        if(isset($_SESSION["cart"][$product])) {
            unset($_SESSION["cart"][$product]); // Remove o produto do carrinho
        }
    }

    // Método para definir a quantidade de um produto no carrinho
    public function quantity($product, $quantity): void
    {
        // Verifica se o produto está no carrinho
        if(isset($_SESSION["cart"][$product])) {
            // Se a quantidade for 0 ou vazia, remove o produto do carrinho
            if ($quantity == 0 || $quantity == "") {
                $this->remove(product: $product);
                return;
            }
            // Atualiza a quantidade do produto no carrinho
            $_SESSION["cart"]["$product"] = $quantity;
        }
    }

    // Método para limpar o carrinho
    public function clear(): void
    {
        // Verifica se a sessão do carrinho está definida
        if(isset($_SESSION["cart"])) {
            unset($_SESSION["cart"]); // Remove a sessão do carrinho
        }
    }

    // Método para retornar o conteúdo do carrinho
    public function cart(): mixed
    {
        // Verifica se a sessão do carrinho está definida
        if(isset($_SESSION["cart"]))
        {
            return $_SESSION["cart"]; // Retorna o carrinho
        }

        return []; // Retorna um array vazio se o carrinho não existir
    }

    // Método para depurar o conteúdo do carrinho
    public function dump (): void
    {
        // Verifica se a sessão do carrinho está definida
        if(isset($_SESSION["cart"]))
        {
            var_dump(value: $_SESSION["cart"]); // Exibe o conteúdo do carrinho
        }
    }

}
