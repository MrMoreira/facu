<?php
require "Model/model.php";
require "View/view.php";

// Agora você pode usar $conn para executar consultas SQL
class Controller {
    private $model;
    private $view;

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

    public function citens(){
        $this->view->citens();
    }

    public function pedidos(){
        $pedidos = $this->model->listapedidos();
        $this->view->pedidos($pedidos);
    }

    public function itens(){
        $itens = $this->model->listaitens();
        $this->view->itens($itens);
    }

} // Chave de fechamento na mesma linha
?>