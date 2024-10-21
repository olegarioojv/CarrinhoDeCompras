<?php

namespace app\interfaces;

// Define a interface CartInterface
interface CartInterface
{
    // Método para adicionar um produto ao carrinho
    public function add($product);
    
    // Método para remover um produto do carrinho
    public function remove($product);
    
    // Método para atualizar a quantidade de um produto no carrinho
    public function quantity($product, $quantity);
    
    // Método para limpar todos os produtos do carrinho
    public function clear();
    
    // Método para obter todos os produtos no carrinho
    public function cart();
    
    // Método para depurar (exibir) o conteúdo do carrinho
    public function dump();
}
