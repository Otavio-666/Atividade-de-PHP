<?php

menu();

function menu(): void
{

    $continuar = true;

    do {


        print("\033[32m▗▄▄▄▖▗▄▄▄▖ ▗▄▄▖▗▄▄▖ ▗▄▄▄▖▗▖  ▗▖▗▖ ▗▖ ▗▄▖     ▗▄▄▄  ▗▄▖      ▗▄▄▖ ▗▄▖ ▗▄▄▄▖▗▖  ▗▖ ▗▄▖ \n");
        print("  █    █  ▐▌   ▐▌ ▐▌  █  ▐▛▚▖▐▌▐▌ ▐▌▐▌ ▐▌    ▐▌  █▐▌ ▐▌    ▐▌   ▐▌ ▐▌  █   ▝▚▞▘ ▐▌ ▐▌\n");
        print("  █    █  ▐▌▝▜▌▐▛▀▚▖  █  ▐▌ ▝▜▌▐▛▀▜▌▐▌ ▐▌    ▐▌  █▐▛▀▜▌    ▐▌   ▐▛▀▜▌  █    ▐▌  ▐▛▀▜▌\n");
        print("  █  ▗▄█▄▖▝▚▄▞▘▐▌ ▐▌▗▄█▄▖▐▌  ▐▌▐▌ ▐▌▝▚▄▞▘    ▐▙▄▄▀▐▌ ▐▌    ▝▚▄▄▖▐▌ ▐▌▗▄█▄▖▗▞▘▝▚▖▐▌ ▐▌\n\n");

        print("Escolha a modelidade que você quer jogar?\n\n");

        print("[1] Mega-Sena\n");
        print("[2] Quina\n");
        print("[3] Lotomania\n");
        print("[4] Lotofácil\n\033[31m");
        print("[5] Sair\n\033[0m");

        $opcao = trim(readline());

        switch ($opcao) {
            case "1":
                print("escolhido foi Mega Sena\n");
                MegaSena();
                break;
            
            case "2":
                print("escolhido foi Quina\n");
                
                break;

            case "3":
                print("escolhido foi Lotomania\n");
                
                break;
            
            case "4":
                print("escolhido foi Lotofacil\n");
                
                break;

            case "5":
                print("escolhido foi Sair\n");
                $continuar = false;
                break;
            
            default:
                $opcao = trim(readline(("Escolha um valor valido")));
                break;
        }



    } while ($continuar);
}



function MegaSena(): void {

    $quantidadeJogos = readline("Quantos jogos deseja: ");
    $quantidadeDezenas = readline("Quantas dezenas cada jogo: ");

    SorteioEVerificacao($quantidadeDezenas, 1, 60);

}

function SorteioEVerificacao($quantidadeDezenas, $min, $max) {

    $numeros = [];
    $numero = 0;
    $continuar = true;
    for ($i=0; $i < $quantidadeDezenas; $i++) { 
        $numero = rand($min, $max);
        
       do {
        if(!in_array($numero, $numeros)){
            $numeros[] = $numero;
            $continuar = false;
       }else{
            $continuar = true;
            $numero = rand(1, 60);
       }
       } while ($continuar);
      
    }
    sort($numeros);

  return $numeros
}
