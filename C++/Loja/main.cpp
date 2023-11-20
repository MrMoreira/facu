#include <iostream>
#include <cstdio>
#include <iomanip>
#include <iomanip>
using namespace std;


typedef struct {
    string nome; //nome do cliente
    string endereco; //endereco do cliente
    int telefone; //telefone do cliente
    int codigo; //codigo do cliente
}PCliente;

typedef struct {
    string nome; //nome do fornecedor
    string empresa; //nome da empresa
    int codigo; //codigo do fornecedor
} Fornecedor;

typedef struct {
    int codigo; //codigo do produto
    string nome; //nome do produto
    int quantidade; //quantidade de produtos
    float precoV; //preco do produto de venda
    float precoC; //preco do produto de compra
    int codigoFornecedor; //codigo do fornecedor
} Produto;

typedef struct {
    int codigo; //codigo da venda
    int codigoProduto; //codigo do produto
    int codigoCliente; //codigo do cliente
    int quantidade; //quantidade de produtos
    float preco; //preco do produto
} Venda;

void sellList();
void CadastroVenda();
void ProductList();
void CadastroProduct();
void ClientList();
void ListarFornecedores();
void CadastroCliente();
void CadastroFornecedor();


void menu(int opcao){
    cout << "_______________________________________" << endl;
    cout << "|                                     |" << endl;
    cout << "|                MENU                 |" << endl;
    cout << "|_____________________________________|" << endl;
    cout << "\n"; //quebra 2 linhas  
    cout << "1 - Cadastrar Cliente" << endl;
    cout << "2 - Cadastrar Produto" << endl;
    cout << "3 - Cadastrar Fornecedor" << endl;
    cout << "4 - Cadastrar Venda" << endl;
    cout << "5 - Listar Fornecedores" << endl;
    cout << "6 - Listar Produtos" << endl;
    cout << "7 - Listar Vendas" << endl;
    cout << "8 - Listar Clientes" << endl;
    cout << "9 - Sair" << endl;
    cin >> opcao;
    switch (opcao){
    case 1:
        CadastroCliente();
        break;
    case 2:
        CadastroProduct();
        break;
    case 3:
        CadastroFornecedor();
        break;
    case 4:
         CadastroVenda();
        break;
    case 5:
        ListarFornecedores();
        break;
    case 6:
        ProductList();
        break;
    case 7:
        sellList();
        break;
    case 8:
        ClientList();
        break;
    default:
        break;
    }
}

void CadastroCliente() {
    system("cls");
    cout << "__________________________________________" << endl;
    cout << "|                                        |" << endl;
    cout << "|           CADASTRAR CLIENTES           |" << endl;
    cout << "|________________________________________|" << endl;

    PCliente clients;
    long int cod;
    int tell;
    char op;

    FILE* arqClient = fopen("clients.mr", "a"); // Abra o arquivo para anexar

    if (arqClient != NULL) {
        do {

            cout << "Codigo: ";
            cin >> cod;
            // Se o fornecedor nao existir, permita o cadastro
            clients.codigo = cod;
            cin.ignore();

            cout << " Nome: ";
            getline(cin, clients.nome);

            cout << " Endereco: ";
            getline(cin, clients.endereco);

            cout << " Telefone: ";
            cin >> tell;
            clients.telefone = tell;
            cin.ignore();
            //getline(cin, clients.telefone);

            cout << "\n CONFIRMA CADASTRO? - <S> para confirmar: ";
            cin >> op;

            if (toupper(op) == 'S') {
                // Use fwrite para escrever os dados no arquivo
               	fwrite(&clients, sizeof(clients), 1, arqClient);

                cout << "Fornecedor cadastrado com sucesso!" << endl;
            }

            cout << "ADICIONAR OUTRO FORNECEDOR? - <S> para adicionar: ";
            cin >> op;
        } while (toupper(op) == 'S');

        fclose(arqClient); // Feche o arquivo quando terminar
        menu(0);
    } else {
        cerr << "Erro ao abrir o arquivo" << endl;
    }
}

void CadastroFornecedor() {
    system("cls");
    cout << "__________________________________________" << endl;
    cout << "|                                        |" << endl;
    cout << "|     DIGITE OS DADOS DO FORNECEDOR      |" << endl;
    cout << "|________________________________________|" << endl;
    cout << "\n"; //quebra 2 linhas

    Fornecedor fornecedor;
    long int cod;
    char op;

    FILE* arquivoFornecedor = fopen("Fornecedores.mr", "a"); // Abra o arquivo para anexar

    if (arquivoFornecedor != NULL) {
        do {
            cout << "Codigo: ";
            cin >> cod;
            // Se o fornecedor nao existir, permita o cadastro
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
               	fwrite(&fornecedor, sizeof(Fornecedor), 1, arquivoFornecedor);

                cout << "Fornecedor cadastrado com sucesso!" << endl;
            }

            cout << "ADICIONAR OUTRO FORNECEDOR? - <S> para adicionar: ";
            cin >> op;
        } while (toupper(op) == 'S');
        fclose(arquivoFornecedor); // Feche o arquivo quando terminar
        menu(0);
    } else {
        cerr << "Erro ao abrir o arquivo" << endl;
    }
}

void ListarFornecedores(){
	Fornecedor fornecedor;
	FILE* arqFornecedor = fopen("Fornecedores.mr", "r");
	if (arqFornecedor != NULL) {
		cout << "on" << endl;
		while (fread(&fornecedor, sizeof(Fornecedor), 1, arqFornecedor) == 1){
		cout << "Codigo: " << fornecedor.codigo << endl;
        cout << "Nome: " << fornecedor.nome << endl;
        cout << "Empresa: " << fornecedor.empresa << endl;
        cout << "------------------------------------" << endl;
		}
    fclose(arqFornecedor); // N�o se esque�a de fechar o arquivo quando terminar.
	} else {
    // A abertura do arquivo falhou.
    cerr << "Erro ao abrir o arquivo" << endl;
	}
}

void ClientList(){

	PCliente clients;
	FILE* arqClients = fopen("clients.mr", "r");
	if (arqClients != NULL) {
		cout << "__________________________________________" << endl;
        cout << "|                                        |" << endl;
        cout << "|            LISTAR CLIENTES             |" << endl;
        cout << "|________________________________________|" << endl;
        cout << "\n"; //quebra 2 linhas
		while (fread(&clients, sizeof(clients), 1, arqClients) == 1){
		cout << "Codigo: " << clients.codigo << endl;
        cout << "Nome: " << clients.nome << endl;
        cout << "Endereco: " << clients.endereco << endl;
        cout << "Telefone: " << clients.telefone << endl;
        cout << "_______________________________________" << endl;
		}

    fclose(arqClients); // N�o se esque�a de fechar o arquivo quando terminar.
	} else {
    // A abertura do arquivo falhou.
    cerr << "Erro ao abrir o arquivo" << endl;
	}
}

void CadastroProduct() {
    system("cls");
    cout << "__________________________________________" << endl;
    cout << "|                                        |" << endl;
    cout << "|           CADASTRAR PRODUTOS           |" << endl;
    cout << "|________________________________________|" << endl;

    Produto products;
    long int cod;
    int pV, pC, codF, qtd;
    string nm;
    char op;

    FILE* arqProduct = fopen("products.mr", "a"); // Abra o arquivo para anexar

    if (arqProduct != NULL) {
        do {

            cout << "Codigo: ";
            cin >> cod;
            // Se o fornecedor nao existir, permita o cadastro
            products.codigo = cod;
            cin.ignore();

            cout << " Nome: ";
            cin >> nm;
            products.nome = nm;
            cin.ignore();

            cout << " Quantidade: ";
            cin >> qtd;
            products.quantidade = qtd;
            cin.ignore();
            
            cout << " Preco de Venda: ";
            cin >> pV;
            products.precoV = pV;
            cin.ignore();

            cout << " Preco de Compra: ";
            cin >> pC;
            products.precoC = pC;
            cin.ignore();

            cout << " Codigo do Fornecedor: ";
            cin >> codF;
            products.codigoFornecedor = codF;
            cin.ignore();

            cout << "\n CONFIRMA CADASTRO? - <S> para confirmar: ";
            cin >> op;

            if (toupper(op) == 'S') {
                // Use fwrite para escrever os dados no arquivo
               	fwrite(&products, sizeof(Produto), 1, arqProduct);

                cout << "Fornecedor cadastrado com sucesso!" << endl;
            }

            cout << "ADICIONAR OUTRO FORNECEDOR? - <S> para adicionar: ";
            cin >> op;
        } while (toupper(op) == 'S');

        fclose(arqProduct); // Feche o arquivo quando terminar
        menu(0);
    } else {
        cerr << "Erro ao abrir o arquivo" << endl;
    }
}

void ProductList(){

	Produto products;
	FILE* arqProdut = fopen("products.mr", "r");
	if (arqProdut != NULL) {
		cout << "__________________________________________" << endl;
        cout << "|                                        |" << endl;
        cout << "|            LISTAR PRODUTOS             |" << endl;
        cout << "|________________________________________|" << endl;
        cout << "\n"; //quebra 2 linhas
        cout << setw(10) << "| CODIGO |" << setw(10) << " NOME  |" << setw(10) << " QUANTIDADE |" << setw(10) << " PRECO DE VENDA |" << setw(10) << " PRECO DE COMPRA |" << setw(10) << " CODIGO DO FORNECEDOR |" << endl;
        cout << "___________________________________________________________________________________________________________________________" << endl;
		while (fread(&products, sizeof(Produto), 1, arqProdut) == 1){
		/*cout << "Codigo: " << products.codigo << endl;
        cout << "Nome: " << products.nome << endl;
        cout << "Quantidade: " << products.quantidade << endl;
        cout << "Preco de Venda: " << products.precoV << endl;
        cout << "Preco de Compra: " << products.precoC << endl;
        cout << "Codigo do Fornecedor: " << products.codigoFornecedor << endl;
        cout << "_______________________________________" << endl;
        //cout << "| CODIGO | NOME | QUANTIDADE | PRECO DE VENDA | PRECO DE COMPRA | CODIGO DO FORNECEDOR |" << endl;*/
        cout << setw(10) << products.codigo << setw(10) << products.nome << setw(10) << products.quantidade << setw(10) << products.precoV << setw(10) << products.precoC << setw(10) << products.codigoFornecedor << endl;
		}

    fclose(arqProdut); // N�o se esque�a de fechar o arquivo quando terminar.
	} else {
    // A abertura do arquivo falhou.
    cerr << "Erro ao abrir o arquivo" << endl;
	}
}

void CadastroVenda() {
    system("cls");
    cout << "__________________________________________" << endl;
    cout << "|                                        |" << endl;
    cout << "|           CADASTRAR VENDAS             |" << endl;
    cout << "|________________________________________|" << endl;

    Venda sell;
    long int cod;
    int p, codP,CodC, qtd;
    string nm;
    char op;

    FILE* arqSell = fopen("sell.mr", "a"); // Abra o arquivo para anexar

    if (arqSell != NULL) {
        do {

            cout << "Codigo: ";
            cin >> cod;
            // Se o fornecedor nao existir, permita o cadastro
            sell.codigo = cod;
            cin.ignore();

            cout << " Codigo do Produto: ";
            cin >> codP;
            // Se o fornecedor nao existir, permita o cadastro
            sell.codigoProduto = cod;
            cin.ignore();

            cout << " Codigo do Cliente: ";
            cin >> CodC;
            // Se o fornecedor nao existir, permita o cadastro
            sell.codigoCliente = CodC;
            cin.ignore();

            cout << " Quantidade: ";
            cin >> qtd;
            sell.quantidade = qtd;
            cin.ignore();

            cout << " Preco: ";
            cin >> p;
            sell.preco = p;
            

            cout << "\n CONFIRMA CADASTRO? - <S> para confirmar: ";
            cin >> op;

            if (toupper(op) == 'S') {
                // Use fwrite para escrever os dados no arquivo
               	fwrite(&sell, sizeof(Venda), 1, arqSell);

                cout << "Fornecedor cadastrado com sucesso!" << endl;
            }

            cout << "ADICIONAR OUTRO FORNECEDOR? - <S> para adicionar: ";
            cin >> op;
        } while (toupper(op) == 'S');

        fclose(arqSell); // Feche o arquivo quando terminar
        menu(0);
    } else {
        cerr << "Erro ao abrir o arquivo" << endl;
    }
}

void sellList(){

	Venda sell;
	FILE* arqSell = fopen("sell.mr", "r");
	if (arqSell != NULL) {
		cout << "__________________________________________" << endl;
        cout << "|                                        |" << endl;
        cout << "|            LISTAR VENDAS               |" << endl;
        cout << "|________________________________________|" << endl;
        cout << "\n"; //quebra 2 linhas
        cout << setw(10) << "| CODIGO |" << setw(10) << " CODIGO PRODUTO |" << setw(10) << " CODIGO CLIENTE |" << setw(10) << " QUANTIDADE |" << setw(10) << " PRECO |" << setw(10) << " DATA |" << endl;
        cout << "___________________________________________________________________________________________________________________________" << endl;
		while (fread(&sell, sizeof(Venda), 1, arqSell) == 1){
        cout << setw(10) << sell.codigo << setw(10) << sell.codigoProduto << setw(10) << sell.codigoCliente << setw(10) << sell.quantidade << setw(10) << sell.preco << endl;
		}

    fclose(arqSell); // N�o se esque�a de fechar o arquivo quando terminar.
	} else {
    // A abertura do arquivo falhou.
    cerr << "Erro ao abrir o arquivo" << endl;
	}
}

int main()
{
    cout << "Hello World!" << endl;
    int opcao;
    menu(opcao);

    return 0;
}