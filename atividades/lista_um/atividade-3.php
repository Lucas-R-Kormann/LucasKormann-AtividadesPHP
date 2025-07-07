<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar se o número é positivo, negativo ou é zero</title>
</head>
<body>
    <form method="POST" action="">
        <label for="numero">Verifica se é um número positivo, negativo ou zero:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit" name="verificar_numero">Verificar</button>
   </form>

    <?php
   
   if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['verificar_numero'])){
        $numero = $_POST["numero"];

        if($numero == 0){
            echo "O número é zero";
        }else if($numero > 0){
            echo "O número é positivo";
            } else if($numero < 0){
                echo"O número é negativo";
            }
        }
    };

   ?>

</body>
</html>