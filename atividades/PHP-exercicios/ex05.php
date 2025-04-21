<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 5</title>
</head>
<body>
<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #E0F2FF;
      margin: 0;
      padding: 60px 20px;
      display: flex;
      justify-content: center;
    }

    .radar {
      background-color: #A8D0F0;
      border-radius: 8px;
      padding: 30px;
      display: flex;
      align-items: center;
      max-width: 700px;
      gap: 20px;
    }

    .radar img {
      width: 180px;
      height: auto;
    }

    .formulario {
      flex: 1;
      text-align: center;
    }

    .formulario input[type="number"] {
      padding: 10px;
      width: 80%;
      border-radius: 2px;
      border: 1px solid #003B73;
      text-align: center;
      font-size: 16px;
      margin-bottom: 15px;
    }

    .formulario input[type="submit"] {
      padding: 10px 16px;
      background-color: #003B73;
      color: white;
      border: none;
      border-radius: 2px;
      cursor: pointer;
      font-weight: bold;
    }

    .mensagem {
      margin-top: 15px;
      font-size: 16px;
      font-weight: bold;
      color:rgb(0, 0, 0);
    }
  </style>
</head>
<body>
<?php
    $imagem = "./imagens/radar.jpg";
    $mensagem = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['velocidade'])) {
      $vel = floatval($_POST['velocidade']);

      if ($vel > 110) {
        $excesso = $vel - 110;
        $imagem = "./imagens/relâmpago-mcqueen.jpg";
        $mensagem = "Calma lá, campeão! Você está excedendo o limite em <strong>$excesso km/h</strong>!";
      
    } elseif ($vel == 110) {
        $imagem = "./imagens/police-happy.png";
        $mensagem = "Parabéns! Você está dentro do limite permitido";
      
    } elseif ($vel < 40) {
        $imagem = "./imagens/turtle.jpg";
        $mensagem = "Ei, você está a $vel km/h... Acelere!";
      
    } else {
        $imagem = "./imagens/police-neutral.png";
        $mensagem = "Tudo certo, mas você pode ir mais rápido";
      }
    }
  ?>

  <div class="radar">
    <img src="<?= $imagem ?>" alt="Imagem de reação">

    <div class="formulario">
      <h2>Informe a velocidade do seu carro (km/h)</h2>
      <form method="post">
        <input type="number" name="velocidade" placeholder="Velocidade atual" required min="0">
        <br>
        <input type="submit" value="Verificar">
      </form>

      <?php if (!empty($mensagem)) {
        echo "<div class='mensagem'>$mensagem</div>";
      } ?>
    </div>
  </div>

</body>
</html>