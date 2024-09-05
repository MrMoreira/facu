<?php

require_once 'config/Database.php';

class Model{
    public function listaitens(){
        $retorno = '
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
            <tbody>
                <!-- Os dados serão inseridos aqui pelo JavaScript -->
            <tr>
            <td data-label="Nome do Item">Óleo de Motor</td>
            <td data-label="Quantidade">50</td>
            <td data-label="Preço Unitário">R$ 25.99</td>
            <td data-label="Categoria">Lubrificantes</td>
            <td data-label="Status"><span class="status disponível">Disponível</span></td>
        </tr><tr>
            <td data-label="Nome do Item">Filtro de Ar</td>
            <td data-label="Quantidade">30</td>
            <td data-label="Preço Unitário">R$ 15.50</td>
            <td data-label="Categoria">Filtros</td>
            <td data-label="Status"><span class="status disponível">Disponível</span></td>
        </tr><tr>
            <td data-label="Nome do Item">Pastilha de Freio</td>
            <td data-label="Quantidade">10</td>
            <td data-label="Preço Unitário">R$ 45.00</td>
            <td data-label="Categoria">Freios</td>
            <td data-label="Status"><span class="status baixo-estoque">Baixo Estoque</span></td>
        </tr><tr>
            <td data-label="Nome do Item">Bateria 60Ah</td>
            <td data-label="Quantidade">5</td>
            <td data-label="Preço Unitário">R$ 299.99</td>
            <td data-label="Categoria">Elétrica</td>
            <td data-label="Status"><span class="status baixo-estoque">Baixo Estoque</span></td>
        </tr><tr>
            <td data-label="Nome do Item">Pneu 185/65 R15</td>
            <td data-label="Quantidade">0</td>
            <td data-label="Preço Unitário">R$ 250.00</td>
            <td data-label="Categoria">Pneus</td>
            <td data-label="Status"><span class="status indisponível">Indisponível</span></td>
        </tr></tbody>
        </table>
        ';
        return $retorno;

    }
}
?>