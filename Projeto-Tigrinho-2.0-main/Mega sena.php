<?php

menu();

function menu(): void {

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
                print("Você escolheu a Mega Sena!\n");
                sleep(3);
                echo "\033[2J\033[;H";
                spinner();
                echo "\033[2J\033[;H";
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
                print("Você saiu da caixa!\n");
                $continuar = false;
                break;
            
            default:
                $opcao = trim(readline(("Escolha uma opção válida:\n")));
                break;
        }



    } while ($continuar);
}

function MegaSena(): void {

    print("\033[32m███    ███ ███████  ██████   █████      ███████ ███████ ███    ██  █████  \n");
    print("████  ████ ██      ██       ██   ██     ██      ██      ████   ██ ██   ██ \n");
    print("██ ████ ██ █████   ██   ███ ███████     ███████ █████   ██ ██  ██ ███████ \n");
    print("██  ██  ██ ██      ██    ██ ██   ██          ██ ██      ██  ██ ██ ██   ██ \n");
    print("██      ██ ███████  ██████  ██   ██     ███████ ███████ ██   ████ ██   ██ \n");
    print("\nOs valores para jogar na Mega-Sena são:\n\033[0m");
    for ($i=6; $i < 21; $i++) { 
        print("O valor para jogar com " . $i . " números é de: R$ " . number_format(tabelaValoresMega($i), 2, ",", ".") . " reais\n\033[0m");
        sleep(1);
    }

    $quantidadeJogos = readline("Quantos jogos deseja: ");
    $quantidadeDezenas = readline("Quantas dezenas cada jogo: ");

    $dezenas = SorteioEVerificacao($quantidadeDezenas, 1, 60);
    print("\nOs seus números sorteados foram:\n");
    foreach ($dezenas as $num) {
        echo $num . "    " ; 
    }
    echo "\n";
    $continuar = readline();
    
    print("O valor final foi de seus jogos:\nR$ " . number_format(tabelaValoresMega($quantidadeDezenas) * $quantidadeJogos, 2, ",", ".")  . " reais\n");
    sleep(4);
    echo "\033[2J\033[;H";

}

function tabelaValoresMega($quantidadeDezenas) {

    $tabela = [
        6 => 6,
        7 => 42,
        8 => 168,
        9 => 504,
        10 => 1260,
        11 => 2772,
        12 => 5544,
        13 => 10296,
        14 => 18018,
        15 => 30030,
        16 => 48048,
        17 => 74256,
        18 => 111384,
        19 => 162792,
        20 => 232560
    ];

    return $tabela[$quantidadeDezenas];

}

function Quina(): void {

    $quantidadeJogos = readline("Quantos jogos deseja:");
    $quantidadeDezenas = readline("Quantas dezenas cada jogo: ");

    SorteioEVerificacao($quantidadeDezenas, 1, 80);

}

function Lotomania(): void {

    $quantidadeJogos = readline("Quantos jogos deseja: ");
    $quantidadeDezenas = readline("Quantas dezenas cada jogo: ");

    SorteioEVerificacao($quantidadeDezenas, 0, 99);

}

function Lotofacil(): void {

    $quantidadeJogos = readline("Quantos jogos deseja: ");
    $quantidadeDezenas = readline("Quantas dezenas cada jogo: ");

    SorteioEVerificacao($quantidadeDezenas, 1, 25);

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

  return $numeros;
}

function spinner($mensagem = "Carregando") {
    $frames = ['|', '/', '-', '\\'];
    for ($i = 0; $i < 40; $i++) {
        $frame = $frames[$i % 4];
        echo "\r{$mensagem} {$frame}";
        usleep(150000);
    }
    echo "\n";
}
