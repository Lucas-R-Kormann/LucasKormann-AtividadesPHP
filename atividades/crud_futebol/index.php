<?php
include("conexao.php");

$filtro_cidade = isset($_GET['cidade']) ? $_GET['cidade'] : '';

$filtro_posicao = isset($_GET['posicao']) ? $_GET['posicao'] : '';

$filtro_time_partida = isset($_GET['time_partida']) ? $_GET['time_partida'] : '';
?>

<?php
$sql = "SELECT * FROM times"; 
$resultado = mysqli_query($conn, $sql);
?>

 
<h1>Lista de Times</h1>
<form method="get">
    <label for="cidade">Filtrar por cidade:</label>
    <input type="text" name="cidade" id="cidade" value="<?= htmlspecialchars($filtro_cidade) ?>">
    <button type="submit">Filtrar</button>
    <a href="?">Limpar filtro</a>
</form>


<?php
$sql_times = "SELECT * FROM times";
if (!empty($filtro_cidade)) {
    $sql_times .= " WHERE cidade LIKE '%" . mysqli_real_escape_string($conn, $filtro_cidade) . "%'";
}

$resultado = mysqli_query($conn, $sql_times);

while ($linha = mysqli_fetch_array($resultado)) {
    echo "ID: " . $linha['id'] . "<br>";
    echo "Nome: " . $linha['nome'] . "<br>";
    echo "Cidade: " . $linha['cidade'] . "<br>";
    echo "<a href='editar_time.php?id=" . $linha['id'] . "'>Editar time</a> | ";
    echo "<a href='excluir_time.php?id=" . $linha['id'] . "'>Excluir</a>";
    echo "<br><br>";
}
?>

<a href='cadastrar_time.php'>Cadastrar novo</a>

<?php

$sql = "SELECT * FROM jogadores"; 
$resultado = mysqli_query($conn, $sql);

?>

<h1>Lista de Jogadores</h1>
<form method="get">
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
    <a href="?" style="margin-left: 10px;">Limpar filtro</a>
</form>

<?php
$sql_jogadores = "SELECT j.*, t.nome as time_nome 
                  FROM jogadores j 
                  LEFT JOIN times t ON j.time_id = t.id";
if (!empty($filtro_posicao)) {
    $sql_jogadores .= " WHERE posicao = '" . mysqli_real_escape_string($conn, $filtro_posicao) . "'";
}

$resultado = mysqli_query($conn, $sql_jogadores);

while ($linha = mysqli_fetch_array($resultado)) {
    echo "ID: " . $linha['id'] . "<br>";
    echo "Nome: " . $linha['nome'] . "<br>";
    echo "Posição: " . $linha['posicao'] . "<br>";
    echo "Número da camisa: " . $linha['numero_camisa'] . "<br>"; 
    echo "Time: ";
        if (!empty($linha['time_nome'])) {
            echo $linha['time_nome'];
        } else {
            echo "<span style='color: #999; font-style: italic;'>Sem time</span>";
        }
    echo "<br>";
    echo "<a href='editar_jogador.php?id=" . $linha['id'] . "'>Editar informações</a> | ";
    echo "<a href='excluir_jogador.php?id=" . $linha['id'] . "'>Excluir</a>";
    echo "<br><br>";
}
?>


<a href='cadastrar_jogador.php'>Cadastrar novo</a>


<?php
$sql = "SELECT * FROM partidas"; 
$resultado = mysqli_query($conn, $sql);
?>

<h1>Lista de Partidas</h1>
<form method="get">
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
    <a href="?">Limpar filtro</a>
</form>

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
    echo "ID: " . $linha['id'] . "<br>";
    echo "Partida: " . $linha['time_casa_nome'] . " vs " . $linha['time_fora_nome'] . "<br>";
    echo "Data: " . date('d/m/Y', strtotime($linha['data_jogo'])) . "<br>";
    echo "Placar: " . $linha['gols_casa'] . " x " . $linha['gols_fora'] . "<br>";
    echo "<a href='editar_partida.php?id=" . $linha['id'] . "'>Editar informações</a> | ";
    echo "<a href='excluir_partida.php?id=" . $linha['id'] . "'>Excluir</a>";
    echo "<br><br>";
}
?>

<a href='cadastrar_partida.php'>Cadastrar novo</a>