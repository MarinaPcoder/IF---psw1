<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci</title>
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
      color: #111;
      padding: 30px;
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
      justify-content: center;
      gap: 30px;
    }

    .coluna-esquerda, .coluna-direita {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .coluna-esquerda {
      flex: 1;
      min-width: 300px;
      max-width: 600px;
    }

    .coluna-direita {
      flex: 1;
      min-width: 300px;
      max-width: 400px;
    }

    .box {
      background-color: white;
      border: 2px solid var(--marsala);
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    h2 {
      color: var(--marsala);
      margin-bottom: 10px;
    }

    p, pre {
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

    @media (max-width: 900px) {
      .container {
        flex-direction: column;
        align-items: center;
      }

      .coluna-esquerda, .coluna-direita {
        width: 100%;
        max-width: none;
      }
    }
  </style>
</head>
<body>

<header>
  <h1>Sequência de Fibonacci com Função Recursiva</h1>
</header>

<div class="container">

  <div class="coluna-esquerda">
    <div class="box">
      <h2>O que é a sequência de Fibonacci?</h2>
      <p><strong>Sequência de Fibonacci</strong> é uma sequência de números em que cada número, a partir do terceiro, é obtido somando os dois anteriores.</p>

<p>Ela começa com os números <code>0</code> e <code>1</code>, e continua assim:</p>

<p><code>0, 1, 1, 2, 3, 5, 8, 13, 21, 34, ...</code></p>

<p>Veja alguns exemplos:</p>
<ul>
  <li><code>1 = 0 + 1</code></li>
  <li><code>2 = 1 + 1</code></li>
  <li><code>3 = 1 + 2</code></li>
  <li><code>5 = 2 + 3</code></li>
  <li><code>8 = 3 + 5</code></li>
</ul>
    </div>

    <div class="box">
      <h2>O que é uma função recursiva?</h2>
      <p><strong>Função recursiva</strong> é uma função que se chama dentro dela mesma para resolver parte de um problema maior.</p>
      <p>No caso da Fibonacci, para calcular o número de posição N, a função chama a si mesma para calcular as posições N-1 e N-2, e depois soma os dois resultados.</p>
      <p>Ela para de se chamar quando chega nos <em>casos base</em>: <code>fibonacci(0) = 0</code> e <code>fibonacci(1) = 1</code>.</p>
    </div>

    <div class="box">
      <h2>Exemplo de chamada recursiva</h2>
      <p>Na função recursiva, para calcular <code>fibonacci(4)</code>, o que estamos fazendo é buscar o número que está na <strong>posição 4</strong> da sequência (começando do zero).</p>

<p>A chamada funciona assim:</p>
<pre>
fibonacci(4)
→ fibonacci(3) + fibonacci(2)
→ (fibonacci(2) + fibonacci(1)) + (fibonacci(1) + fibonacci(0))
→ (1 + 1) + (1 + 0)
→ 2 + 1 = 3
</pre>

    <p>Isso significa que o número <strong>na posição 4</strong> da sequência é <strong>3</strong>.</p>

    <p><strong>Importante:</strong> a sequência começa da posição 0. 
    Ou seja, se você quer o <em>12º número</em> da sequência, o índice será <code>11</code> e o valor será <strong>89</strong>.</p>
      <p>Ou seja, <code>fibonacci(4) = 3</code>.</p>
    </div>
  </div>

  <div class="coluna-direita">
    <div class="box">
      <h2>Exemplo Prático:</h2>
      <form method="post">
        <label for="numero">Digite um número (posição da sequência):</label>
        <input type="number" name="numero" id="numero" min="0" required>
        <button type="submit">Calcular Fibonacci</button>
      </form>

      <?php
      // Função recursiva de Fibonacci
      function fibonacci($n) {
        if ($n == 0) return 0;     // caso base
        if ($n == 1) return 1;     // caso base
        return fibonacci($n - 1) + fibonacci($n - 2); // chamada recursiva
      }

      if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["numero"])) {
        $n = intval($_POST["numero"]);
        $resultado = fibonacci($n);
        echo "<div class='resultado'>fibonacci($n) = $resultado</div>";
      }
      ?>
    </div>
  </div>
</div>

</body>
</html>