
#include <iostream>
#define MAX 100
using namespace std;
struct pessoas
{
	string nome;
	int idade;
	char sexo;
};

struct Fila
{
    int inicio, fim;
    pessoas dado[MAX];
};


void inicFila(Fila* fila)
{
    fila->inicio = 0;
    fila->fim = 0;
}

bool EstaCheia(Fila fila)
{
    if (fila.fim == MAX)
        return true;
    else
        return false;
}

bool EstaVazia(Fila fila)
{
    return (fila.inicio == fila.fim);
}

/*int RetornaPrimeiro(Fila fila)
{
	if (EstaVazia(fila))
	{
		cout << "Fila vazia " << endl;
		return 0;
	}
	return fila.dado[fila.inicio];
}*/

pessoas RetornaPrimeiro(Fila fila)
{
	if (EstaVazia(fila))
	{
		cout << "Fila vazia " << endl;
		return pessoas(); // retorna um objeto pessoas vazio
	}
	return fila.dado[fila.inicio];
}

void Enfileira(Fila* fila, pessoas p)
{
    if (!EstaCheia(*fila))
    {
        fila->dado[fila->fim] = p;
        fila->fim = fila->fim + 1;
    }
    else
        cout << "Fila Cheia!";
}

/*int Desenfileira(Fila* fila)
{
    if (!EstaVazia(*fila))
    {
        fila->inicio = fila->inicio + 1;
        return fila->dado[fila->inicio - 1];
    }
    cout << "fila está vazia - erro";
    return 0;
}*/

pessoas Desenfileira(Fila* fila)
{
	if (!EstaVazia(*fila))
	{
		pessoas p = fila->dado[fila->inicio];
		fila->inicio = fila->inicio + 1;
		return p;
	}
	cout << "fila está vazia - erro";
	return pessoas(); // retorna um objeto pessoas vazio
}

//Se for idoso ele enfilera..

int idoso(pessoas* p)
{
	if (p->idade >= 60)
	{
		cout << "Idoso" << endl;
		return 1;
	}
	else
	{
		cout << "Nao e idoso" << endl;
		return 0;
	}
}


int main()
{
	//menu
	Fila f;
	pessoas p[100];
	int opcao;
	int nmax = 1;
	
    do {
        cout << "=============================" << endl;
        cout << "1 - Cadastrar pessoa" << endl;
		cout << "2 - Listar pessoas" << endl;
		cout << "3 - Vacinar" << endl;
		cout << "4 - Sair" << endl;
		cout << "Digite a opcao desejada: ";
		cin >> opcao;
		switch (opcao)
		{
		case 1:
			int opn;
			do {
				for (int i = 0; i < nmax; i++)
				{
					cout << "Digite o nome: ";
					cin >> p[i].nome;
					cout << "Digite a idade: ";
					cin >> p[i].idade;
					cout << "Digite o sexo: ";
					cin >> p[i].sexo;

					if (idoso(&p[i]) == 1) {
						Enfileira(&f, p[i]);
						cout << p[i].nome << " registrado na fila de vacinacao." << endl;
					}
					else {
						cout << p[i].nome << " nao e considerado idoso. Por favor, tente novamente." << endl;
					}
					cout << "Gostaria de adicionar mais pessoas?" << endl;
					cout << "|| S para SIM || N para NAO ||" << endl;
					char SN;
					cin >> SN;
					if (SN == 'S' || SN == 's') {
						opn = 1;
						nmax++;
					}
					else {
						opn = 0;
					}
				}
					
			} while (opn != 0);
			break;
		case 2:
			for (int i = 0; i < nmax; i++)
			{
				if (!EstaVazia(f))
				{
					p[nmax] = Desenfileira(&f);
					cout << "===================================" << endl;
					cout << "Dados do vacinado:" << endl;
					cout << "Nome: " << p[nmax].nome << endl;
					cout << "Idade: " << p[nmax].idade << endl;
					cout << "Sexo: " << p[nmax].sexo << endl;
				}
				else {
					cout << "Fila vazia. Ninguem para vacinar." << endl;
				}
			}
	
			break;
		case 3:
			for (int i = f.inicio; i < f.fim; i++) {
				cout << "===================================" << endl;
				cout << "Nome: " << p[i].nome << endl;
				cout << "Idade: " << p[i].idade << endl;
				cout << "Sexo: " << p[i].sexo << endl;
			}
			break;
		case 4:
			break;
		default:
			break;
		}
	} while (opcao != 0);
	
}