<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Carro - Exercício </title>
</head>
<body>
      <style>
    body {
      margin: 0;
      font-family:sans-serif;
      background-color: #ffeaea;
      color: #333;
    }

    header img {
      width: 20%;
      max-width: 800px;
      display: block;
      margin: 0 auto;
    }

    .container {
      text-align: center;
      padding: 30px;
      background-color: #ffcccc;
    }

    .card {
      background-color: #fff;
      border: 3px solid #c70000;
      border-radius: 20px;
      padding: 25px;
      width: 300px;
      margin: 20px auto;
    }

    .info {
      font-size: 18px;
      margin-bottom: 15px;
    }

    .buttons {
      display: flex;
      justify-content: space-around;
      gap: 10px;
    }

    .buttons form {
      display: inline;
    }

    .btn {
      background-color: #c70000;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 10px;
      cursor: pointer;
      font-weight: bold;
    }

    .btn:hover {
      background-color: #ff0000;
    }

    .velocidade {
      font-size: 22px;
      color: #ff8c00;
      font-weight: bold;
    }
  </style>
</head>
<body>

  <header>
    <img src="./images/lightning-mcqueen.gif" alt="relampago marquinhos">
  </header>

  <div class="container">

    <?php
      class Carro {
        public $marca;
        public $modelo;
        public $velocidade;

        function __construct($marca, $modelo) {
          $this->marca = $marca;
          $this->modelo = $modelo;
          $this->velocidade = 0; // começa parado
        }

        function acelerar() {
          $this->velocidade += 10;
        }

        function frear() {
          $this->velocidade -= 10;
          if ($this->velocidade < 0) {
            $this->velocidade = 0;
          }
        }

        function mostrarVelocidade() {
          echo "<p class='velocidade'>Velocidade atual: {$this->velocidade} km/h</p>";
        }
      }

      // criando um carro
      session_start();
        $_SESSION['carro'] = new Carro("McLaren", "720s"); // recria sempre com os valores certos

      $carro = $_SESSION['carro'];

      // Verifica ações do usuário
      if (isset($_POST['acao'])) {
        if ($_POST['acao'] == 'acelerar') {
          $carro->acelerar();
        } elseif ($_POST['acao'] == 'frear') {
          $carro->frear();
        }
      }

      echo "<div class='card'>";
      echo "<p class='info'><strong>Marca:</strong> {$carro->marca}</p>";
      echo "<p class='info'><strong>Modelo:</strong> {$carro->modelo}</p>";
      $carro->mostrarVelocidade();

      echo "<div class='buttons'>
              <form method='post'>
                <input type='hidden' name='acao' value='acelerar'>
                <button class='btn'>Acelerar</button>
              </form>
              <form method='post'>
                <input type='hidden' name='acao' value='frear'>
                <button class='btn'>Frear</button>
              </form>
            </div>";
      echo "</div>";
    ?>
  </div>
</body>
</html>