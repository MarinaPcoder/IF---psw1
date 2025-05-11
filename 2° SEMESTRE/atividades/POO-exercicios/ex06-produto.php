<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Produto - Exercício </title>
</head>
<body>
      <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #f1f8e9, #dcedc8);
      padding: 40px;
      text-align: center;
    }

    .produto-card {
      background-color: white;
      border: 2px solid #8bc34a;
      border-radius: 15px;
      width: 400px;
      margin: 0 auto;
      padding: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .info {
      font-size: 18px;
      margin: 10px 0;
    }

    .disponivel {
      color: green;
      font-weight: bold;
    }

    .indisponivel {
      color: red;
      font-weight: bold;
    }

    form {
      margin-bottom: 30px;
    }

    input[type="text"], input[type="number"] {
      padding: 8px;
      margin: 8px;
      width: 180px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .btn {
      background-color: #689f38;
      color: white;
      border: none;
      padding: 10px 20px;
      margin-top: 10px;
      border-radius: 10px;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #558b2f;
    }

    .erro {
      color: red;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <form method="post">
    <input type="text" name="nome" placeholder="Nome do Produto" required maxlength="30"><br>
    <input type="number" name="preco" placeholder="Preço (R$)" step="0.01" min="0" required>
    <input type="number" name="quantidade" placeholder="Quantidade em Estoque" min="0" required><br>
    <button class="btn" type="submit">Registrar Produto</button>
  </form>

  <?php
    class Produto {
      public $nome;
      public $preco;
      public $quantidade;

      function __construct($nome, $preco, $quantidade) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
      }

      function calcularValorTotal() {
        return $this->preco * $this->quantidade;
      }

      function disponivel() {
        return $this->quantidade > 0;
      }

      function exibirProduto() {
        $disponibilidade = $this->disponivel() ? 
          "<p class='disponivel'>Disponível em estoque</p>" :
          "<p class='indisponivel'>Indisponível</p>";

        echo "<div class='produto-card'>";
        echo "<p class='info'><strong>Produto:</strong> $this->nome</p>";
        echo "<p class='info'><strong>Preço:</strong> R$ " . number_format($this->preco, 2, ',', '.') . "</p>";
        echo "<p class='info'><strong>Quantidade:</strong> $this->quantidade unidades</p>";
        echo "<p class='info'><strong>Valor Total em Estoque:</strong> R$ " . number_format($this->calcularValorTotal(), 2, ',', '.') . "</p>";
        echo $disponibilidade;
        echo "</div>";
      }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nome = $_POST["nome"];
      $preco = floatval($_POST["preco"]);
      $quantidade = intval($_POST["quantidade"]);

      if ($preco < 0 || $quantidade < 0) {
        echo "<p class='erro'>Preço e quantidade não podem ser negativos.</p>";
      } else {
        $produto = new Produto($nome, $preco, $quantidade);
        $produto->exibirProduto();
      }
    }
  ?>

</body>
</html>