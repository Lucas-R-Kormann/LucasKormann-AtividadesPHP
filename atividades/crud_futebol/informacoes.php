<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de informações de futebol</title>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php

    session_start();

include("conexao.php");

$filtro_cidade = isset($_GET['cidade']) ? $_GET['cidade'] : '';

$filtro_posicao = isset($_GET['posicao']) ? $_GET['posicao'] : '';

$filtro_time_partida = isset($_GET['time_partida']) ? $_GET['time_partida'] : '';

 if (isset($_GET['logout'])) {
            session_destroy();
            header("Location: index.php");
            exit;
        }

        $msg = "";
?>

<?php
$sql = "SELECT * FROM times"; 
$resultado = mysqli_query($conn, $sql);
?>

<div class="titulo">
<h1 class="h1">Lista de Times</h1>
</div>

<div class="container-fluid">
<form class="filtro" method="get">
    <label for="cidade">Filtrar por cidade:</label>
    <input type="text" name="cidade" id="cidade" value="<?= htmlspecialchars($filtro_cidade) ?>">
    <button type="submit">Filtrar</button>
    <a class="btn btn-primary" href="?">Limpar filtro</a>
</form>
</div>

<div class="container-fluid">
<?php
$sql_times = "SELECT * FROM times";
if (!empty($filtro_cidade)) {
    $sql_times .= " WHERE cidade LIKE '%" . mysqli_real_escape_string($conn, $filtro_cidade) . "%'";
}

$resultado = mysqli_query($conn, $sql_times);
?>

<div class="lista">

<?php
while ($linha = mysqli_fetch_array($resultado)) {
    echo "<ul class= 'list-group'";
    echo "<li class= 'list-group-item'> ID: " . $linha['id'] . "</li>";
    echo "<li class='list-group-item'> Nome: " . $linha['nome'] . "</li> ";
    echo "<li class='list-group-item'> Cidade: " . $linha['cidade'] . "</li>";
    echo "<a class = 'btn btn-primary' href='editar_time.php?id=" . $linha['id'] . "'>Editar time</a>";
    echo "<a class = 'btn btn-primary' href='excluir_time.php?id=" . $linha['id'] . "'>Excluir</a>";
    echo "</ul>";
}
?>

<a class="btn btn-secondary" href='cadastrar_time.php'>Cadastrar novo</a>

</div>

</div>

<?php
include("conexao.php");

$filtro_posicao = isset($_GET['posicao']) ? $_GET['posicao'] : '';
?>

<div class="titulo">
    <h1 class="h1">Lista de Jogadores</h1>
</div>

<div class="container-fluid">
    <form class="filtro" method="get">
        <label for="posicao">Filtrar por posição:</label>
        <select name="posicao" id="posicao">
            <option value="">Todas</option>
            <option value="Goleiro" <?= $filtro_posicao == 'Goleiro' ? 'selected' : '' ?>>Goleiro</option>
            <option value="Zagueiro" <?= $filtro_posicao == 'Zagueiro' ? 'selected' : '' ?>>Zagueiro</option>
            <option value="Lateral" <?= $filtro_posicao == 'Lateral' ? 'selected' : '' ?>>Lateral</option>
            <option value="Meio-campista" <?= $filtro_posicao == 'Meio-campista' ? 'selected' : '' ?>>Meio-campista</option>
            <option value="Atacante" <?= $filtro_posicao == 'Atacante' ? 'selected' : '' ?>>Atacante</option>
        </select>
        <button type="submit">Filtrar</button>
        <a class="btn btn-primary" href="?">Limpar filtro</a>
    </form>
</div>

<div class="container-fluid">
    <div class="lista">
        <?php
        $sql_jogadores = "SELECT j.*, t.nome as time_nome 
                          FROM jogadores j 
                          LEFT JOIN times t ON j.time_id = t.id";
        if (!empty($filtro_posicao)) {
            $sql_jogadores .= " WHERE j.posicao = '" . mysqli_real_escape_string($conn, $filtro_posicao) . "'";
        }

        $resultado = mysqli_query($conn, $sql_jogadores);

        while ($linha = mysqli_fetch_array($resultado)) {
            echo "<ul class='list-group mb-3'>";
            echo "<li class='list-group-item'> ID: " . $linha['id'] . "</li>";
            echo "<li class='list-group-item'> Nome: " . $linha['nome'] . "</li>";
            echo "<li class='list-group-item'> Posição: " . $linha['posicao'] . "</li>";
            echo "<li class='list-group-item'> Número da camisa: " . $linha['numero_camisa'] . "</li>";
            echo "<li class='list-group-item'> Time: ";
            if (!empty($linha['time_nome'])) {
                echo $linha['time_nome'];
            } else {
                echo "<span style='color: #999; font-style: italic;'>Sem time</span>";
            }
            echo "</li>";
            echo "<a class='btn btn-primary ' href='editar_jogador.php?id=" . $linha['id'] . "'>Editar informações</a>";
            echo "<a class='btn btn-primary' href='excluir_jogador.php?id=" . $linha['id'] . "' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>";
            echo "</ul>";
        }
        ?>

        <a class="btn btn-secondary" href='cadastrar_jogador.php'>Cadastrar novo</a>
    </div>
</div>

</div>

<?php
$sql = "SELECT * FROM partidas"; 
$resultado = mysqli_query($conn, $sql);
?>

<div class="titulo">
    <h1 class="h1">Lista de Partidas</h1>
</div>

<div class="container-fluid">
    <form class="filtro" method="get">
        <label for="time_partida">Filtrar por time participante:</label>
        <select name="time_partida" id="time_partida">
            <option value="">Todos</option>
            <?php
            $times = mysqli_query($conn, "SELECT id, nome FROM times ORDER BY nome");
            while ($time = mysqli_fetch_array($times)) {
                $selected = ($time['id'] == $filtro_time_partida) ? 'selected' : '';
                echo "<option value='" . $time['id'] . "' $selected>" . $time['nome'] . "</option>";
            }
            ?>
        </select>
        <button type="submit">Filtrar</button>
        <a class="btn btn-primary" href="?">Limpar filtro</a>
    </form>
</div>

<div class="container-fluid">
    <div class="lista">
        <?php
        $sql_partidas = "SELECT p.*, tc.nome as time_casa_nome, tf.nome as time_fora_nome 
                         FROM partidas p
                         JOIN times tc ON p.time_casa_id = tc.id
                         JOIN times tf ON p.time_fora_id = tf.id";
                         
        if (!empty($filtro_time_partida)) {
            $sql_partidas .= " WHERE p.time_casa_id = " . (int)$filtro_time_partida . 
                             " OR p.time_fora_id = " . (int)$filtro_time_partida;
        }

        $resultado = mysqli_query($conn, $sql_partidas);

        while ($linha = mysqli_fetch_array($resultado)) {
            echo "<ul class='list-group mb-3'>";
            echo "<li class='list-group-item'> ID: " . $linha['id'] . "</li>";
            echo "<li class='list-group-item'> Partida: " . $linha['time_casa_nome'] . " vs " . $linha['time_fora_nome'] . "</li>";
            echo "<li class='list-group-item'> Data: " . date('d/m/Y', strtotime($linha['data_jogo'])) . "</li>";
            echo "<li class='list-group-item'> Placar: " . $linha['gols_casa'] . " x " . $linha['gols_fora'] . "</li>";
            echo "<a class='btn btn-primary' href='editar_partida.php?id=" . $linha['id'] . "'>Editar informações</a>";
            echo "<a class='btn btn-primary' href='excluir_partida.php?id=" . $linha['id'] . "' onclick='return confirm(\"Tem certeza que deseja excluir?\")'>Excluir</a>";
            echo "</ul>";
        }
        ?>

        <a class="btn btn-secondary" href='cadastrar_partida.php'>Cadastrar nova partida</a>
        
    </div>
</div>

<p><a href="?logout=1">Sair</a></p>

</body>
</html>
