# Modelo de Banco de Dados

## Tabelas

### Cliente

| Nome do Campo | Tipo de Dados    | Atributos               | Descrição                               |
|---------------|------------------|-------------------------|-----------------------------------------|
| id_cliente    | INT              | PK, AUTO_INCREMENT      | Identificador único do cliente          |
| nome          | VARCHAR(100)     | NOT NULL                | Nome do cliente                         |
| sobrenome     | VARCHAR(100)     | NOT NULL                | Sobrenome do cliente                    |
| veiculo       | VARCHAR(100)     | NULL                    | Modelo do veículo do cliente            |
| modelo        | VARCHAR(100)     | NULL                    | Modelo específico do veículo            |

### Item

| Nome do Campo    | Tipo de Dados    | Atributos               | Descrição                                   |
|------------------|------------------|-------------------------|---------------------------------------------|
| id_item          | INT              | PK, AUTO_INCREMENT      | Identificador único do item                |
| nome             | VARCHAR(100)     | NOT NULL                | Nome do item                              |
| descricao        | TEXT             | NULL                    | Descrição detalhada do item                |
| tipo             | VARCHAR(50)      | NULL                    | Tipo do item (ex.: peça, serviço)          |
| modelo           | VARCHAR(100)     | NULL                    | Modelo associado ao item                   |
| preco_unitario   | DECIMAL(10,2)    | NULL                    | Preço unitário do item                    |
| quantidade       | INT              | NULL                    | Quantidade disponível do item             |
| categoria        | VARCHAR(50)      | NULL                    | Categoria do item                         |
| status           | ENUM             | ('disponível', 'indisponível') | Status do item (disponível ou não disponível) |

### Pedido

| Nome do Campo    | Tipo de Dados    | Atributos               | Descrição                                |
|------------------|------------------|-------------------------|------------------------------------------|
| id_pedido        | INT              | PK, AUTO_INCREMENT      | Identificador único do pedido            |
| id_cliente       | INT              | FK                      | Identificador do cliente (FK)            |
| data_entrada     | DATE             | NOT NULL                | Data de entrada do pedido                |
| status           | ENUM             | ('pendente', 'em andamento', 'concluído') | Status do pedido (pendente, em andamento ou concluído) |

### Itens_Do_Pedido

| Nome do Campo    | Tipo de Dados    | Atributos               | Descrição                                   |
|------------------|------------------|-------------------------|---------------------------------------------|
| id_item_pedido   | INT              | PK, AUTO_INCREMENT      | Identificador único do item no pedido       |
| id_pedido        | INT              | FK                      | Identificador do pedido (FK)                |
| id_item          | INT              | FK                      | Identificador do item (FK)                  |
| quantidade       | INT              | NOT NULL                | Quantidade do item no pedido               |

## Relacionamentos

1. **Cliente - Pedido**
   - Um cliente pode fazer vários pedidos.
   - Relacionamento: 1:N
   - **Cliente** (1) → **Pedido** (N)

2. **Pedido - Itens_Do_Pedido**
   - Um pedido pode incluir vários itens.
   - Relacionamento: 1:N
   - **Pedido** (1) → **Itens_Do_Pedido** (N)

3. **Item - Itens_Do_Pedido**
   - Um item pode aparecer em vários pedidos.
   - Relacionamento: 1:N
   - **Item** (1) → **Itens_Do_Pedido** (N)

## SQL para Criação das Tabelas

```sql
CREATE TABLE cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    sobrenome VARCHAR(100) NOT NULL,
    veiculo VARCHAR(100),
    modelo VARCHAR(100)
);

CREATE TABLE item (
    id_item INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    tipo VARCHAR(50),
    modelo VARCHAR(100),
    preco_unitario DECIMAL(10,2),
    quantidade INT,
    categoria VARCHAR(50),
    status ENUM('disponível', 'indisponível') DEFAULT 'disponível'
);

CREATE TABLE pedido (
    id_pedido INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    data_entrada DATE NOT NULL,
    status ENUM('pendente', 'em andamento', 'concluído') DEFAULT 'pendente',
    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
);

CREATE TABLE itens_do_pedido (
    id_item_pedido INT AUTO_INCREMENT PRIMARY KEY,
    id_pedido INT,
    id_item INT,
    quantidade INT NOT NULL,
    FOREIGN KEY (id_pedido) REFERENCES pedido(id_pedido),
    FOREIGN KEY (id_item) REFERENCES item(id_item)
);
