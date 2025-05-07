
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   

   <?php
        require './Usuario.php';
        $usuario = new Usuario();
        $msg = $usuario->cadastrar();
        echo $msg
    ?>
<?php

class Usuario
{
    public $nome;
    public $email; 

    public function cadastrar ($nome, $email)
    {
        //$this: indica que estou utilizando o atributo acima (don public)
        $this->nome = $nome;
        $this-> email = $email;
        //Nesse momento podemos cadastrar no BD

        return 'O usuário <strong>'. $this->nome. '</strong> com e-mail <strong>'.$this->email.'</strong> cadastrado com sucesso!<br>';
    }
}

    $usuario = new Usuario();
    $msg = $usuario->cadastrar("enzo", "enzo@gmail.com");
    echo $msg;
?>

</body>
</html>