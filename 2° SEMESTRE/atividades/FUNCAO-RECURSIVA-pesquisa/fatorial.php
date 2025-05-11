<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Função Recursiva x Fatorial</title>
</head>
<body>
<style>
    :root {
      --marsala: #800000;
      --creme: #f9f4ef;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: var(--creme);
      font-family: 'Segoe UI', sans-serif;
      padding: 30px;
      color: #111;
    }

    header {
      background-color: var(--marsala);
      color: white;
      text-align: center;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 30px;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      gap: 30px;
      justify-content: center;
    }

    .box {
      background-color: white;
      border: 2px solid var(--marsala);
      border-radius: 10px;
      padding: 20px;
      width: 500px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    h2 {
      color: var(--marsala);
      margin-bottom: 10px;
    }

    input, button {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      font-size: 1rem;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    button {
      background-color: var(--marsala);
      color: white;
      cursor: pointer;
      margin-top: 15px;
    }

    .resultado {
      background-color: #f0eaea;
      padding: 15px;
      border-radius: 8px;
      margin-top: 15px;
      font-family: monospace;
    }

    @media (max-width: 600px) {
      .box {
        width: 90%;
      }
    }
  </style>
</head>
<body>

<header>
  <h1>Função Recursiva e Fatorial</h1>
</header>

<div class="container">
  <div class="box">
    <h2>Conceitos</h2>
    <p><strong>Fatorial</strong> é uma multiplicação de um número por todos os seus antecessores positivos. Exemplo:</p>
    <p><code>5! = 5 × 4 × 3 × 2 × 1 = 120</code></p> <br>

    <p><strong>Função recursiva</strong> é aquela que se chama dentro dela mesma para resolver um problema.</p> <br>

    <p>Por exemplo, para calcular o fatorial de 5, a função recursiva calcula 5 × fatorial(4), 
    depois 4 × fatorial(3), e assim por diante, até chegar em fatorial(1), que é conhecido como o caso base.</p> <br>

    <p>A cada chamada, a função avança um passo e se aproxima de um <em>caso base</em> — a condição que encerra as chamadas e permite que os resultados sejam combinados e retornados.</p> <br>

    <p>Para funcionar corretamente, toda função recursiva precisa de um <strong>caso base</strong>, que interrompe as chamadas para evitar loops infinitos.</p> <br>

    <p>No exemplo ao lado, usamos a recursão para calcular o <strong>fatorial</strong> de um número.</p> <br>

    <form method="post">
      <label for="numero">Digite um número:</label>
      <input type="number" name="numero" id="numero" min="0" required>
      <button type="submit">Calcular</button>
    </form>
  </div>

  <?php
  // Função que calcula o fatorial de um número
  function fatorialRecursivo($n) {
    // Caso base: se o número for 1, retorne 1
    if ($n <= 1) {
      return 1; // caso base
    }
    // Chamada recursiva: n * fatorial de (n - 1)
    return $n * fatorialRecursivo($n - 1); // chamada recursiva
  }

  if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["numero"])) {
    $num = intval($_POST["numero"]);
    $fatRecursivo = fatorialRecursivo($num);
  ?>

    <div class="box">
      <h2>Resultado com Recursão</h2>
      <div class="resultado">
        fatorialRecursivo(<?= $num ?>) = <?= $fatRecursivo ?>
      </div>
    </div>
  <?php } ?>
</div>

</body>
</html>