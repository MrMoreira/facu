#include <iostream>
#include <fstream>
#include <cstdio>
#include <string>
using namespace std;

FILE *PontProdutos;//declaraÃ§Ã£o do ponteiro para o arquivo produtos
FILE *PontFornecedor;//declaraÃ§Ã£o do ponteiro para o arquivo fornecedor

typedef struct {
    int dia,mes,ano;
    int hora,min,seg;
}reg_data;

typedef struct {
    string loja[50]; //nome da loja
    string produto[50]; //nome do produto
    int quantidade[50]; //quantidade de produtos
    float preco[50]; //preco do produto
    int codigo[50]; //codigo do produto
    int codigoProduto[50]; //codigo do produto
}PLoja;

typedef struct{
    string nome[50]; //nome do cliente  
    string sobrenome[50]; //sobrenome do cliente
    string endereco[50]; //endereco do cliente
    string numero[50]; //numero da casa do cliente
    string telefone[50]; //telefone do cliente
    string codigo[50]; //codigo do cliente

}Clients;

typedef struct {
    string nome[50]; //nome do cliente
    string endereco[50]; //endereco do cliente
    string telefone[50]; //telefone do cliente
    string codigo[50]; //codigo do cliente
}PCliente;

typedef struct {
    string nome;
    string empresa;
    int codigo;
} Fornecedor;


void CadastroCliente();
void CadastroFornecedor();

void menu(int opcao){
    cout << "=====================================" << endl;
    cout << "===========----MENU----==============" << endl;
    cout << "=====================================" << endl;
    cout << "\n\n"; //quebra 2 linhas  
    cout << "1 - Cadastrar Cliente" << endl;
    cout << "2 - Cadastrar Produto" << endl;
    cout << "3 - Cadastrar Fornecedor" << endl;
    cout << "4 - Listar Fornecedores" << endl;
    cout << "5 - Listar Produtos" << endl;
    cout << "6 - Listar Vendas" << endl;
    cout << "7 - Leitura Teste" << endl;
    cin >> opcao;
    switch (opcao){
    case 1:
        CadastroCliente();
        break;
    case 2:
        cout << "teste opcao 2";
        break;
    case 3:
        CadastroFornecedor();
        break;
    case 4:
        cout << "teste opcao 4";
        break;
    case 5:
        break;
    case 6:
        cout << "teste opcao 6";
        break;
    case 7:
    	void leituratest();
        break;
    default:
        break;
    }
}

void CadastroCliente(){
    system("cls");
    cout << "=====================================" << endl;
    cout << "=========Cadastro de Cliente=========" << endl;
    cout << "=====================================" << endl;
    cout << "\n\n"; //quebra 2 linhas
    PCliente cliente;

    for(int i=0;i<50; i++) {

        cout << "\nDigite o Nome do cliente: ";
        cin >> cliente.nome[i];
        cout << "\nDigite o Endereco do cliente: ";
        cin >> cliente.endereco[i];
        cout << "\nDigite o Telefone do cliente: ";
        cin >> cliente.telefone[i];
        cliente.codigo[i] = i;

        ofstream arquivoCliente("Clientes.txt", ios::out); // Abra o arquivo em modo de escrita

        if (arquivoCliente.is_open()) {
            arquivoCliente << cliente.nome[i] << "||" << cliente.endereco[i] << "||" << cliente.telefone[i] << "||" << cliente.codigo[i] << "||" << endl;
        } else {
            cout << "Erro ao abrir o arquivo" << endl;
        }

        arquivoCliente.close(); // Feche o arquivo apÃ³s o loop


        cout << "Cliente cadastrado com sucesso!" << endl;
        cout << "Deseja Cadastrar mais clientes? (S/N)" << endl;
        if (cin.get() == 'N' || cin.get() == 'n') {
            menu(0);
        }
    }
}

void CadastroFornecedor() {
    system("cls");
    cout << " -------------------------------------" << std::endl;
    cout << " **** DIGITE OS DADOS DO FORNECEDOR ****" << std::endl;
    cout << " -------------------------------------" << std::endl;

    Fornecedor fornecedor;
    long int cod;
    char op;

    FILE* arquivoFornecedor = fopen("Fornecedores.mr", "ab"); // Abra o arquivo para anexar

    if (arquivoFornecedor != NULL) {
        do {
            cout << "Codigo: ";
            cin >> cod;

            // Você pode adicionar sua função de busca aqui para verificar se o fornecedor já existe

            // Se o fornecedor não existir, permita o cadastro
            fornecedor.codigo = cod;

            cin.ignore();
            cout << " Nome: ";
            getline(cin, fornecedor.nome);

            cout << " Empresa: ";
            getline(cin, fornecedor.empresa);

            cout << "\n CONFIRMA CADASTRO? - <S> para confirmar: ";
            cin >> op;

            if (toupper(op) == 'S') {
                // Use fwrite para escrever os dados no arquivo
                int al = fornecedor.codigo;
                //string linha = parse.str(fornecedor.codigo)+ "||" + fornecedor.nome + "||" + fornecedor.empresa + "||\n";
               	//fwrite(linha.c_str(), sizeof(char), linha.size(), arquivoFornecedor);
               	fwrite(&fornecedor, sizeof(Fornecedor), 1, arquivoFornecedor);

                cout << "Fornecedor cadastrado com sucesso!" << std::endl;
            }

            cout << "ADICIONAR OUTRO FORNECEDOR? - <S> para adicionar: ";
            cin >> op;
        } while (toupper(op) == 'S');

        fclose(arquivoFornecedor); // Feche o arquivo quando terminar
    } else {
        cerr << "Erro ao abrir o arquivo" << endl;
    }
}


void leituratest(){
	Fornecedor fornecedor;
	FILE* arqFornecedor = fopen("Fornecedores.mr", "ab");
	if (arqFornecedor != null) {
		cout << "on";
		while (fread(&fornecedor, sizeof(Fornecedor), 1, arqFornecedor) == 1){
		cout << "Código: " << fornecedor.codigo << endl;
        cout << "Nome: " << fornecedor.nome << std::endl;
        cout << "Empresa: " << fornecedor.empresa << std::endl;
        cout << "------------------------------------" << std::endl;
		}
    fclose(arqFornecedor); // Não se esqueça de fechar o arquivo quando terminar.
	} else {
    // A abertura do arquivo falhou.
    cerr << "Erro ao abrir o arquivo" << std::endl;
	}
}


int main()
{
    cout << "Hello World!" << endl;
    int opcao;
    menu(opcao);

    return 0;
}
