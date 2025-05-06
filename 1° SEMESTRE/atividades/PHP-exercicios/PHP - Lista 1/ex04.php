<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 4</title>
</head>
<body>
<style>
    body {
      font-family: Arial;
      background-color: #E0F2FF;
      margin: 0;
      padding-top: 30px;
      display: flex;
      justify-content: center;
    }

    .balada {
      background-color: #A8D0F0;
      padding: 30px;
      border-radius: 8px;
      text-align: center;
      width: 300px;
    }

    .balada img {
      width: 120px;
      height: auto;
      margin-bottom: 15px;
    }

    input[type="number"] {
      padding: 10px;
      width: 80%;
      border-radius: 6px;
      border: 1px solid #003B73;
      text-align: center;
      font-size: 16px;
      margin-bottom: 15px;
    }

    input[type="submit"] {
      padding: 10px 16px;
      background-color: #003B73;
      color: white;
      font-weight: bold;
      border: none;
      border-radius: 2px;
      cursor: pointer;
    }

    .resultado {
      margin-top: 15px;
      color:rgb(0, 0, 0);
      font-weight: bold;
      font-size: 16px;
    }
  </style>
</head>
<body>

  <div class="balada">
    <?php
    $img = "./imagens/police-asking.png";
    $mensagem = "";
    $idade = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idade"])) {
      $idade = intval($_POST["idade"]);

      if ($idade < 12) {
        $img = "./imagens/police-angry.png";
        $mensagem = "Volta pra casa, pivete! Vai jogar Roblox!";
      } elseif ($idade < 18) {
        $img = "./imagens/police-neutral.png";
        $faltam = 18 - $idade;
        $mensagem = "Volte daqui $faltam anos, criança.";
      } elseif ($idade >= 70) {
        $img = "./imagens/police-laugh.png";
        $mensagem = "Senhor, a saída do asilo é pelo outro lado… ";
      } else {
        $img = "./imagens/police-happy.png";
        $mensagem = "Você é maior de 18! Bem-vindo à boate! 🕺💃";
      }
    }

    echo "<img src='$img' alt='Guarda'>";
    ?>

    <form method="post">
      <label for="idade"><strong>Qual a sua idade?</strong></label><br>
      <input type="number" name="idade" id="idade" required min="0">
      <br>
      <input type="submit" value="Verificar">
    </form>

    <?php
    if (!empty($mensagem)) {
      echo "<div class='resultado'>$mensagem</div>";
    }
    ?>
  </div>

</body>
</html> 
