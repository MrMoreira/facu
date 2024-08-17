<?php
class Model{

    public function gera_mensagem_bem_vindo(){
        $nomeUsuario = "Vitor"; //Capturando do banco
        return "Olá ".$nomeUsuario.", seja bem vindo(a)!!!";
    }
    
}
?>