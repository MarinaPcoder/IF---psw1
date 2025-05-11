<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Pessoa - Exercício</title>
</head>
<body>

  <style>
    body {
      background-color: #fff0f6;
      font-family:sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 30px;
    }

    .card {
      background-color: #ffe6f0;
      border: 2px dashed #ffb3d1;
      border-radius: 25px;
      width: 250px;
      text-align: center;
      padding: 20px;
      margin: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: scale(1.05);
    }

    .card p {
      color: #6a0572;
      font-size: 18px;
      margin: 5px 0;
    }
  </style>
</head>
<body>

  <?php
    // Criando a classe Pessoa
    class Pessoa {
      public $nome;
      public $idade;

      // Construtor da classe
      function __construct($nome, $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
      }

      // Método apresentar
      function apresentar() {
        echo "
          <div class='card'>
            <p><strong>Nome:</strong> $this->nome</p>
            <p><strong>Idade:</strong> $this->idade anos</p>
          </div>
        ";
      }
    }

    // Criando dois objetos Pessoa
    $pessoa1 = new Pessoa("Enzo viado", 18);
    $pessoa2 = new Pessoa("Marina", 70);

    // Chamando o método apresentar
    $pessoa1->apresentar();
    $pessoa2->apresentar();
  ?>

</body>
</html>