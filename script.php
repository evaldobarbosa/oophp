<?php
/*
Maria: Cliente
José: Vendedor; Estagiário.
Calçado: Produto;
3 Itens (produtos)
Carrinho: Processa a compra
Simular a obtenção do percentual de desconto do banco de dados
 */
require "classes.php";

$produto1 = new Produto;
$produto1->valor = 49.9;

$produto2 = new Produto;
$produto2->valor = 79.9;

$produto3 = new Produto;
$produto3->valor = 121;

$cliente = new Cliente;
$cliente->nome = "Maria";

$vendedor = new Vendedor;
$vendedor->nome = "José";
$vendedor->emTreinamento();

$carrinho = new Carrinho;

$carrinho->setCliente($cliente)
    ->setVendedor($vendedor)
    ->addItem($produto1)
    ->addItem($produto2)
    ->addItem($produto3);

echo "TOTAL: {$carrinho->getTotal()}\n";
echo "TOTAL COM DESCONTOS: {$carrinho->getTotalComDescontos()}\n";

$descontos = $carrinho->getTotal() - $carrinho->getTotalComDescontos();
echo "TOTAL DE DESCONTOS: " . $descontos . "\n";
echo "TOTAL DE ITENS: " . count($carrinho->getItens()) . "\n";
