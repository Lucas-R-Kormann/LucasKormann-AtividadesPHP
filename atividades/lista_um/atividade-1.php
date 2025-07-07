<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar se o número é par ou ímpar</title>
</head>
<body>
    <form method="POST" action="">
        <label for = "numero"> Verifica se o número é par ou ímpar:</label>
        <input type="number" id="numero" name="numero" required>
        <button type="submit" name="verificar_numero">Verificar</button>
    </form>

     <?php
   
   if($_SERVER['REQUEST_METHOD'] == 'POST'){

    if(isset($_POST['verificar_numero'])){
        $numero = $_POST['numero'];
        $par = true;
        if($numero % 2 == 0){
            $par = true;
            } else {
            $par = false;
            }
        }
        echo "O número $numero é ". ($par ? 'par':'ímpar');
    };
   ?>

</body>
</html>