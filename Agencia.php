<?php 

const CHEQUE_ESPECIAL = 500;
$clientes = [];

function cadastrarCliente(&$clientes): bool {

    $nome = readline('Informe seu nome: ');
    $cpf  = readline('Informe seu CPF: ');

    //validar cliente
    if (isset($clientes[$cpf])) {
        print('Esse CPF já possui cadastro.\n');
        return false;
    }

    $clientes[$cpf] = [
        'nome' => $nome, 
        'cpf' => $cpf,
        'contas' => []
    ];

    return true;
}

function cadastrarConta(array &$clientes): bool {

    $cpf = readline("Informe seu CPF:");

    if (!isset($clientes[$cpf])) {
        print "Cliente não possui cadastro \n";
        return false;
    }

    $numConta = rand(10000, 100000);

    $clientes[$cpf]['contas'][$numConta] = [
        'saldo' => 0,
        'cheque_especial' => CHEQUE_ESPECIAL,
        'extrato' => []
    ];

    print "Conta criada com sucesso\n";
    print "O número da sua conta é: #{$numConta}";
    return true;

}

function depositar(array &$clientes){
    $cpf = readline("Informe seu CPF novamente: ");

    $numConta = readline("Informe o número da conta:");

    $valorDeposito = (float) readline("Informe o valor do depósito: ");

    if ($valorDeposito <= 0) {
        print "Valor de depósito inválido\n";
        return false;
    }

    $clientes[$cpf]['contas'][$numConta]['saldo'] += $valorDeposito;

    $dataHora = date('d/m/Y H:i');
    $clientes[$cpf]['contas'][$numConta]['extrato'][] = "Depósito de R$ $valorDeposito em $dataHora";


    print "Depósito realizado com sucesso\n";
    return true;
}

function sacar(&$clientes){

    $cpf = readline("informe seu CPF:");

    //validacao do CPF

    $conta = readline("informe o número da conta: ");
    $valorSaque = readline("Informe o valor do saque:");

    $saldoDisponivel = $clientes[$cpf]['contas'][$conta]['saldo'] + $clientes[$cpf]['contas'][$conta]['cheque_especial'];

    if ($valorSaque > $saldoDisponivel) {
        print "Saldo insuficiente\n";
        return false;
    }

    $clientes[$cpf]['contas'][$conta]['saldo'] -= $valorSaque;

    $dataHora = date('d/m/Y H:i');
    $clientes[$cpf]['contas'][$conta]['extrato'][] = "Saque de R$ $valorSaque em $dataHora";

}

function consultarContas(array &$clientes){

    $cpf = readline("Informe seu CPF: ");

    $contas = $clientes[$cpf]['contas'];

    if(empty($contas)) {
        print "Não existe nenhuma conta!\n";
        return false;
    }
    

    print "\n =============== CONTAS DO CLIENTE ===============\n";
    print "Cliente: " . $clientes[$cpf]['nome'] . "\n";
    print "CPF: " . $cpf . "\n";
    print "Numero da Conta: #{$NumConta}";
    print "================================================\n";

}

function saldo_extrato(array &$clientes){
    $cpf = readline("Informe seu CPF: ");

    if (!isset($clientes[$cpf])) {
        print "Você digitou um cpf que ainda não foi cadastrado!\n";
        return false;
    }

    $numConta = readline("Informe o número da conta: ");

    if (!isset($clientes[$cpf]['contas'][$numConta])) {
        print "Conta não encontrada\n";
        return false;
    }

    $saldo = $clientes[$cpf]['contas'][$numConta]['saldo'];
    $extrato = $clientes[$cpf]['contas'][$numConta]['extrato'];
    $chequeEspecial = $clientes[$cpf]['contas'][$numConta]['cheque_especial'];
    $saldoDisponivel = $saldo + $chequeEspecial;

    print "\n =============== EXTRATO DA CONTA ===============\n";
    print "Cliente: " . $clientes[$cpf]['nome'] . "\n";
    print "CPF: " . $cpf . "\n";
    print "Número da Conta: #{$numConta}\n";
    print "Saldo Atual: R$". number_format($saldo, 2, ',', '.') . "\n";
    print "Cheque Especial: R$ " . number_format($chequeEspecial, 2, ',', '.') . "\n";
    print "Saldo Disponível: R$ " . number_format($saldoDisponivel, 2, ',', '.') . "\n";
    print "------------------------------------------------\n";
    print "Extrato:\n";

    foreach ($extrato as $movimentacao) {
         print $movimentacao . "\n";
    }


    print "================================================\n";

    return true;
}

// MENU PRINCIPAL
function menu(){
    print "\n =============== MEU BANCO EM PHP ===============\n";
    print "1 - cadastrar cliente\n";
    print "2 - cadastrar conta\n";
    print "3 - depositar\n";
    print "4 - sacar\n";
    print "5 - consultar saldo/Extrato\n";
    print "6 - consultar Conta\n";
    print "7 - sair\n";

    print "Escolha uma opção:";
}

//PROGRAMA PRINCIPAL
while(true){

    menu();

    $opcao = readline();

    switch ($opcao) {
        case '1':
            cadastrarCliente($clientes);
            break;
        case '2':
            cadastrarConta($clientes);
            break;
        case '3':
            depositar($clientes);
            break;
        
        case '4':
            sacar($clientes);
            break;
        
        case '5':
            saldo_extrato($clientes);
            break;
        
        case '6':
            consultarContas($clientes);
            break;

        case '7':
            print "Obrigado por usar nosso banco";
            die();
        
        default:
            print "Opção inválida";
            break;
    }
}
