# 🛒 Carrinho de Compras

Um sistema simples de carrinho de compras em PHP com MySQL.

## 📦 Requisitos

- PHP 7.4+
- MySQL
- Composer

## 🚀 Instalação

```bash
cd CART
composer install
```

Importe `app/database/loja.sql` no MySQL:

```sql
mysql -u root loja < app/database/loja.sql
```

Acesse: `http://localhost/CarrinhoDeCompras/CART/public/index.php`

## 📁 Estrutura

```
CART/
├── app/
│   ├── classes/Cart.php          # Gerencia o carrinho
│   ├── classes/CartProducts.php  # Detalhes dos produtos
│   ├── database/Connect.php      # Conexão MySQL
│   ├── database/models/
│   │   ├── Model.php
│   │   └── Read.php              # Lê dados do banco
│   └── interfaces/CartInterface.php
├── public/
│   ├── index.php                 # Lista de produtos
│   ├── add.php                   # Adiciona ao carrinho
│   ├── cart.php                  # Visualiza carrinho
│   ├── remove.php                # Remove produto
│   ├── clear.php                 # Limpa carrinho
│   └── quantidade.php            # Atualiza quantidade
└── vendor/
```

## 📄 Classes Principais

### Cart.php

Gerencia operações do carrinho:

- `add($id)` - Adiciona ou incrementa produto
- `remove($id)` - Remove produto
- `quantity($id, $qty)` - Atualiza quantidade
- `clear()` - Limpa carrinho
- `cart()` - Retorna carrinho
- `dump()` - Debug

### CartProducts.php

Combina dados da sessão com banco de dados:

- `products($cartInterface)` - Retorna produtos com detalhes e total

### Connect.php

Conexão singleton com MySQL (PDO)

### Read.php

Consulta o banco de dados:

- `all($table, $fields)` - Retorna todos os registros

## 🔄 Fluxo

1. **index.php** - Mostra produtos disponíveis
2. **add.php** - Adiciona produto ao carrinho (sessão)
3. **cart.php** - Visualiza carrinho com preços
4. **quantidade.php** - Atualiza quantidade
5. **remove.php** - Remove produto
6. **clear.php** - Limpa tudo

## 🌐 URLs

| URL                         | Função              |
| --------------------------- | ------------------- |
| `index.php`                 | Lista produtos      |
| `add.php?id=1`              | Adiciona produto    |
| `cart.php`                  | Visualiza carrinho  |
| `remove.php?id=1`           | Remove produto      |
| `clear.php`                 | Limpa carrinho      |
| `quantidade.php?id=1&qty=5` | Atualiza quantidade |

## 💾 Banco de Dados

Tabela `products`:

```sql
CREATE TABLE products (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    price DECIMAL(10, 2)
);
```

## 🔒 Segurança

- PDO prepared statements (previne SQL injection)
- htmlspecialchars() (previne XSS)
- filter_input() (sanitiza entrada)

## 📝 Notas

- Carrinho armazenado em `$_SESSION`
- Banco de dados: MySQL local
- Altere credenciais em `Connect.php` se necessário

---

**Autor:** João Victor (olegarioo.dev@gmail.com)  
**Versão:** 1.0.0
