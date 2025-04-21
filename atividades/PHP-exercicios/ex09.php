<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 9</title>
</head>
<body>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #E0F2FF;
    color: #003B73;
    padding: 40px;
    text-align: center;
  }

  .bloco-geral {
    display: flex;
    justify-content: center;
    gap: 40px;
    margin-top: 20px;
    flex-wrap: wrap;
  }

  .forma {
    background-color: #d4edff;
    padding: 20px;
    border-radius: 15px;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
  }

  .container {
    margin-top: 10px;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
  }

  .numero {
    padding: 8px 12px;
    background-color: #A8D0F0;
    border: 1px solid #2B5288;
    border-radius: 6px;
    font-weight: bold;
  }

  form {
    margin-bottom: 10px;
    margin-top: 10px;
  }

  input[type="submit"] {
    padding: 10px 20px;
    background-color: #2B5288;
    color: white;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
  }
</style>

<div class="bloco-geral">
  <div class="forma">
    <form method="post">
      <input type="submit" name="forma1" value="forma 1: incremento de 2 em 2">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["forma1"])): ?>
      <div class="container">
        <?php
          for ($i = 2; $i <= 100; $i += 2) {
            echo "<span class='numero'>$i</span>";
          }
        ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="forma">
    <form method="post">
      <input type="submit" name="forma2" value="forma 2: verificação com % 2 == 0">
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["forma2"])): ?>
      <div class="container">
        <?php
          for ($i = 1; $i <= 100; $i++) {
            if ($i % 2 == 0) {
              echo "<span class='numero'>$i</span>";
            }
          }
        ?>
      </div>
    <?php endif; ?>
  </div>
</div>

</body>
</html>