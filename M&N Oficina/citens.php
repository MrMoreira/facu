<?php
    include "./Controller/controller.php";

    // Crie o objeto Controller antes de usá-lo
    $controller = new Controller();

    // Agora você pode chamar os métodos do objeto
    //$controller->monta_pagina_incial();
    $controller->navbar();
    $controller->citens();
?>
