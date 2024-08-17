# Projeto MVC

Este projeto utiliza o padrão **MVC** (Model-View-Controller) para organizar o código. O padrão MVC é uma forma de separar o código de um aplicativo em três partes principais, facilitando a manutenção e o desenvolvimento. Vamos explorar cada uma dessas partes:

## O que é o MVC?

- **Model (Modelo)**: É a parte que lida com os dados e a lógica do aplicativo. Ele interage com o banco de dados, processa informações e fornece dados para a View (Visão).
  
- **View (Visão)**: É a parte que exibe os dados ao usuário. Ela é responsável pela interface gráfica, mostrando informações de uma forma que o usuário possa entender e interagir.
  
- **Controller (Controlador)**: É a parte que controla o fluxo do aplicativo. Ele recebe as solicitações do usuário, interage com o Model para obter ou modificar dados, e atualiza a View com as informações.

## Estrutura de Pastas

### 1. **Controller**

A pasta **Controller** contém arquivos que gerenciam a lógica do aplicativo. Cada controlador tem a tarefa de:

- Receber as solicitações do usuário (por exemplo, quando você clica em um botão).
- Consultar ou atualizar os dados através dos Models.
- Escolher qual View deve ser exibida ao usuário.

**Exemplo de arquivo: `controller.php`**

```php
require "Model/model.php";
require "View/view.php";

class Controller {
    public function __construct(){
        $this->model = new Model();
        $this->view = new View();
    }

    public function navbar() {
        $this->view->navbar();
    }

    public function fpedidos(){
        $this->view->fpedidos();
    }
}
