<?php
// CLASSE PAI
class Cliente {
  protected string $logradouro;
  protected string $bairro;

  public function __construct(string $logradouro, string $bairro) {
    $this->logradouro = $logradouro;
    $this->bairro = $bairro;
  }

  // Retorna o endereço 
  public function verEndereco(): string {
    return "Rua: {$this->logradouro}, Bairro: {$this->bairro}";
  }
}

// CLASSE FILHA 1 
class ClientePessoaFisica extends Cliente {
  private string $nome;
  private int $cpf;

  public function __construct(string $logradouro, string $bairro, string $nome, int $cpf) {
    parent::__construct($logradouro, $bairro);
    $this->nome = $nome;
    $this->cpf = $cpf;
  }

  public function verInformacaoUsuario(): string {
    return "<strong>Nome:</strong> {$this->nome}<br><strong>CPF:</strong> {$this->cpf}";
  }
}

// CLASSE FILHA 2
class ClientePessoaJuridica extends Cliente {
  private int $cnpj;
  private string $nomeFantasia;

  public function __construct(string $logradouro, string $bairro, int $cnpj, string $nomeFantasia) {
    parent::__construct($logradouro, $bairro);
    $this->cnpj = $cnpj;
    $this->nomeFantasia = $nomeFantasia;
  }

  public function verInformacaoEmpresa(): string {
    return "<strong>Nome Fantasia:</strong> {$this->nomeFantasia}<br><strong>CNPJ:</strong> {$this->cnpj}";
  }
}

//CRIANDO OBJETOS
$cliente1 = new ClientePessoaFisica("Rua Enzo", "Centro", "Pedro Pião", 12345678900);
$cliente2 = new ClientePessoaJuridica("Morro Azul", "Casinhas do Governo", 9876543210001, "Pião's Pedro's Bar and Restaurant");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exemplo de Herança POO - PHP</title>
  <style>
    body {
      font-family: sans-serif;
      background: linear-gradient(135deg,rgb(205, 241, 246),rgb(246, 194, 255));
      padding: 2rem;
      color: #333;
    }

    .container {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      gap: 2rem;
    }

    .card {
      background: #fff;
      border-radius: 1rem;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      padding: 1.5rem;
      max-width: 300px;
      transition: transform 0.3s;
    }

    .title {
      font-size: 1,2rem;
      color: #6a1b9a;
      margin-bottom: 0,5rem;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .info {
      margin-top: 1rem;
      line-height: 1.6;
    }

  </style>
</head>
<body>

  <div class="container">
    <!-- Pessoa Física -->
    <div class="card">
      <div class="title">Cliente Pessoa Física</div>
      <div class="info">
        <?php
          echo $cliente1->verInformacaoUsuario();
          echo "<br><em>" . $cliente1->verEndereco() . "</em>";
        ?>
      </div>
    </div>

    <!-- Pessoa Jurídica -->
    <div class="card">
      <div class="title">Cliente Pessoa Jurídica</div>
      <div class="info">
        <?php
          echo $cliente2->verInformacaoEmpresa();
          echo "<br><em>" . $cliente2->verEndereco() . "</em>";
        ?>
      </div>
    </div>
  </div>

</body>
</html>