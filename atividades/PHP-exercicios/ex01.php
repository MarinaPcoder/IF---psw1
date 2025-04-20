<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 1</title>
</head>
<body>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #E5E0D9;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  table {
    border-collapse: collapse;
    width: 700px;
    background-color: #E5E0D9;
    box-shadow: 0 0 10px rgba(43, 82, 136, 0.2);
  }

  th {
    background-color: #2B5288;
    color: #E5E0D9;
    padding: 10px;
    border: 1px solid #2B5288; 
  }

  td {
    border: 1px solid #2B5288; 
    padding: 8px;
    text-align: center;
    background-color: #E5E0D9;
    color: #2B5288;
  }

  input[type="text"], input[type="number"] {
    width: 100%;
    box-sizing: border-box;
    padding: 5px;
    border: 1px solid #2B5288; 
    background-color: #E5E0D9;
    color: #2B5288;
  }

  input[type="submit"] {
    background-color: #2B5288;
    color: #E5E0D9;
    border: none;
    padding: 8px 12px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease;
  }

  input[type="submit"]:hover {
    background-color: #1f406b;
  }

  .media {
    font-weight: bold;
    color: #2B5288;
    background-color: #E5E0D9;
  }
</style>
</head>
<body>

  <form method="post">
    <table>
      <tr>
        <th>Nome da Matéria</th>
        <th>Unidade I</th>
        <th>Unidade II</th>
        <th>Unidade III</th>
        <th>Unidade IV</th>
        <th>MÉDIA</th>
      </tr>
      <tr>
        <td><input type="text" name="materia" required></td>
        <td><input type="number" name="n1" min="0" max="100" step="0.01" required></td>
        <td><input type="number" name="n2" min="0" max="100" step="0.01" required></td>
        <td><input type="number" name="n3" min="0" max="100" step="0.01" required></td>
        <td><input type="number" name="n4" min="0" max="100" step="0.01" required></td>
        <td><input type="submit" value="Calcular Média"></td>
      </tr>

      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $materia = $_POST['materia'];
          $n1 = floatval($_POST['n1']);
          $n2 = floatval($_POST['n2']);
          $n3 = floatval($_POST['n3']);
          $n4 = floatval($_POST['n4']);
          $media = ($n1 + $n2 + $n3 + $n4) / 4;

          echo "<tr>";
          echo "<td>$materia</td>";
          echo "<td>$n1</td>";
          echo "<td>$n2</td>";
          echo "<td>$n3</td>";
          echo "<td>$n4</td>";
          echo "<td class='media'>" . number_format($media, 2) . "</td>";
          echo "</tr>";
        }
      ?>
    </table>
  </form>
</body>
</html>