<?php
include '../includes/conexao.php';

// Buscar perguntas aleatórias
$sql = "SELECT * FROM perguntas ORDER BY RAND() LIMIT 5";
$stmt = $pdo->query($sql);
$perguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Inicializar sessão do quiz
$_SESSION['quiz_perguntas'] = $perguntas;
$_SESSION['quiz_respostas'] = [];
$_SESSION['quiz_pontuacao'] = 0;
$_SESSION['quiz_pergunta_atual'] = 0;
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
                        <!-- Cabeçalho -->
                        <div class="text-center mb-5">
                            <h1 class="display-5 fw-bold text-primary mb-3">
                                <i class="bi bi-patch-question"></i> Quiz Trânsito
                            </h1>
                            <p class="text-muted">Teste seus conhecimentos sobre educação no trânsito</p>
                        </div>

                        <!-- Informações -->
                        <div class="alert alert-info mb-4">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-info-circle fs-4 me-3"></i>
                                <div>
                                    <h5 class="alert-heading mb-2">Como funciona?</h5>
                                    <p class="mb-0">Responda 5 perguntas sobre trânsito e veja seu resultado no final.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Estatísticas -->
                        <div class="row text-center mb-4">
                            <div class="col-md-4">
                                <div class="border rounded p-3">
                                    <h3 class="text-primary fw-bold">5</h3>
                                    <p class="text-muted mb-0">Perguntas</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="border rounded p-3">
                                    <h3 class="text-success fw-bold"><?php echo count($perguntas); ?></h3>
                                    <p class="text-muted mb-0">Categorias</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="border rounded p-3">
                                    <h3 class="text-warning fw-bold">70%</h3>
                                    <p class="text-muted mb-0">Nota mínima</p>
                                </div>
                            </div>
                        </div>

                        <!-- Botão Iniciar -->
                        <div class="text-center mt-5">
                            <a href="quiz_pergunta.php" class="btn btn-quiz btn-lg">
                                <i class="bi bi-play-circle me-2"></i>Iniciar Quiz
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