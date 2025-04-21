<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício 14</title>
</head>
<body>

<style>
    .resultado {
    background-color: #A8D0F0;
    color: #003B73;
    border: 2px solid rgb(0, 0, 0);
    border-radius: 5px;
    padding: 15px 25px;
    font-weight: bold;
    font-size: 18px;
    max-width: fit-content;
    margin: 30px auto;
    text-align: center;
}
</style>
<div class="resultado">
    <?php
        function soma($x, $y) {
            return $x + $y;
        }

        $resultado = soma(5, 3);
        echo "A soma é: $resultado";
    ?>
</div>

</body>
</html>