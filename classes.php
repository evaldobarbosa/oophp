<?php
class Produto
{
    public $valor;
}

abstract class Pessoa
{
    public $nome;
}

class Cliente extends Pessoa
{}

class Vendedor extends Pessoa
{
    const STATUS_TREINAMENTO = 0;
    const STATUS_EFETIVO = 1;

    public $status;

    public function emTreinamento()
    {
        $this->status = self::STATUS_TREINAMENTO;
    }

    public function efetivo()
    {
        $this->status = self::STATUS_EFETIVO;
    }

    public function getPercentualComissao()
    {
        switch ($this->status) {
            case self::STATUS_TREINAMENTO:
                return 0.01;

            default:
                return 0.02;
        }
    }
}

class Carrinho
{
    private $total = 0;

    private $cliente;
    private $vendedor;
    private $itens = array();

    public function setCliente(Cliente $value)
    {
        $this->cliente = $value;

        return $this;
    }

    public function setVendedor(Vendedor $value)
    {
        $this->vendedor = $value;

        return $this;
    }

    public function addItem(Produto $value)
    {
        //validação...

        $this->itens[] = $value;

        $this->total += $value->valor;

        return $this;
    }

    public function getItens()
    {
        return $this->itens;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getTotalComDescontos()
    {
        return $this->total * (1 - $this->getDescontoPromocional());
    }

    private function getDescontoPromocional()
    {
        //como se fosse buscar no banco de dados...
        return 0.2;
    }
}
