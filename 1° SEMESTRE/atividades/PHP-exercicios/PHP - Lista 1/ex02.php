<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 2</title>
</head>
<body>
<style>
    body {
      font-family: Arial;
      background-color: #E0F2FF;
      margin: 0;
      padding: 30px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .caixas {
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
    }

    .caixa {
      background-color: #A8D0F0;
      border-radius: 2px;
      padding: 20px;
      width: 250px;
      text-align: center;
    }

    .caixa:nth-child(2) {
      background-color: #7BB2E3;
    }

    .caixa:nth-child(3) {
      background-color: #4A90D9;
    }

    .caixa img {
      width: 50px;
      height: 50px;
      margin-bottom: 10px;
    }

    .caixa p {
      font-size: 18px;
      color:rgb(0, 0, 0);
      font-weight: bold;
    }

    input[type="number"] {
      padding: 8px;
      width: 80%;
      border-radius: 8px;
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
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
    }

    table {
      margin: 10px auto 0 auto;
      width: 100%;
      background-color: white;
      border-collapse: collapse;
    }

    th, td {
      border: 1px solid #003B73;
      padding: 6px;
      font-size: 14px;
    }

    th {
      background-color: #dbefff;
    }

    .titulo-div {
      color: #003B73;
      font-size: 16px;
      margin-bottom: 5px;
    }
  </style>
</head>
<body>

  <div class="caixas">
    <!-- nu celsius vai tomando -->
    <div class="caixa">
      <img src="./imagens/celsius.png" alt="Celsius">
      <p>Celsius (°C)</p>
      <form method="post">
        <input type="number" name="celsius" step="0.01" placeholder="Digite °C">
        <input type="submit" value="Converter">
      </form>

      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['celsius']) && $_POST['celsius'] !== '') {
        $c = floatval($_POST['celsius']);
        $f = $c * 1.8 + 32;
        $k = $c + 273.15;
        echo "<table>
                <tr> 
                <th>Fahrenheit (°F)</th> 
                <th>Kelvin (K)</th>
                </tr>
                <tr><td>" . number_format($f, 2) . "</td><td>" . number_format($k, 2) . "</td></tr>
              </table>";
      }
      ?>
    </div>

    <!-- nu fahrenheit vai tomando-->
    <div class="caixa">
      <img src="./imagens/fahrenheit.png" alt="Fahrenheit">
      <p>Fahrenheit (°F)</p>
      <form method="post">
        <input type="number" name="fahrenheit" step="0.01" placeholder="Digite °F">
        <input type="submit" value="Converter">
      </form>

      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fahrenheit']) && $_POST['fahrenheit'] !== '') {
        $f = floatval($_POST['fahrenheit']);
        $c = ($f - 32) / 1.8;
        $k = $c + 273.15;
        echo "<table>
                <tr>
                <th>Celsius (°C)</th>
                <th>Kelvin (K)</th>
                </tr>
                <tr><td>" . number_format($c, 2) . "</td><td>" . number_format($k, 2) . "</td></tr>
              </table>";
      }
      ?>
    </div>

    <!-- nu kelvin vai tomando -->
    <div class="caixa">
      <img src="./imagens/kelvin.png" alt="Kelvin">
      <p>Kelvin (K)</p>
      <form method="post">
        <input type="number" name="kelvin" step="0.01" placeholder="Digite K">
        <input type="submit" value="Converter">
      </form>

      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['kelvin']) && $_POST['kelvin'] !== '') {
        $k = floatval($_POST['kelvin']);
        $c = $k - 273.15;
        $f = $c * 1.8 + 32;
        echo "<table>
                <tr>
                <th>Celsius (°C)</th>
                <th>Fahrenheit (°F)</th>
                </tr>
                <tr><td>" . number_format($c, 2) . "</td><td>" . number_format($f, 2) . "</td></tr>
              </table>";
      }
      ?>
    </div>
  </div>

</body>
</html>