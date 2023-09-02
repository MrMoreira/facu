document.addEventListener('DOMContentLoaded', function () {
    const iniciarJogoBtn = document.getElementById('iniciarJogo');
    const perguntaDiv = document.getElementById('pergunta');
    const mamiferosCheckbox = document.getElementById('mamiferosCheckbox');
    const avesCheckbox = document.getElementById('avesCheckbox');
    const repteisCheckbox = document.getElementById('repteisCheckbox');
    let arvoreDecisao = null;

    iniciarJogoBtn.addEventListener('click', () => {
        arvoreDecisao = iniciarArvoreDecisao();
        fazerPergunta(arvoreDecisao);
    });

    function iniciarArvoreDecisao() {
        // Inicialize a árvore de decisão com base nas escolhas dos checkboxes
        const arvore = {};
        if (mamiferosCheckbox.checked) {
            arvore['Mamíferos'] = {};
        }
        if (avesCheckbox.checked) {
            arvore['Aves'] = {};
        }
        if (repteisCheckbox.checked) {
            arvore['Répteis'] = {};
        }
        return arvore;
    }

    function fazerPergunta(no) {
        // Implemente as perguntas com base nas escolhas feitas
        const categorias = Object.keys(no);
        if (categorias.length === 0) {
            perguntaDiv.textContent = 'Nenhuma categoria selecionada. Selecione pelo menos uma categoria para continuar.';
            return;
        }
        if (categorias.length === 1) {
            perguntaDiv.textContent = `Pense em um animal da categoria: ${categorias[0]}`;
            return;
        }
        perguntaDiv.textContent = 'Escolha uma categoria:';
        const checkboxesDiv = document.createElement('div');
        categorias.forEach((categoria) => {
            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.id = categoria;
            const label = document.createElement('label');
            label.textContent = categoria;
            checkboxesDiv.appendChild(checkbox);
            checkboxesDiv.appendChild(label);
        });
        const continuarBtn = document.createElement('button');
        continuarBtn.textContent = 'Continuar';
        continuarBtn.addEventListener('click', () => {
            const selecionadas = categorias.filter((categoria) => document.getElementById(categoria).checked);
            if (selecionadas.length === 1) {
                perguntaDiv.textContent = `Pense em um animal da categoria: ${selecionadas[0]}`;
            } else {
                perguntaDiv.textContent = 'Selecione apenas uma categoria para continuar.';
            }
        });
        checkboxesDiv.appendChild(continuarBtn);
        perguntaDiv.appendChild(checkboxesDiv);
    }
});
