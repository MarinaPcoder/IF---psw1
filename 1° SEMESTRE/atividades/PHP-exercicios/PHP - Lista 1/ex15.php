<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 15</title>
</head>
<body>
<style>
    body {
      font-family: Arial;
      background-color: #E0F2FF;
      color: #003B73;
      padding: 40px;
      text-align: center;
    }

    .retangulo {
      width: 300px;
      height: 150px;
      border: 3px solid rgb(0, 0, 0);
      margin: 0 auto;
      position: relative;
      background-color: #A8D0F0;
    }

    .rotulo-altura, .rotulo-largura {
      position: absolute;
      color:rgb(0, 0, 0);
      font-weight: bold;
    }

    .rotulo-altura {
      right: -80px;
      top: 50%;
      transform: translateY(-50%);
    }

    .rotulo-largura {
      bottom: -30px;
      left: 50%;
      transform: translateX(-50%);
    }

    form {
      margin-top: 40px;
      color:rgb(0, 0, 0);
    }

    input[type="number"] {
      padding: 8px;
      width: 150px;
      border: 1px solid rgb(0, 0, 0);
      border-radius: 6px;
      text-align: center;
      margin: 10px;
    }

    input[type="submit"] {
      padding: 10px 20px;
      background-color: #2B5288;
      color: white;
      border: none;
      border-radius: 2px;
      font-weight: bold;
      cursor: pointer;
    }

    .resultado {
      margin-top: 30px;
      font-size: 20px;
      color:rgb(0, 0, 0);
      background-color: #A8D0F0;
      border: 2px solid rgb(0, 0, 0);
      display: inline-block;
      padding: 15px 30px;
      border-radius: 5px;
    }
  </style>
</head>
<body>

  <div class="retangulo">
    <div class="rotulo-altura">altura (h)</div>
    <div class="rotulo-largura">largura (b)</div>
  </div>

  <form method="post">
    <div>
      <label for="largura"><strong>Largura (base):</strong></label><br>
      <input type="number" name="largura" id="largura" required min="0" step="0.1">
    </div>
    <div>
      <label for="altura"><strong>Altura:</strong></label><br>
      <input type="number" name="altura" id="altura" required min="0" step="0.1">
    </div>
    <input type="submit" value="Calcular Área">
  </form>

  <?php

  function calculaAreaRetangulo($largura, $altura) {
      return $largura * $altura;
  }


  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $largura = floatval($_POST["largura"]);
    $altura = floatval($_POST["altura"]);
    $area = calculaAreaRetangulo($largura, $altura);

    echo "<div class='resultado'><strong>Área total:</strong> $area</div>";
  }
  ?>

</body>
</html>