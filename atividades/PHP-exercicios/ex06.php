<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 6</title>
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

    .painel {
      background-color: #A8D0F0;
      border-radius: 8px;
      padding: 30px;
      display: flex;
      align-items: center;
      max-width: 700px;
      gap: 20px;
    }

    .painel img {
      width: 160px;
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
  $imagem = "./imagens/termometro.jpg"; 
  $mensagem = "";

  if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['temperatura'])) {
    $temp = floatval($_POST['temperatura']);

    if ($temp > 99) {
      $imagem = "./imagens/febre-alta.png";
      $mensagem = "Vai entrar em ebulição, porra?!";
    } elseif ($temp > 36.7) {
      $imagem = "./imagens/febre.jpg";
      $mensagem = "Você está com febre! Sugiro procurar um médico.";
    } elseif ($temp >= 36 && $temp <= 36.7) {
      $imagem = "./imagens/medico-feliz.jpg"; 
      $mensagem = "Temperatura ideal!";
    } else {
      $imagem = "./imagens/penguin-frio.jpg";
      $mensagem = "moço... cê tá numa fria ";
    }
  }
?>

  <div class="painel">
    <img src="<?= $imagem ?>" alt="temp temp temp">

    <div class="formulario">
      <h2>Digite sua temperatura corporal (°C)</h2>
      <form method="post">
        <input type="number" name="temperatura" step="0.1" placeholder="Ex: 36.5" required>
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