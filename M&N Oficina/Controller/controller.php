<?php

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

    public function citens(){
        $this->view->citens();
    }

} // Chave de fechamento na mesma linha
?>