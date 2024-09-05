<div class="sala">
    <h1>Pedidos da Oficina</h1>
    <div class="table-container">
        <table id="pedidosTable">
            <thead>
                <tr>
                    <th>Nº do Pedido</th>
                    <th>Cliente</th>
                    <th>Serviço</th>
                    <th>Data de Entrada</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Os dados serão inseridos aqui pelo JavaScript -->
            </tbody>
        </table>
    </div>
</div>

<!--<script>
    const pedidos = [
        { numero: "001", cliente: "João Silva", servico: "Troca de óleo", data: "2024-09-01", status: "Concluído" },
        { numero: "002", cliente: "Maria Santos", servico: "Alinhamento", data: "2024-09-02", status: "Em andamento" },
        { numero: "003", cliente: "Pedro Oliveira", servico: "Revisão geral", data: "2024-09-03", status: "Pendente" },
        { numero: "004", cliente: "Ana Rodrigues", servico: "Troca de pneus", data: "2024-09-04", status: "Concluído" },
        { numero: "005", cliente: "Carlos Ferreira", servico: "Reparo no motor", data: "2024-09-05", status: "Em andamento" }
    ];

    function gerarLinhasTabela() {
        const tbody = document.querySelector("#pedidosTable tbody");

        pedidos.forEach(pedido => {
            const tr = document.createElement("tr");
            tr.innerHTML = `
                    <td data-label="Nº do Pedido">${pedido.numero}</td>
                    <td data-label="Cliente">${pedido.cliente}</td>
                    <td data-label="Serviço">${pedido.servico}</td>
                    <td data-label="Data de Entrada">${pedido.data}</td>
                    <td data-label="Status"><span class="status ${pedido.status.toLowerCase().replace(' ', '-')}">${pedido.status}</span></td>
                `;
            tbody.appendChild(tr);
        });
    }

    window.onload = gerarLinhasTabela;
</script>-->