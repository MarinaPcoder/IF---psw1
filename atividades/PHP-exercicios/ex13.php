<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 13</title>
</head>
<body>

<style>
body {
    background-color: #E0F2FF;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.mensagens {
    position: absolute;
    top: 50px;
    left: 30px;
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.placa {
    background-color: #A8D0F0;
    color: #003B73;
    border: 2px solid rgb(0, 0, 0);
    border-radius: 5px;
    padding: 12px 20px;
    font-weight: bold;
    max-width: 250px;
    text-align: center;
    word-wrap: break-word;
    overflow-wrap: break-word;
    overflow: hidden;
}

.placa.destaque {
    background-color: #d0e9ff;
    color:rgb(0, 0, 0);
}
</style>

<div class="mensagens">

<!-- de forma simples -->
    <div class="placa">
        <?php echo "Olá, mundo!"; ?>
    </div>

<!-- usando variável -->
    <div class="placa">
        <?php
            $texto = "Seja bem-vindo!";
            echo $texto;
        ?>
    </div>

<!-- com css -->
    <div class="placa destaque">
        <?php
            $mensagem = "LALALLALALALALALLALALLALALA";
            echo $mensagem;
        ?>
    </div>
</div>

</body>
</html>


