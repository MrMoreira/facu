<?php

class View{

    public function navbar(){
        echo "<link rel='stylesheet' href='Assets/css/navbar.css'>";
        require "Assets/templates/navbar.php";
    }

    public function fpedidos(){
        echo "<link rel='stylesheet' href='Assets/css/register.css'>";
        require "Assets/templates/fpedidos.php";
    }

    public function citens(){
        echo "<link rel='stylesheet' href='Assets/css/citens.css'>";
        require "Assets/templates/citens.php";
    } // Ainda em construcao pagina para listagem de itens.

    public function pedidos($pedidos){
       echo "<link rel='stylesheet' href='Assets/css/pedidos.css'>";
        echo $pedidos;
    }

    public function itens($itens){
        echo "<link rel='stylesheet' href='Assets/css/itens.css'>";
        echo $itens;
    }

}

?>