<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 8</title>
</head>
<body>
<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #E0F2FF; /* azul claro */
      color: #003B73;
      padding: 40px;
      text-align: center;
    }

    .container {
      margin-top: 30px;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 10px;
    }

    .numero {
      padding: 8px 12px;
      background-color: #A8D0F0; /* azul suave */
      border: 1px solid #2B5288;
      border-radius: 6px;
      font-weight: bold;
    }

    .separador {
      margin: 0 5px;
      color: #2B5288;
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
</head>
<body>

  <form method="post">
    <input type="submit" name="iniciar" value="iniciar escrita">
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["iniciar"])) {
    echo "<div class='container'>";
    for ($i = 1; $i <= 100; $i++) {
      echo "<span class='numero'>$i</span>";
    }
    echo "</div>";
  }
  ?>
</body>
</html>