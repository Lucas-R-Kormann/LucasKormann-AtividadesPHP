<?php
include '../includes/conexao.php';

// Verificar se há perguntas na sessão
if (!isset($_SESSION['quiz_perguntas']) || empty($_SESSION['quiz_perguntas'])) {
    header('Location: quiz.php');
    exit();
}

$pergunta_atual = $_SESSION['quiz_pergunta_atual'];
$perguntas = $_SESSION['quiz_perguntas'];

// Verificar se terminou o quiz
if ($pergunta_atual >= count($perguntas)) {
    header('Location: quiz_resultado.php');
    exit();
}

$pergunta = $perguntas[$pergunta_atual];
$numero_pergunta = $pergunta_atual + 1;
$total_perguntas = count($perguntas);
$progresso = ($pergunta_atual / $total_perguntas) * 100;
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
    <div class="quiz-container">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="quiz-card p-5">
                        <!-- Progresso -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted">Pergunta <?php echo $numero_pergunta; ?> de <?php echo $total_perguntas; ?></span>
                                <span class="badge bg-primary"><?php echo ucfirst($pergunta['categoria']); ?></span>
                            </div>
                            <div class="progress progress-bar-custom">
                                <div class="progress-bar" style="width: <?php echo $progresso; ?>%"></div>
                            </div>
                        </div>

                        <!-- Pergunta -->
                        <h3 class="fw-bold text-dark mb-4"><?php echo htmlspecialchars($pergunta['pergunta']); ?></h3>

                        <!-- Opções -->
                        <form action="quiz_processar.php" method="POST">
                            <div class="options-container">
                                <input type="radio" name="resposta" value="A" id="opcaoA" class="option-input d-none" required>
                                <label for="opcaoA" class="option-label d-block">
                                    <strong>A)</strong> <?php echo htmlspecialchars($pergunta['opcao_a']); ?>
                                </label>

                                <input type="radio" name="resposta" value="B" id="opcaoB" class="option-input d-none" required>
                                <label for="opcaoB" class="option-label d-block">
                                    <strong>B)</strong> <?php echo htmlspecialchars($pergunta['opcao_b']); ?>
                                </label>

                                <input type="radio" name="resposta" value="C" id="opcaoC" class="option-input d-none" required>
                                <label for="opcaoC" class="option-label d-block">
                                    <strong>C)</strong> <?php echo htmlspecialchars($pergunta['opcao_c']); ?>
                                </label>

                                <input type="radio" name="resposta" value="D" id="opcaoD" class="option-input d-none" required>
                                <label for="opcaoD" class="option-label d-block">
                                    <strong>D)</strong> <?php echo htmlspecialchars($pergunta['opcao_d']); ?>
                                </label>
                            </div>

                            <input type="hidden" name="id_pergunta" value="<?php echo $pergunta['id']; ?>">

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-quiz btn-lg">
                                    <?php echo ($numero_pergunta == $total_perguntas) ? 'Finalizar Quiz' : 'Próxima Pergunta'; ?>
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>