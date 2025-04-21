<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 3</title>
</head>
<body>
<style>
    body {
      font-family: Arial;
      background-color: #E0F2FF;
      margin: 0;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100%;
      padding-top: 20px;
    }

    .caixa {
      background-color: #A8D0F0;
      padding: 30px;
      border-radius: 8px;
      text-align: center;
      width: 400px;
    }

    input[type="number"] {
      padding: 8px;
      width: 90%;
      border-radius: 2px;
      border: 1px solid #003B73;
      text-align: center;
      font-size: 16px;
      margin-bottom: 10px;
    }

    input[type="submit"] {
      padding: 8px 12px;
      background-color: #003B73;
      color: white;
      border: none;
      border-radius: 2px;
      cursor: pointer;
      font-weight: bold;
    }

    .resultado {
      margin-top: 15px;
      font-size: 18px;
      color:rgb(0, 0, 0);
      font-weight: bold;
    }
  </style>
</head>
<body>

  <div class="caixa">
    <form method="post">
      <input type="number" name="numero" placeholder="Digite um número inteiro" required>
      <br>
      <input type="submit" value="Verificar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numero"])) {

      $numeroDigitado = intval($_POST["numero"]);

      if ($numeroDigitado % 2 == 0) {
        $mensagem = "O número $numeroDigitado é <strong>PAR</strong>.";
      } else {
        $mensagem = "O número $numeroDigitado é <strong>ÍMPAR</strong>.";
      }

      echo "<div class='resultado'>$mensagem</div>";
    }
    ?>
  </div>

</body>
</html>