<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Retângulo - Exercício</title>
</head>
<body>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(to bottom, #e0f7fa, #b2ebf2);
      margin: 0;
      padding: 40px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .rectangle-container {
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 30px;
    }

    .rectangle {
      background-color: #a7ffeb;
      border: 3px solid #00897b;
      border-radius: 8px;
      position: relative;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: all 0.3s ease-in-out;
    }

    .rectangle-label {
      position: absolute;
      font-weight: bold;
      color: #004d40;
      background: white;
      padding: 2px 8px;
      border-radius: 5px;
    }

    .label-width {
      left: -100px;
      top: 50%;
      transform: translateY(-50%);
    }

    .label-height {
      top: -40px;
      left: 50%;
      transform: translateX(-50%);
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 10px;
      align-items: center;
    }

    .input-group {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    input[type="number"] {
      padding: 6px;
      width: 80px;
      border: 1px solid #ccc;
      border-radius: 6px;
    }

    .btn {
      background-color: #00796b;
      color: white;
      padding: 8px 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #004d40;
    }

    .card {
      background: white;
      padding: 20px;
      border-radius: 12px;
      border: 2px solid #009688;
      margin-top: 30px;
      box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
      text-align: center;
    }

    .result {
      color: #004d40;
      font-size: 16px;
      margin: 8px 0;
    }
  </style>
</head>
<body>

  <form method="post">
    <div class="input-group">
      <label for="altura">Altura:</label>
      <input type="number" name="altura" id="altura" required min="1">
      <label for="largura">Largura:</label>
      <input type="number" name="largura" id="largura" required min="1">
    </div>
    <button type="submit" class="btn">Calcular</button>
  </form>

  <?php
    class Retangulo {
      public $largura;
      public $altura;

      function __construct($largura, $altura) {
        $this->largura = $largura;
        $this->altura = $altura;
      }

      function calcularArea() {
        return $this->largura * $this->altura;
      }

      function calcularPerimetro() {
        return 2 * ($this->largura + $this->altura);
      }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $largura = $_POST["largura"];
      $altura = $_POST["altura"];
      $retangulo = new Retangulo($largura, $altura);
      $area = $retangulo->calcularArea();
      $perimetro = $retangulo->calcularPerimetro();


      
      $maxSize = 300;
      $larguraPx = min($maxSize, $largura * 5);
      $alturaPx = min($maxSize, $altura * 5);

      echo "<div class='rectangle-container'>";
      echo "<div class='rectangle' style='width: {$larguraPx}px; height: {$alturaPx}px;'>";
      echo "<div class='rectangle-label label-width'>{$largura} u</div>";
      echo "<div class='rectangle-label label-height'>{$altura} u</div>";
      echo "</div>";
      echo "</div>";

      echo "<div class='card'>";
      echo "<p class='result'><strong>Área:</strong> $area</p>";
      echo "<p class='result'><strong>Perímetro:</strong> $perimetro</p>";
      echo "</div>";
    }
  ?>

</body>
</html>