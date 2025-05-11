<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Aluno - Exercício</title>
</head>
<body>
  <style>
    body {
      margin: 0;
      font-family: sans-serif;
      background: linear-gradient(to bottom, #e3f2fd, #bbdefb);
      padding: 40px;
      text-align: center;
    }

    .boletim {
      background-color: white;
      border: 2px solid #2196f3;
      border-radius: 15px;
      width: 650px;
      margin: 0 auto;
      padding: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .aluno-info {
      margin-bottom: 20px;
      font-size: 18px;
      color: #0d47a1;
    }

    .semestres {
      display: flex;
      justify-content: space-between;
    }

    .semestre {
      width: 45%;
      background-color: #f1f8ff;
      padding: 15px;
      border-radius: 10px;
    }

    .semestre h3 {
      color: #1976d2;
      margin-bottom: 10px;
    }

    .nota {
      font-size: 16px;
      margin: 5px 0;
    }

    .resumo {
      margin-top: 20px;
      font-size: 18px;
      font-weight: bold;
    }

    .aprovado {
      color: green;
    }

    .reprovado {
      color: red;
    }

    .recuperacao {
      color: orange;
    }

    form {
      margin-bottom: 40px;
    }

    input[type="text"], input[type="number"] {
      padding: 8px;
      margin: 5px;
      width: 160px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .btn {
      background-color: #0d47a1;
      color: white;
      border: none;
      padding: 10px 20px;
      margin-top: 10px;
      border-radius: 10px;
      cursor: pointer;
    }

    .btn:hover {
      background-color: #003c8f;
    }

    .erro {
      color: red;
      margin-bottom: 15px;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <form method="post">
    <input type="text" name="nome" placeholder="Nome do Aluno" required><br>
    <input type="text" name="matricula" placeholder="Matrícula" required maxlength="15"><br>
    <input type="number" name="nota1" placeholder="Nota 1º Semestre (0 a 100)" min="0" max="100" required>
    <input type="number" name="nota2" placeholder="Nota 2º Semestre (0 a 100)" min="0" max="100" required><br>
    <button class="btn" type="submit">Gerar Boletim</button>
  </form>

  <?php
    class Aluno {
      public $nome;
      public $matricula;
      public $nota1;
      public $nota2;

      function __construct($nome, $matricula, $nota1, $nota2) {
        $this->nome = $nome;
        $this->matricula = $matricula;
        $this->nota1 = $nota1;
        $this->nota2 = $nota2;
      }

      function avaliarSemestre($nota) {
        if ($nota >= 60) {
          return ["Aprovado", "aprovado"];
        } elseif ($nota >= 40) {
          return ["Recuperação", "recuperacao"];
        } else {
          return ["Reprovado", "reprovado"];
        }
      }

      function situacaoFinal() {
        $total = $this->nota1 + $this->nota2;
        if ($total >= 120) {
          return ["Aprovado", "aprovado"];
        } elseif ($total >= 80) {
          return ["Recuperação", "recuperacao"];
        } else {
          return ["Reprovado", "reprovado"];
        }
      }

      function mostrarBoletim() {
        [$situacao1, $classe1] = $this->avaliarSemestre($this->nota1);
        [$situacao2, $classe2] = $this->avaliarSemestre($this->nota2);
        [$situacaoFinal, $classeFinal] = $this->situacaoFinal();
        $total = $this->nota1 + $this->nota2;

        echo "<div class='boletim'>";
        echo "<div class='aluno-info'><strong>Aluno:</strong> $this->nome | <strong>Matrícula:</strong> $this->matricula</div>";

        echo "<div class='semestres'>";
        echo "<div class='semestre'>
                <h3>1º Semestre</h3>
                <p class='nota'><strong>Nota:</strong> $this->nota1</p>
                <p class='nota'><strong>Aproveitamento:</strong> " . round($this->nota1, 1) . "%</p>
                <p class='nota $classe1'>$situacao1</p>
              </div>";
        echo "<div class='semestre'>
                <h3>2º Semestre</h3>
                <p class='nota'><strong>Nota:</strong> $this->nota2</p>
                <p class='nota'><strong>Aproveitamento:</strong> " . round($this->nota2, 1) . "%</p>
                <p class='nota $classe2'>$situacao2</p>
              </div>";
        echo "</div>";

        echo "<div class='resumo $classeFinal'>Média Anual: $total / 200 - $situacaoFinal</div>";
        echo "</div>";
      }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $nome = $_POST["nome"];
      $matricula = $_POST["matricula"];
      $nota1 = floatval($_POST["nota1"]);
      $nota2 = floatval($_POST["nota2"]);

      if ($nota1 < 0 || $nota1 > 100 || $nota2 < 0 || $nota2 > 100) {
        echo "<p class='erro'>As notas devem estar entre 0 e 100.</p>";
      } else {
        $aluno = new Aluno($nome, $matricula, $nota1, $nota2);
        $aluno->mostrarBoletim();
      }
    }
  ?>

</body>
</html>