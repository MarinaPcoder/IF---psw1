<?php
class ContaBancaria {
    public string $titular;
    public float $saldo;

    public function __construct($titular, $saldoInicial = 0) {
        $this->titular = $titular;
        $this->saldo = $saldoInicial;
        echo "<h2>Conta criada com sucesso para <strong>{$this->titular}</strong>!</h2>";
        $this->mostrarSaldo();
    }

    public function depositar($valor) {
        $this->saldo += $valor;
        echo "<p>Depósito de <strong>R$" . number_format($valor, 2, ',', '.') . "</strong> realizado com sucesso.</p>";
        $this->mostrarSaldo();
    }

    public function sacar($valor) {
        if ($valor > $this->saldo) {
            echo "<p style='color: red;'>Saque de <strong>R$" . number_format($valor, 2, ',', '.') . "</strong> não permitido. Saldo insuficiente!</p>";
        } else {
            $this->saldo -= $valor;
            echo "<p>Saque de <strong>R$" . number_format($valor, 2, ',', '.') . "</strong> efetuado com sucesso.</p>";
        }
        $this->mostrarSaldo();
    }

    public function mostrarSaldo() {
        echo "<p>Saldo atual de <strong>{$this->titular}</strong>: <span style='color: green;'>R$" . number_format($this->saldo, 2, ',', '.') . "</span></p><hr>";
    }
}

// Testando essa bomba
echo "<body style='font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px;'>";
echo "<div style='background: #fff; padding: 20px; border-radius: 10px; max-width: 600px; margin: auto; box-shadow: 0 4px 8px rgba(0,0,0,0.1);'>";
$conta = new ContaBancaria("enzo lalala");
$conta->depositar(500);
$conta->sacar(600);
$conta->sacar(400);
echo "</div></body>";
?>
