<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabuada de um número informado</title>
</head>
<body>
      <form method="POST" action="">
        <label for="numero">Faz a tabuada de um número informado:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit" name="verificar_tabuada">Verificar</button>
   </form>

    <?php
   
   if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['verificar_tabuada'])){
        $numero = $_POST['numero'];

            $vezes_um = $numero;
            $vezes_dois = $numero * 2;
            $vezes_tres = $numero * 3;
            $vezes_quatro = $numero * 4;
            $vezes_cinco = $numero * 5;
            $vezes_seis = $numero * 6;
            $vezes_sete = $numero * 7;
            $vezes_oito = $numero * 8;
            $vezes_nove = $numero * 9;
            $vezes_dez = $numero * 10;

        $tabuada = array($vezes_um, $vezes_dois, $vezes_tres, $vezes_quatro, $vezes_cinco, $vezes_seis, $vezes_sete, $vezes_oito, $vezes_nove, $vezes_dez );
        
        echo "A tabuada deste número é: ";
        echo"<br>";

    for ($i = 0; $i <= 9; $i++) {
        echo"<br>";
        echo $tabuada[$i];
    };

   };
};

   ?>

</body>
</html>