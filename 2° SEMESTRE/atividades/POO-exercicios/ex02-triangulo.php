<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Triângulo - Exercício </title>
</head>
<body>
      <style>
    body {
      background-color: #f0faff;
      font-family: sans-serif;
      text-align: center;
      padding: 40px;
    }

    .card {
      display: inline-block;
      background-color: #eaf6ff;
      border: 2px solid rgb(53, 142, 201);
      border-radius: 20px;
      padding: 20px;
      margin-top: 20px;
      width: 300px;
      color: #2e4053;
    }

    .valid {
      color: green;
    }

    .invalid {
      color: red;
    }

    .area {
      font-size: 20px;
      margin-top: 10px;
      color: #1f618d;
    }
  </style>
</head>
<body>

  <?php
    // Classe Triângulo
    class Triangulo {
      public $a, $b, $c;

      //construtor
      function __construct($a, $b, $c) {
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
      }

      // Verifica se é um triângulo válido
      function ehValido() {
        return ($this->a + $this->b > $this->c) &&
               ($this->a + $this->c > $this->b) &&
               ($this->b + $this->c > $this->a);
      }

      //fórmula de Heron
      function calcularArea() {
        $s = ($this->a + $this->b + $this->c) / 2;
        $area = sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
        return round($area, 2);
      }

      // exibindo tudo bonitinho
      function mostrar() {
        echo "<div class='card'>";
        echo "<p><strong>Lados:</strong> $this->a, $this->b, $this->c</p>";

        if ($this->ehValido()) {
          echo "<p class='valid'>É um triângulo válido!</p>";
          echo "<p class='area'>Área: " . $this->calcularArea() . " u²</p>";
        } else {
          echo "<p class='invalid'>Não forma um triângulo válido.</p>";
        }

        echo "</div>";
      }
    }

    // Testando 3 triângulos (só repetir o código que vai ter a quantidade de triângulos que quiser)
    $t1 = new Triangulo(6, 8, 10);
    $t2 = new Triangulo(9, 6, 12);
    $t3 = new Triangulo(9, 6, 12);
    
    $t1->mostrar();
    $t2->mostrar();
    $t3->mostrar();
  ?>
</body>
</html>