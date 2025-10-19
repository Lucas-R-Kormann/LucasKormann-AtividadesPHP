<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educação no Trânsito</title>
    <link href="../css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
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

    <!-- Hero Section -->
        <section class="banner-hero">
        <div class="banner-image">
            <img src="../assets/bannerTransito2.jpeg" 
                alt="Educação no Trânsito">
            <div class="banner-overlay"></div>
            <div class="banner-content">
                <div class="container">
                    <h1 class="banner-title">Educação no Trânsito</h1>
                    <p class="banner-text">Juntos por um trânsito mais seguro e consciente</p>
                    <p class="banner-text small" style="font-weight: bold;">Um descuido momentâneo gera uma consequência eterna</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Categorias de Educação -->
    <section id="categorias" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-dark mb-3">Para Todos no Trânsito</h2>
                <p class="text-muted">Conteúdo educativo específico para cada tipo de usuário</p>
            </div>
            
            <div class="row g-4">
                <!-- Motoristas -->
                <div class="col-md-4">
                    <div class="card categoria-card h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-car-front fs-1 text-primary mb-3"></i>
                            <h4 class="fw-bold">Motoristas</h4>
                            <p class="text-muted mb-3">Direção segura e responsável</p>
                            <a href="#motoristas" class="btn btn-outline-primary">Ver Dicas</a>
                        </div>
                    </div>
                </div>
                
                <!-- Pedestres -->
                <div class="col-md-4">
                    <div class="card categoria-card h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-person-walking fs-1 text-success mb-3"></i>
                            <h4 class="fw-bold">Pedestres</h4>
                            <p class="text-muted mb-3">Travessia segura e atenção</p>
                            <a href="#pedestres" class="btn btn-outline-success">Ver Dicas</a>
                        </div>
                    </div>
                </div>
                
                <!-- Ciclistas -->
                <div class="col-md-4">
                    <div class="card categoria-card h-100">
                        <div class="card-body text-center p-4">
                            <i class="bi bi-bicycle fs-1 text-warning mb-3"></i>
                            <h4 class="fw-bold">Ciclistas</h4>
                            <p class="text-muted mb-3">Pedalada consciente</p>
                            <a href="#ciclistas" class="btn btn-outline-warning">Ver Dicas</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Motoristas -->
    <section id="motoristas" class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6">
                    <span class="badge bg-primary fs-6 mb-3">Para Motoristas</span>
                    <h2 class="display-6 fw-bold text-dark mb-4">Direção Segura e Responsável</h2>
                    <p class="text-muted">A responsabilidade do motorista vai além de saber dirigir. Conheça as práticas essenciais para garantir a segurança de todos.</p>
                </div>
                <div class="col-lg-6">
                    <img src="../assets/motoristaSeguro.jpg" 
                         alt="Motorista seguro" class="img-fluid rounded-3">
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="dica-item p-4 rounded-3 mb-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="numero-dica me-3">1</div>
                            <h5 class="fw-bold mb-0">Uso do Cinto de Segurança</h5>
                        </div>
                        <p class="mb-0">Todos os ocupantes devem usar o cinto, inclusive no banco traseiro. Reduz em 45% o risco de morte em acidentes.</p>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="dica-item p-4 rounded-3 mb-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="numero-dica me-3">2</div>
                            <h5 class="fw-bold mb-0">Não Use Celular</h5>
                        </div>
                        <p class="mb-0">Digitar mensagens aumenta em 23 vezes o risco de acidente. Use o viva-voz apenas para chamadas essenciais.</p>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="dica-item p-4 rounded-3 mb-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="numero-dica me-3">3</div>
                            <h5 class="fw-bold mb-0">Respeite os Limites</h5>
                        </div>
                        <p class="mb-0">A velocidade deve ser compatível com as condições da via, trânsito e meteorologia. Reduza a velocidade à noite e na chuva.</p>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="dica-item p-4 rounded-3 mb-3">
                        <div class="d-flex align-items-center mb-3">
                            <div class="numero-dica me-3">4</div>
                            <h5 class="fw-bold mb-0">Mantenha Distância</h5>
                        </div>
                        <p class="mb-0">Mantenha pelo menos 2 segundos do veículo à frente. Em pista molhada, aumente para 4 segundos.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção Pedestres -->
    <section id="pedestres" class="py-5">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-6 order-lg-2">
                    <span class="badge bg-success fs-6 mb-3">Para Pedestres</span>
                    <h2 class="display-6 fw-bold text-dark mb-4">Travessia Segura e Atenção</h2>
                    <p class="text-muted">A segurança do pedestre depende da atenção e do respeito às regras de circulação.</p>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <img src="../assets/pedestreSeguro.jpg" 
                         alt="Pedestre seguro" class="img-fluid rounded-3">
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <i class="bi bi-signpost fs-1 text-success mb-3"></i>
                            <h5 class="fw-bold">Use a Faixa</h5>
                            <p class="text-muted">Sempre atravesse na faixa de pedestres. Espere os veículos pararem completamente antes de iniciar a travessia.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <i class="bi bi-eye fs-1 text-success mb-3"></i>
                            <h5 class="fw-bold">Contato Visual</h5>
                            <p class="text-muted">Estabeleça contato visual com os motoristas antes de atravessar. Não assuma que o motorista te viu.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <i class="bi bi-phone fs-1 text-success mb-3"></i>
                            <h5 class="fw-bold">Atenção Total</h5>
                            <p class="text-muted">Não use fones de ouvido ou celular enquanto atravessa. Mantenha a atenção no trânsito.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <i class="bi bi-moon fs-1 text-success mb-3"></i>
                            <h5 class="fw-bold">Visibilidade Noturna</h5>
                            <p class="text-muted">À noite, use roupas claras ou reflexivas. Ande em locais bem iluminados quando possível.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="ciclistas" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <span class="badge bg-warning fs-6 mb-3">Para Ciclistas</span>
                <h2 class="display-6 fw-bold text-dark mb-4">Pedalada Segura e Consciente</h2>
                <p class="text-muted">A bicicleta é um veículo e o ciclista tem direitos e deveres no trânsito. Pedale com segurança e respeito.</p>
            </div>
            <div class="col-lg-6">
                <img src="../assets/ciclista.jpg " 
                     alt="Ciclista seguro" class="img-fluid rounded-3">
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Equipamentos de Segurança -->
            <div class="col-lg-6">
                <div class="dica-item p-4 rounded-3 mb-3">
                    <div class="d-flex align-items-center mb-3">
                        <div class="numero-dica me-3">1</div>
                        <h5 class="fw-bold mb-0">Equipamentos Obrigatórios</h5>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><strong>Capacete:</strong> Proteção essencial</li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><strong>Refletores:</strong> Dianteiro, traseiro e nas rodas</li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><strong>Campainha:</strong> Para sinalizar presença</li>
                        <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i><strong>Retrovisor:</strong> Do lado esquerdo</li>
                    </ul>
                </div>
            </div>
            
            <!-- Comportamento no Trânsito -->
            <div class="col-lg-6">
                <div class="dica-item p-4 rounded-3 mb-3">
                    <div class="d-flex align-items-center mb-3">
                        <div class="numero-dica me-3">2</div>
                        <h5 class="fw-bold mb-0">Comportamento no Trânsito</h5>
                    </div>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Ande no sentido do tráfego</li>
                        <li class="mb-2"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Sinalize com as mãos as conversões</li>
                        <li class="mb-2"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Mantenha distância dos veículos</li>
                        <li class="mb-2"><i class="bi bi-arrow-right-circle text-primary me-2"></i>Use ciclovias quando disponíveis</li>
                    </ul>
                </div>
            </div>
            
            <!-- Visibilidade -->
            <div class="col-lg-6">
                <div class="dica-item p-4 rounded-3 mb-3">
                    <div class="d-flex align-items-center mb-3">
                        <div class="numero-dica me-3">3</div>
                        <h5 class="fw-bold mb-0">Visibilidade e Iluminação</h5>
                    </div>
                    <p class="mb-3">À noite ou em condições de baixa visibilidade:</p>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="bi bi-lightbulb text-warning me-2"></i><strong>Luz branca</strong> na frente</li>
                        <li class="mb-2"><i class="bi bi-lightbulb text-warning me-2"></i><strong>Luz vermelha</strong> atrás</li>
                        <li class="mb-2"><i class="bi bi-lightbulb text-warning me-2"></i><strong>Roupas reflexivas</strong> ou claras</li>
                    </ul>
                </div>
            </div>
            
            <!-- Manutenção -->
            <div class="col-lg-6">
                <div class="dica-item p-4 rounded-3 mb-3">
                    <div class="d-flex align-items-center mb-3">
                        <div class="numero-dica me-3">4</div>
                        <h5 class="fw-bold mb-0">Manutenção Preventiva</h5>
                    </div>
                    <p class="mb-3">Verifique regularmente:</p>
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2"><i class="bi bi-gear text-info me-2"></i>Freios e pneus</li>
                        <li class="mb-2"><i class="bi bi-gear text-info me-2"></i>Corrente e câmbio</li>
                        <li class="mb-2"><i class="bi bi-gear text-info me-2"></i>Sinalização e iluminação</li>
                        <li class="mb-2"><i class="bi bi-gear text-info me-2"></i>Guidão e selim</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Cards Adicionais -->

        <div class="row mt-5">
            <div class="col-12">
                <h4 class="fw-bold mb-4 text-center">Direitos e Deveres do Ciclista</h4>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-shield-check fs-1 text-success mb-3"></i>
                        <h5 class="fw-bold">Direitos</h5>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Usar as vias públicas</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Preferência nas conversões</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Ciclovias e ciclofaixas</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Respeito dos motoristas</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-clipboard-check fs-1 text-primary mb-3"></i>
                        <h5 class="fw-bold">Deveres</h5>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="bi bi-arrow-right text-primary me-2"></i>Respeitar a sinalização</li>
                            <li class="mb-2"><i class="bi bi-arrow-right text-primary me-2"></i>Andar na mão correta</li>
                            <li class="mb-2"><i class="bi bi-arrow-right text-primary me-2"></i>Usar equipamentos</li>
                            <li class="mb-2"><i class="bi bi-arrow-right text-primary me-2"></i>Respeitar pedestres</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-exclamation-triangle fs-1 text-warning mb-3"></i>
                        <h5 class="fw-bold">Proibições</h5>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="bi bi-x-circle text-danger me-2"></i>Andar na calçada</li>
                            <li class="mb-2"><i class="bi bi-x-circle text-danger me-2"></i>Transportar passageiros</li>
                            <li class="mb-2"><i class="bi bi-x-circle text-danger me-2"></i>Fazer zig-zag</li>
                            <li class="mb-2"><i class="bi bi-x-circle text-danger me-2"></i>Usar fones de ouvido</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dica Extra -->
        <div class="alert alert-info mt-5">
            <div class="d-flex align-items-center">
                <i class="bi bi-info-circle fs-4 me-3"></i>
                <div>
                    <h5 class="alert-heading mb-2">Dica Importante!</h5>
                    <p class="mb-0">Ao pedalar em grupo, mantenha-se em fila única. Em rodovias, é permitido pedalar em fila dupla apenas quando a pista tiver acostamento.</p>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Seção Sinalização -->
    <section id="sinalizacao" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <span class="badge bg-warning text-dark fs-6 mb-3">Sinalização</span>
                <h2 class="display-5 fw-bold text-dark mb-3">Conheça a Sinalização</h2>
                <p class="text-muted">A linguagem universal do trânsito</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="card sinalizacao-card">
                        <div class="sinal-cor vermelho"></div>
                        <div class="card-body text-center p-4">
                            <i class="bi bi-sign-stop fs-1 text-danger mb-3"></i>
                            <h5 class="fw-bold">Placas de Regulamentação</h5>
                            <p class="text-muted small">Indicam ações que devem ou não ser tomadas.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card sinalizacao-card">
                        <div class="sinal-cor amarelo"></div>
                        <div class="card-body text-center p-4">
                            <i class="bi bi-exclamation-triangle fs-1 text-warning mb-3"></i>
                            <h5 class="fw-bold">Placas de Advertência</h5>
                            <p class="text-muted small">Alertam sobre potenciais perigos e riscos na via, esteja sempre atento.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card sinalizacao-card">
                        <div class="sinal-cor azul"></div>
                        <div class="card-body text-center p-4">
                            <i class="bi bi-info-circle fs-1 text-primary mb-3"></i>
                            <h5 class="fw-bold">Placas de Indicação</h5>
                            <p class="text-muted small">Orientam e informam os usuários sobre o que é recomendado ser feito.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-3">
                    <div class="card sinalizacao-card">
                        <div class="sinal-cor verde"></div>
                        <div class="card-body text-center p-4">
                            <i class="bi bi-geo-alt fs-1 text-success mb-3"></i>
                            <h5 class="fw-bold">Placas de Serviços</h5>
                            <p class="text-muted small">Indicam serviços auxiliares que podem ser utilizados.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h3 class="display-6 fw-bold mb-4">Compartilhe o Conhecimento!</h3>
                    <p class="lead mb-4">A educação no trânsito salva vidas. Compartilhe essas informações com familiares e amigos.</p>
                    <p class="lead mb-4">Quer saber mais? nos contate.</p>
                    <p>
                        <strong>Telefone:</strong> (11) 3456-7890<br>
                        <strong>E-mail:</strong> contato@transitoconsciente.org.br
                    </p>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Scroll suave para as âncoras
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>