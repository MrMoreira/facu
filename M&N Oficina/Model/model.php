<?php

require_once 'config/Database.php';

class Model {
    private $pdo;

    public function __construct() {
        $database = new Database();
        $this->pdo = $database->getConnection();
    }

    public function listaitens() {
        // Consulta SQL para obter todos os itens
        $sql = 'SELECT nome, quantidade, preco_unitario, categoria, status FROM item';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $itens = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // HTML da tabela e dados
        $retorno = '
        <div class="sala-inventario">
            <h1>Inventário da Oficina</h1>
            <div class="table-container">
                <table id="inventarioTable">
                    <thead>
                        <tr>
                            <th>Nome do Item</th>
                            <th>Quantidade</th>
                            <th>Preço Unitário</th>
                            <th>Categoria</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>';

        // Adiciona uma linha para cada item
        foreach ($itens as $item) {
            $statusClass = strtolower(str_replace(' ', '-', $item['status']));
            $retorno .= '
            <tr>
                <td data-label="Nome do Item">' . htmlspecialchars($item['nome']) . '</td>
                <td data-label="Quantidade">' . htmlspecialchars($item['quantidade']) . '</td>
                <td data-label="Preço Unitário">R$ ' . number_format($item['preco_unitario'], 2, ',', '.') . '</td>
                <td data-label="Categoria">' . htmlspecialchars($item['categoria']) . '</td>
                <td data-label="Status"><span class="status ' . $statusClass . '">' . htmlspecialchars($item['status']) . '</span></td>
            </tr>';
        }

        // Fim da tabela HTML
        $retorno .= '
                    </tbody>
                </table>
            </div>
        </div>';

        return $retorno;
    }

    public function listapedidos() {
        // Consulta SQL para obter todos os pedidos juntamente com o nome do cliente
        $sql = 'SELECT p.id_pedido, c.nome AS cliente, p.data_entrada, p.status 
                FROM pedido p
                JOIN cliente c ON p.id_cliente = c.id_cliente';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // HTML da tabela e dados
        $retorno = '
        <div class="sala">
            <h1>Pedidos da Oficina</h1>
            <div class="table-container">
                <table id="pedidosTable">
                    <thead>
                        <tr>
                            <th>Nº do Pedido</th>
                            <th>Cliente</th>
                            <th>Data de Entrada</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>';
    
        // Adiciona uma linha para cada pedido
        foreach ($pedidos as $pedido) {
            // Formata a data para o padrão dd/mm/yy
            $data = new DateTime($pedido['data_entrada']);
            $dataFormatada = $data->format('d/m/Y');
    
            $statusClass = strtolower(str_replace(' ', '-', $pedido['status']));
            $retorno .= '
            <tr>
                <td data-label="Nº do Pedido">' . htmlspecialchars($pedido['id_pedido']) . '</td>
                <td data-label="Cliente">' . htmlspecialchars($pedido['cliente']) . '</td>
                <td data-label="Data de Entrada">' . htmlspecialchars($dataFormatada) . '</td>
                <td data-label="Status"><span class="status ' . $statusClass . '">' . htmlspecialchars($pedido['status']) . '</span></td>
            </tr>';
        }
    
        // Fim da tabela HTML
        $retorno .= '
                    </tbody>
                </table>
            </div>
        </div>';
    
        return $retorno;
    }
    
    // Método auxiliar para buscar o nome do cliente pelo id_cliente
    private function obterNomeCliente($id_cliente) {
        $sql = 'SELECT CONCAT(nome, " ", sobrenome) AS nome_completo FROM cliente WHERE id_cliente = :id_cliente';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_cliente', $id_cliente);
        $stmt->execute();
        return $stmt->fetchColumn();  // Retorna o nome completo do cliente
    }
    
}
?>
