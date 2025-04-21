<!DOCTYPE html>
<html lang="pt-br">
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
      margin: 0;
      padding: 40px;
    }

    .principal {
      display: flex;
      align-items: flex-start;
      gap: 40px;
    }

    .formulario {
      background-color: #A8D0F0;
      padding: 20px;
      border-radius: 10px;
      border: 2px solid #2B5288;
      width: 300px;
    }

    h1 {
      color: #2B5288;
      font-size: 24px;
      margin-top: 0;
    }

    label {
      display: block;
      margin-bottom: 10px;
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
    }

    .resultado {
      background-color: #A8D0F0;
      border: 2px solid #2B5288;
      padding: 20px;
      border-radius: 10px;
      min-width: 300px;
    }

    .resultado h2 {
      color: #2B5288;
      margin-top: 0;
    }

    .reset {
      margin-top: 20px;
      background-color: #003B73;
    }
  </style>
</head>
<body>

    <div class="principal">

        <div class="formulario">
            <form method="post">
            <label for="idade">Digite uma idade (menor que 1 para parar):</label>
            <input type="number" name="idade" id="idade" required min="0">

            <?php
                $idades = isset($_POST["idades"]) ? $_POST["idades"] : [];
                $nova_idade = isset($_POST["idade"]) ? intval($_POST["idade"]) : null;

                
                if ($nova_idade !== null && $nova_idade >= 1) {
                    $idades[] = $nova_idade;
                }


                foreach ($idades as $valor) {
                    echo "<input type='hidden' name='idades[]' value='$valor'>";
                }
            ?>

            <input type="submit" name="registrar" value="Registrar"><br><br>
            </form>

            <form method="post">
            <input type="submit" name="resetar" value="Resetar" class="reset">
            </form>
        </div>

        <?php
            $mostrar_resultado = ($nova_idade !== null && $nova_idade < 1);

            if ($mostrar_resultado && count($idades) > 0):
            $menores = 0;
            $idosos = 0;

            foreach ($idades as $idade) {
                if ($idade < 18) $menores++;
                if ($idade > 65) $idosos++;
            }
        ?>

        <div class="resultado">
                <h2>Resultados:</h2>
                <p><strong>Menores de 18:</strong> <?= $menores ?></p>
                <p><strong>Maiores de 65:</strong> <?= $idosos ?></p>
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