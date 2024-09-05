const itens = [
    { nome: "Óleo de Motor", quantidade: 50, preco: 25.99, categoria: "Lubrificantes", status: "Disponível" },
    { nome: "Filtro de Ar", quantidade: 30, preco: 15.50, categoria: "Filtros", status: "Disponível" },
    { nome: "Pastilha de Freio", quantidade: 10, preco: 45.00, categoria: "Freios", status: "Baixo Estoque" },
    { nome: "Bateria 60Ah", quantidade: 5, preco: 299.99, categoria: "Elétrica", status: "Baixo Estoque" },
    { nome: "Pneu 185/65 R15", quantidade: 0, preco: 250.00, categoria: "Pneus", status: "Indisponível" }
];

function gerarLinhasTabela() {
    const tbody = document.querySelector("#inventarioTable tbody");
    
    itens.forEach(item => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
            <td data-label="Nome do Item">${item.nome}</td>
            <td data-label="Quantidade">${item.quantidade}</td>
            <td data-label="Preço Unitário">R$ ${item.preco.toFixed(2)}</td>
            <td data-label="Categoria">${item.categoria}</td>
            <td data-label="Status"><span class="status ${item.status.toLowerCase().replace(' ', '-')}">${item.status}</span></td>
        `;
        tbody.appendChild(tr);
    });
}

window.onload = gerarLinhasTabela;