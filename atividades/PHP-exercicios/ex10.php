<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 10</title>
</head>
<body>
<style>
    body {
      font-family: Arial, sans-serif;
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

    .formulario h1 {
      margin-top: 0;
      color: #2B5288;
      font-size: 22px;
    }

    input[type="number"] {
      padding: 8px;
      width: 100%;
      font-size: 16px;
      border: 1px solid #2B5288;
      border-radius: 6px;
      text-align: center;
      margin-bottom: 10px;
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
      color: #2B5288;
    }

    .numero {
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
    <form method="post">
      <input type="number" name="numero" required>
      <?php
        $vetor = isset($_POST["vetor"]) ? $_POST["vetor"] : [];
        $novo = isset($_POST["numero"]) ? intval($_POST["numero"]) : null;

        if ($novo !== null && count($vetor) < 5) {
          $vetor[] = $novo;
        }

        foreach ($vetor as $v) {
          echo "<input type='hidden' name='vetor[]' value='$v'>";
        }
      ?>
      <input type="submit" name="registrar" value="adicionar número">
    </form>

    <form method="post">
      <input type="submit" name="resetar" value="Resetar">
    </form>
  </div>

  <?php if (count($vetor) === 5): ?>
    <div class="resultado">
      <h2>Números Digitados:</h2>
      <?php foreach ($vetor as $num): ?>
        <span class="numero"><?= $num ?></span>
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