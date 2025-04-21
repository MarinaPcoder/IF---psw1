<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio</title>
</head>
<body>
<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f9ff;
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 40px;
    }

    h1 {
      color: #2B5288;
    }

    .calculadora {
      background-color: #d4edff;
      border-radius: 20px;
      padding: 30px;
      width: 320px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    .visor {
      display: flex;
      justify-content: space-between;
      gap: 10px;
      margin-bottom: 20px;
    }

    .visor input {
      width: 100%;
      padding: 10px;
      font-size: 18px;
      text-align: center;
      border-radius: 10px;
      border: 2px solid #2B5288;
      background-color: #fff;
    }

    .teclado {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
    }

    .teclado button {
      padding: 15px;
      font-size: 18px;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      font-weight: bold;
    }

    .teclado .soma     { background-color: #fbc4ab; }
    .teclado .sub      { background-color: #ffb3c6; }
    .teclado .mult     { background-color: #d3c4f3; }
    .teclado .divisao  { background-color: #caffbf; }
    .teclado .resto    { background-color: #fdffb6; }
    .teclado .igual    { background-color: #a0c4ff; grid-column: span 3; }
    .teclado .limpar   { background-color: #ffc6ff; grid-column: span 3; }

    .resultado {
      margin-top: 20px;
      font-size: 20px;
      color: #003B73;
      font-weight: bold;
    }
  </style>
</head>
<body>

<h1>Calculadora Colorida</h1>

<div class="calculadora">
  <form method="post">
    <div class="visor">
      <input type="number" name="n1" placeholder="Número 1" value="<?= $_POST['n1'] ?? '' ?>" required>
      <input type="text" name="operacao" placeholder="Operação" value="<?= $_POST['operacao'] ?? '' ?>" readonly>
      <input type="number" name="n2" placeholder="Número 2" value="<?= $_POST['n2'] ?? '' ?>" required>
    </div>

    <div class="teclado">
      <button type="submit" name="operacao" value="+"
        class="soma">+</button>
      <button type="submit" name="operacao" value="-"
        class="sub">-</button>
      <button type="submit" name="operacao" value="*"
        class="mult">×</button>

      <button type="submit" name="operacao" value="/"
        class="divisao">÷</button>
      <button type="submit" name="operacao" value="%"
        class="resto">%</button>

      <button type="submit" name="calcular"
        class="igual">= Calcular</button>

      <button type="submit" name="limpar"
        class="limpar">C Limpar</button>
    </div>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["limpar"])) {
      header("Location: " . $_SERVER["PHP_SELF"]);
      exit();
    }

    $n1 = floatval($_POST["n1"]);
    $n2 = floatval($_POST["n2"]);
    $op = $_POST["operacao"] ?? '';
    $resultado = '';

    if (isset($_POST["calcular"])) {
      if ($op == '+') {
        $resultado = $n1 + $n2;
      } elseif ($op == '-') {
        $resultado = $n1 - $n2;
      } elseif ($op == '*') {
        $resultado = $n1 * $n2;
      } elseif ($op == '/') {
        $resultado = $n2 != 0 ? $n1 / $n2 : "Erro: divisão por zero";
      } elseif ($op == '%') {
        $resultado = $n2 != 0 ? $n1 % $n2 : "Erro: divisão por zero";
      } else {
        $resultado = "Operação inválida";
      }

      echo "<div class='resultado'>Resultado: <strong>$resultado</strong></div>";
    }
  }
  ?>
</div>

</body>
</html>