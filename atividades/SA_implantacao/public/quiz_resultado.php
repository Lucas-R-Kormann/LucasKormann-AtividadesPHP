<?php
include '../includes/conexao.php';

if (!isset($_SESSION['quiz_pontuacao'])) {
    header('Location: quiz.php');
    exit();
}

$pontuacao = $_SESSION['quiz_pontuacao'];
$total_perguntas = count($_SESSION['quiz_perguntas']);
$respostas = $_SESSION['quiz_respostas'];
$percentual = ($pontuacao / $total_perguntas) * 100;

// Determinar resultado
if ($percentual >= 80) {
    $resultado = "Excelente!";
    $classe = "success";
    $icone = "bi-emoji-laughing";
    $mensagem = "Você demonstrou ótimo conhecimento sobre trânsito!";
} elseif ($percentual >= 60) {
    $resultado = "Bom!";
    $classe = "primary";
    $icone = "bi-emoji-smile";
    $mensagem = "Você sabe bastante, mas pode melhorar alguns pontos.";
} elseif ($percentual >= 40) {
    $resultado = "Regular";
    $classe = "warning";
    $icone = "bi-emoji-neutral";
    $mensagem = "Está no caminho certo, continue estudando!";
} else {
    $resultado = "Precisa Melhorar";
    $classe = "danger";
    $icone = "bi-emoji-frown";
    $mensagem = "Revise as regras de trânsito para sua segurança.";
}

// Limpar sessão do quiz
$quiz_data = $_SESSION;
unset($_SESSION['quiz_perguntas']);
unset($_SESSION['quiz_respostas']);
unset($_SESSION['quiz_pontuacao']);
unset($_SESSION['quiz_pergunta_atual']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educação no Trânsito</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container">
            <a class="navbar-brand navbar-brand-custom" href="#">
                <i class="bi bi-sign-intersection me-2"></i>
                Trânsito Consciente
            </a>
            
            <!-- Botão Mobile -->
            <button class="navbar-toggler navbar-toggler-custom" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Conteúdo da Navbar -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav navbar-nav-custom">
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom active" href="index.php">
                            <i class="bi bi-house me-1"></i>Início
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom" href="#sobre-nos">
                            <i class="bi bi-info-circle me-1"></i>Sobre
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-custom" href="educacao.php" role="button">
                            <i class="bi bi-book me-1"></i>Educação
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link nav-link-custom" href="quiz.php" role="button">
                            <i class="bi bi-book me-1"></i>Quiz
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <body>
    <div class="result-container">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="result-card p-5">
                        <!-- Resultado Principal -->
                        <div class="text-center mb-5">
                            <i class="bi <?php echo $icone; ?> fs-1 text-<?php echo $classe; ?> mb-3"></i>
                            <h1 class="display-5 fw-bold text-<?php echo $classe; ?>"><?php echo $resultado; ?></h1>
                            <p class="lead text-muted"><?php echo $mensagem; ?></p>
                        </div>

                        <!-- Pontuação -->
                        <div class="text-center mb-5">
                            <div class="score-circle border-<?php echo $classe; ?> mb-3">
                                <span class="h2 fw-bold text-<?php echo $classe; ?>"><?php echo $pontuacao; ?>/<?php echo $total_perguntas; ?></span>
                                <span class="text-muted"><?php echo round($percentual); ?>%</span>
                            </div>
                        </div>

                        <!-- Detalhes das Respostas -->
                        <div class="mb-5">
                            <h3 class="fw-bold text-dark mb-4">Detalhes das suas respostas:</h3>
                            <?php foreach ($respostas as $index => $resposta): ?>
                                <div class="card mb-3 <?php echo $resposta['acertou'] ? 'resposta-correta' : 'resposta-errada'; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title">Pergunta <?php echo $index + 1; ?></h5>
                                        <p class="card-text"><strong><?php echo htmlspecialchars($resposta['pergunta']); ?></strong></p>
                                        <p class="card-text">
                                            <span class="badge bg-<?php echo $resposta['acertou'] ? 'success' : 'danger'; ?>">
                                                Sua resposta: <?php echo $resposta['resposta_usuario']; ?>
                                            </span>
                                            <?php if (!$resposta['acertou']): ?>
                                                <span class="badge bg-success ms-2">
                                                    Resposta correta: <?php echo $resposta['resposta_correta']; ?>
                                                </span>
                                            <?php endif; ?>
                                        </p>
                                        <?php if (!empty($resposta['explicacao'])): ?>
                                            <div class="alert alert-info mt-2">
                                                <i class="bi bi-lightbulb me-2"></i>
                                                <?php echo htmlspecialchars($resposta['explicacao']); ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Botões de Ação -->
                        <div class="text-center">
                            <a href="quiz.php" class="btn btn-primary btn-lg me-3">
                                <i class="bi bi-arrow-repeat me-2"></i>Fazer Novamente
                            </a>
                            <a href="index.php" class="btn btn-outline-primary btn-lg">
                                <i class="bi bi-house me-2"></i>Voltar ao Início
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>