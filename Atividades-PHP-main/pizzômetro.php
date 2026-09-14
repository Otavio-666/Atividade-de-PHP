<?php

inicio();

function inicio(){

    entrada();
    resultado();

}

function entrada() {

    $usuario = readline("Digite seu nome:\n");
    print("Olá, $usuario!\nBem-vindo ao Pizzômetro!\n");
    sleep(2);

}
function resultado() {

    $pizza_pedacos = 12;
    $pizza_pessoas = 3;
    $quantidade_de_pessoas = readline("Quantas pessoas vão para o seu evento?\n");
    $pizza_necessarias = ceil(($quantidade_de_pessoas * $pizza_pessoas) / $pizza_pedacos);
    print("Calculando a quantidade de pizzas necessárias...\n");
    sleep(2);
    print("Para $quantidade_de_pessoas pessoas, você precisará de $pizza_necessarias pizzas.\n");
    print("Obrigado por usar o Pizzômetro! Volte sempre!\n");

}

