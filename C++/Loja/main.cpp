#include <iostream>
#include <fstream>
using namespace std;

FILE *PontProdutos;//declaração do ponteiro para o arquivo produtos
FILE *PontFornecedor;//declaração do ponteiro para o arquivo fornecedor

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
    string nome{50}; //nome do cliente  
    string sobrenome[50]; //sobrenome do cliente
    string endereco[50]; //endereco do cliente
    int numero[50]; //numero da casa do cliente
    string telefone[50]; //telefone do cliente
    int codigo[50]; //codigo do cliente

}Clients;

typedef struct {
    string nome[50]; //nome do cliente
    string endereco[50]; //endereco do cliente
    string telefone[50]; //telefone do cliente
    int codigo[50]; //codigo do cliente
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
    cout << "7 - Sair" << endl;
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
        cout << "teste opcao 7";
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

        arquivoCliente.close(); // Feche o arquivo após o loop


        cout << "Cliente cadastrado com sucesso!" << endl;
        cout << "Deseja Cadastrar mais clientes? (S/N)" << endl;
        if (cin.get() == 'N' || cin.get() == 'n') {
            menu(0);
        }
    }
}

void CadastroFornecedor() {
    system("cls");
    cout << " -------------------------------------" << endl;
    cout << " **** DIGITE OS DADOS DO FORNECEDOR ****" << endl;
    cout << " -------------------------------------" << endl;

    Fornecedor fornecedor;
    long int cod;
    char op;

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
            ofstream arquivoFornecedor("Fornecedores.txt", ios::out | ios::app);

            if (arquivoFornecedor.is_open()) {
                arquivoFornecedor << fornecedor.codigo << "||" << fornecedor.nome << "||" << fornecedor.empresa << "||" << endl;
            } else {
                cout << "Erro ao abrir o arquivo" << endl;
            }

            arquivoFornecedor.close();

            cout << "Fornecedor cadastrado com sucesso!" << endl;
        }

        cout << "ADICIONAR OUTRO FORNECEDOR? - <S> para adicionar: ";
        cin >> op;
    } while (toupper(op) == 'S');
}

int main()
{
    cout << "Hello World!" << endl;
    int opcao;
    menu(opcao);

    return 0;
}