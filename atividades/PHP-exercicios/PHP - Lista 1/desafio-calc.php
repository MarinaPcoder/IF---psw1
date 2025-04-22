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
            font-family: Arial;
            background-color: #f0f9ff;
            display: flex;
            justify-content: center;
            padding: 40px;
        }

        .calculadora {
            background-color: #d4edff;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            border-radius: 20px;
            padding: 30px;
            width: 340px;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }

        .visor {
            background-color: #000;
            color: #0f0;
            font-family: 'Courier New';
            font-size: 24px;
            padding: 40px;
            border-radius: 10px;
            width: 78%;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            gap: 10px;
            box-shadow: inset 0 0 6px #2b5288;
        }

        .visor input {
            background: transparent;
            border: none;
            color: #0f0;
            font-size: 24px;
            width: 33%;
            text-align: center;
        }

        .visor input::placeholder {
            color: #0f0a;
        }

        .teclado {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .botoes-operacoes {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .botoes-operacoes button {
            padding: 15px;
            font-size: 20px;
            width: 60px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            font-weight: bold;
        }

        .soma     { background-color: #fbc4ab; }
        .sub      { background-color: #ffb3c6; }
        .mult     { background-color: #d3c4f3; }
        .divisao  { background-color: #caffbf; }
        .resto    { background-color: #fdffb6; }

        .botoes-comandos {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-left: 10px;
        }

        .botoes-comandos button {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            font-size: 20px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .igual    { background-color: #a0c4ff; }
        .limpar   { background-color: #ffc6ff; }

        .resultado {
            margin-top: 20px;
            font-size: 20px;
            color:rgb(0, 0, 0);
            font-weight: bold;
        }
    </style>

<div class="calculadora">
  <form method="post">
    <div class="visor">
      <input type="number" name="n1" placeholder="0" value="<?= $_POST['n1'] ?? '' ?>" required>
      <input type="text" name="operacao" placeholder="?" value="<?= $_POST['operacao'] ?? '' ?>" readonly>
      <input type="number" name="n2" placeholder="0" value="<?= $_POST['n2'] ?? '' ?>" required>
    </div>

    <div class="teclado">
      <div class="botoes-operacoes">
        <button type="submit" name="operacao" value="+" class="soma">+</button>
        <button type="submit" name="operacao" value="-" class="sub">-</button>
        <button type="submit" name="operacao" value="*" class="mult">×</button>
        <button type="submit" name="operacao" value="/" class="divisao">÷</button>
        <button type="submit" name="operacao" value="%" class="resto">%</button>
      </div>

      <div class="botoes-comandos">
        <button type="submit" name="calcular" class="igual">=</button>
        <button type="submit" name="limpar" class="limpar">C</button>
      </div>
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

<div class="calculadora">
  <form method="post">
    <div class="visor">
      <input type="number" name="n1" placeholder="0" value="<?= $_POST['n1'] ?? '' ?>" required>
      <input type="text" name="operacao" placeholder="?" value="<?= $_POST['operacao'] ?? '' ?>" readonly>
      <input type="number" name="n2" placeholder="0" value="<?= $_POST['n2'] ?? '' ?>" required>
    </div>

    <div class="teclado">
      <div class="botoes-operacoes">
        <button type="submit" name="operacao" value="+" class="soma">+</button>
        <button type="submit" name="operacao" value="-" class="sub">-</button>
        <button type="submit" name="operacao" value="*" class="mult">×</button>
        <button type="submit" name="operacao" value="/" class="divisao">÷</button>
        <button type="submit" name="operacao" value="%" class="resto">%</button>
      </div>

      <div class="botoes-comandos">
        <button type="submit" name="calcular" class="igual">=</button>
        <button type="submit" name="limpar" class="limpar">C</button>
      </div>
    </div>
  </form>

  <?php
if (isset($_POST["calcular"])) {
  switch ($op) {
    case '+':
      $resultado = $n1 + $n2;
      break;
    case '-':
      $resultado = $n1 - $n2;
      break;
    case '*':
      $resultado = $n1 * $n2;
      break;
    case '/':
      $resultado = $n2 != 0 ? $n1 / $n2 : "Erro: divisão por zero";
      break;
    case '%':
      $resultado = $n2 != 0 ? $n1 % $n2 : "Erro: divisão por zero";
      break;
    default:
      $resultado = "Operação inválida";
  }

  echo "<div class='resultado'>Resultado: <strong>$resultado</strong></div>";
}
  ?>
</div>

</body>
</html>


