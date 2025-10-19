<?php
include '../includes/conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resposta_usuario = $_POST['resposta'];
    $id_pergunta = $_POST['id_pergunta'];
    
    // Encontrar a pergunta atual
    $pergunta_atual = $_SESSION['quiz_pergunta_atual'];
    $perguntas = $_SESSION['quiz_perguntas'];
    $pergunta = $perguntas[$pergunta_atual];
    
    // Verificar se a resposta está correta
    $acertou = ($resposta_usuario === $pergunta['resposta_correta']);
    
    // Salvar resposta
    $_SESSION['quiz_respostas'][] = [
        'pergunta' => $pergunta['pergunta'],
        'resposta_usuario' => $resposta_usuario,
        'resposta_correta' => $pergunta['resposta_correta'],
        'acertou' => $acertou,
        'explicacao' => $pergunta['explicacao']
    ];
    
    // Atualizar pontuação
    if ($acertou) {
        $_SESSION['quiz_pontuacao']++;
    }
    
    // Avançar para próxima pergunta
    $_SESSION['quiz_pergunta_atual']++;
    
    header('Location: quiz_pergunta.php');
    exit();
} else {
    header('Location: quiz.php');
    exit();
}
?>