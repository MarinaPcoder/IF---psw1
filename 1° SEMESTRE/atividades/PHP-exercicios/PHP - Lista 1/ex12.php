<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 12</title>
</head>
<body>
<style>
    body {
      font-family: Arial;
      background-color: #E0F2FF;
      color: #003B73;
      padding: 40px;
    }

    .principal {
      display: flex;
      gap: 40px;
      align-items: flex-start;
    }

    .formulario {
      background-color: #A8D0F0;
      border: 2px solid #2B5288;
      padding: 20px;
      border-radius: 10px;
      width: 280px;
    }

    .formulario h2 {
      margin-top: 0;
      color:rgb(0, 0, 0);
      font-size: 22px;
    }

    input[type="text"] {
      padding: 8px;
      width: 94%;
      font-size: 16px;
      border: 1px solid #2B5288;
      border-radius: 6px;
      margin-bottom: 10px;
      text-align: center;
    }

    input[type="submit"] {
      padding: 10px 20px;
      background-color: #2B5288;
      color: white;
      border: none;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
      width: 100%;
      margin-bottom: 10px;
    }

    .resultado {
      background-color: #A8D0F0;
      border: 2px solid #2B5288;
      padding: 20px;
      border-radius: 10px;
      min-width: 280px;
    }

    .resultado h2 {
      margin-top: 0;
      color:rgb(0, 0, 0);
    }

    .nome {
      display: inline-block;
      margin: 5px;
      padding: 8px 12px;
      background-color: #E0F2FF;
      border: 1px solid #2B5288;
      border-radius: 5px;
      font-weight: bold;
    }
  </style>
</head>
<body>

<div class="principal">


  <div class="formulario">
    <h2>Digite 5 Nomes:</h2>
    <form method="post">
      <input type="text" name="nome" placeholder="Digite um nome" required>

      <?php
        $nomes = isset($_POST["nomes"]) ? $_POST["nomes"] : [];
        $novo = isset($_POST["nome"]) ? trim($_POST["nome"]) : null;

        if ($novo !== null && $novo !== "" && count($nomes) < 5) {
          $nomes[] = ($novo);
        }

        foreach ($nomes as $n) {
          echo "<input type='hidden' name='nomes[]' value=\"$n\">";
        }
      ?>

      <input type="submit" name="registrar" value="Adicionar Nome">
    </form>

    <form method="post">
      <input type="submit" name="resetar" value="Resetar">
    </form>
  </div>

  <?php if (count($nomes) === 5): ?>
    <div class="resultado">
      <h2>Nomes Digitados:</h2>
      <?php foreach ($nomes as $nome): ?>
        <span class="nome"><?= $nome ?></span>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

</div>

<?php
if (isset($_POST["resetar"])) {
  header("Location: " . $_SERVER["PHP_SELF"]);
  exit();
}
?>
 
</body>
</html>