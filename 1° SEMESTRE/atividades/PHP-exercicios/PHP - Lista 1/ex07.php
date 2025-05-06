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
      font-family:Arial;
      background-color: #E0F2FF;
      color:rgb(0, 0, 0);
      margin: 0;
      padding: 0;
      text-align: center;
    }
    h1, h2 {
      text-align: center;
    }
    .section {
      width: 80%;
      margin: 20px auto;
      background-color: #A8D0F0;
      border: 2px solid rgb(0, 0, 0);
      border-radius: 12px;
      padding: 20px;
    }
    label {
      display: inline-block;
      font-size: 14px;
      margin-left: 5px;
    }
    input[type="text"], input[type="email"] {
      width: 100%;
      padding: 6px;
      font-size: 14px;
      border-radius: 6px;
      border: 1px solid rgb(0, 0, 0);
    }
    .perfil {
      display: flex;
      gap: 20px;
    }
    .perfil img {
      display: none;
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
      border: 2px solid rgb(0, 0, 0);
      border-radius: 5px;
      padding: 15px;
      width: 300px;
      text-align: left;
    }
    .card h2 {
      color:rgb(0, 0, 0);
      text-align: center;
      margin-bottom: 10px;
    }
    .item {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 10px;
    }
    .item input[type="checkbox"] {
      margin-right: 5px;
    }
    .quantidade {
      width: 50px;
      margin-left: 10px;
      border: 1px solid rgb(0, 0, 0);
      border-radius: 2px;
      padding: 4px;
    }
    input[type="submit"] {
      background-color: #2B5288;
      color: white;
      border: none;
      border-radius: 3px;
      padding: 10px 20px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 20px;
    }
    .nota {
      width: 80%;
      margin: 30px auto;
      background-color: #A8D0F0;
      border: 2px solid rgb(0, 0, 0);
      border-radius: 6px;
      padding: 20px;
      text-align: left;
    }
    .linha-item {
      display: flex;
      justify-content: space-between;
      background-color: #D0E9FF;
      padding: 8px 12px;
      border-radius: 3px;
      margin-bottom: 8px;
    }
    .usuario-info {
      margin-top: 20px;
      display: flex;
      align-items: center;
      gap: 15px;
      background-color: #D0E9FF;
      border: 1px solid rgb(0, 0, 0);
      border-radius: 5px;
      padding: 10px;
    }
    .usuario-info img {
      width: 60px;
      height: 60px;
      border-radius: 5px;
      border: 2px solid rgb(0, 0, 0);
    }
  </style>

</head>
<body>

<h1>FRULLÍ FRULLÁ - CAFÉ</h1>

<div class="section">
  <h2>Cadastro</h2>
  <form method="post" enctype="multipart/form-data">
    <div class="perfil">
      <div style="flex: 1">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Digite seu nome" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Digite seu email" required>

        <label for="foto" style="margin-top: 10px; display: block;">Foto de perfil:</label>
        <input type="file" id="foto" name="foto" accept="image/*">
      </div>
    </div>
</div>

<form method="post" enctype="multipart/form-data">
  <input type="hidden" name="nome" value="" id="nomeHidden">
  <input type="hidden" name="email" value="" id="emailHidden">
  <div class="container">
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
    foreach ($menu as $categoria => $itens): ?>
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
  <input type="submit" value="Finalizar Pedido" onclick="preencherDados()">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nome'])) {
  echo "<div class='nota'><h2>Nota Fiscal</h2>";
  $total = 0;
  foreach ($menu as $categoria => $itens) {
    foreach ($itens as $item => $preco) {
      if (isset($_POST['pedido'][$item]) && isset($_POST['quantidade'][$item])) {
        $qtd = intval($_POST['quantidade'][$item]);
        if ($qtd > 0) {
          $subtotal = $qtd * $preco;
          $total += $subtotal;
          echo "<div class='linha-item'><span>$qtd x $item</span><span>R$ " . number_format($subtotal, 2, ',', '.') . "</span></div>";
        }
      }
    }
  }
  echo "<div class='linha-item' style='font-weight:bold;'><span>Total:</span><span>R$ " . number_format($total, 2, ',', '.') . "</span></div>";

  $fotoPerfil = isset($_FILES['foto']) && $_FILES['foto']['tmp_name'] ? $_FILES['foto']['tmp_name'] : '';
  $fotoBase64 = $fotoPerfil ? base64_encode(file_get_contents($fotoPerfil)) : '';
  echo "<div class='usuario-info'>";
  if ($fotoBase64) echo "<img src='data:image/jpeg;base64,$fotoBase64' alt='Foto de Perfil'>";
  echo "<div><strong>Cliente:</strong><br>" . htmlspecialchars($_POST['nome']) . "<br>" . htmlspecialchars($_POST['email']) . "</div></div>";
  echo "</div>";
}
?>

<script>
function preencherDados() {
  document.getElementById('nomeHidden').value = document.getElementById('nome').value;
  document.getElementById('emailHidden').value = document.getElementById('email').value;
}
</script>

</body>
</html>