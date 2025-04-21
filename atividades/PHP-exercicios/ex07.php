<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 7</title>
</head>
<body>
<style>
    body {
      font-family: Arial;
      background-color: #E0F2FF;
      margin: 0;
      padding: 40px;
      text-align: center;
      color: #003B73;
    }

    h1 {
      color:rgb(0, 0, 0);
      font-size: 36px;
      margin-bottom: 30px;
    }

    .container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin-bottom: 30px;
    }

    .card {
      background-color: #A8D0F0;
      border: 2px solid #2B5288;
      border-radius: 10px;
      padding: 15px;
      width: 300px;
      text-align: left;
    }

    .card h2 {
      color: #2B5288;
      text-align: center;
      margin-bottom: 10px;
    }

    .item {
      margin-bottom: 10px;
    }

    .quantidade {
      width: 50px;
      margin-left: 10px;
      border: 1px solid #2B5288;
      border-radius: 4px;
      padding: 4px;
    }

    input[type="submit"] {
      background-color: #2B5288;
      color: white;
      border: none;
      border-radius: 6px;
      padding: 10px 20px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 20px;
    }

    .nota {
      margin-top: 30px;
      background-color: #A8D0F0;
      border: 2px solid #2B5288;
      border-radius: 12px;
      padding: 20px;
      display: inline-block;
    }

    ul {
      text-align: left;
    }
  </style>
</head>
<body>

<h1>Brr Brr Patapim Coffee</h1>

<?php
$menu = [
  "Salgados" => [
    "Coxinha" => 5.00,
    "Empada" => 4.50,
    "Kibe" => 5.00,
    "Pastel de Queijo" => 6.00,
    "Esfiha de Carne" => 6.50
  ],
  "Sanduíches" => [
    "X-Salada" => 10.00,
    "X-Bacon" => 12.00,
    "Hambúrguer Vegano" => 14.00,
    "Frango Grelhado" => 11.50,
    "Hot Dog" => 8.00
  ],
  "Panquecas" => [
    "Panqueca de Frango" => 9.00,
    "Panqueca de Carne" => 9.50,
    "Panqueca de Queijo" => 8.50,
    "Panqueca Vegana" => 10.00,
    "Panqueca Doce" => 7.00
  ],
  "Bebidas" => [
    "Água" => 2.00,
    "Refrigerante" => 4.00,
    "Suco Natural" => 5.00,
    "Chá Gelado" => 4.50,
    "Café Expresso" => 3.00
  ],
  "Shakes" => [
    "Shake de Morango" => 8.00,
    "Shake de Chocolate" => 8.50,
    "Shake de Baunilha" => 7.50,
    "Shake Proteico" => 10.00,
    "Shake Vegano" => 9.00
  ],
  "Sobremesas" => [
    "Brownie" => 6.00,
    "Torta de Limão" => 6.50,
    "Cheesecake" => 7.00,
    "Sorvete" => 5.00,
    "Mousse de Maracujá" => 6.00
  ]
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  echo "<div class='nota'><h2>Nota Fiscal</h2><ul>";
  $total = 0;

  foreach ($menu as $categoria => $itens) {
    foreach ($itens as $item => $preco) {
      if (isset($_POST['pedido'][$item]) && isset($_POST['quantidade'][$item])) {
        $qtd = intval($_POST['quantidade'][$item]);
        if ($qtd > 0) {
          $subtotal = $qtd * $preco;
          $total += $subtotal;
          echo "<li><strong>$item</strong> — $qtd x R$ " . number_format($preco, 2, ',', '.') . " = R$ " . number_format($subtotal, 2, ',', '.') . "</li>";
        }
      }
    }
  }

  if ($total > 0) {
    echo "</ul><strong>Total: R$ " . number_format($total, 2, ',', '.') . "</strong></div>";
  } else {
    echo "<p>Nenhum item selecionado.</p></div>";
  }
} else {
?>

<form method="post">
  <div class="container">
    <?php foreach ($menu as $categoria => $itens): ?>
      <div class="card">
        <h2><?= $categoria ?></h2>
        <?php foreach ($itens as $item => $preco): ?>
          <div class="item">
            <input type="checkbox" name="pedido[<?= $item ?>]" value="1" id="<?= md5($item) ?>">
            <label for="<?= md5($item) ?>"><?= $item ?> — R$ <?= number_format($preco, 2, ',', '.') ?></label>
            <input type="number" name="quantidade[<?= $item ?>]" class="quantidade" min="1" max="10" placeholder="Qtd">
          </div>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
  </div>
  <input type="submit" value="Finalizar Pedido">
</form>

<?php } ?>

</body>
</html>