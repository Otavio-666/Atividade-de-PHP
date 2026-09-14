<?php

inicio();

function inicio(){

    print("Bem-vindo ao jogo de adivinhação!\n");
    jogar();

}

function numero_secreto(){

    $numero = rand(1, 100);
    return $numero;

}

function jogar(){

    $numero = numero_secreto();
    $tentativas = 0;
    $acertou = false;

    while(!$acertou){

        $chute = (int)readline("Digite um número entre 1 e 100:\n");
        $tentativas++;
        $pontos = max(0, 100 - ($tentativas * 5));

        if($chute == $numero){

            $acertou = true;
            print("Parabéns! Você acertou o número em $tentativas tentativas!\n". pontuacao($pontos) . "\n");
            break;

        } elseif($chute < $numero){

            print("O número secreto é maior que $chute. Tente novamente.\n");

        } else {

            print("O número secreto é menor que $chute. Tente novamente.\n");

        } 
        
        if($pontos <= 0) {

            print("Sua pontuação chegou a 0. Você perdeu o jogo!\n");
            break;

        }

    }

}

function pontuacao($pontos){

    if($pontos >= 95){

        return "A sua pontuação foi de $pontos! Excelente!";

    } elseif($pontos >= 70 and $pontos <= 94){

        return "A sua pontuação foi de $pontos! Muito bom!";

    } else {

        return "A sua pontuação foi de $pontos! Você pode melhorar!";
        
    }
    

}