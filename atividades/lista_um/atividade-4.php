<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcular fatorial de um número</title>
</head>
<body>
    <form method="POST" action="">
        <label for="numero">Verifica o fatorial de um número:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit" name="verificar_fatorial">Verificar</button>
   </form>
   
   <?php
   
   if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['verificar_fatorial'])){
        $numero = $_POST['numero'];
        $fatorial = 1;
        $count = 1;

        while($count<= $numero){
            $fatorial *= $count;
            $count++;
        }
        echo "O fatorial é $fatorial";
   };
};

   ?>
</body>
</html>