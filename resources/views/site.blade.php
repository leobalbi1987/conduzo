<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conduzo — Neon Tech Edition</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: "Inter", sans-serif; background: #050016; color: #e6e6ff }
        .neon-glow { text-shadow: 0 0 10px #b400ff, 0 0 20px #6f00ff, 0 0 30px #00aaff }
        .navbar-neon { background: rgba(10, 0, 28, 0.6); backdrop-filter: blur(14px); border-bottom: 1px solid rgba(183, 0, 255, 0.4); box-shadow: 0 0 18px rgba(183, 0, 255, 0.2) }
        .navbar-neon .nav-link { color: #d0baff !important; transition: 0.3s }
        .navbar-neon .nav-link:hover { color: #fff !important; text-shadow: 0 0 10px #b400ff }
        .hero { min-height: 90vh; padding-top: 110px; background: radial-gradient(circle at center, #32004d, #050016 70%); display: flex; align-items: center }
        .hero h1 { font-size: 3.4rem; font-weight: 700 }
        .glow-line { width: 160px; height: 4px; background: linear-gradient(90deg, #b400ff, #00d0ff); border-radius: 100px; box-shadow: 0 0 12px #b400ff; animation: glowPulse 2s infinite alternate }
        @keyframes glowPulse { 0% { opacity: .6; transform: scaleX(.85) } 100% { opacity: 1; transform: scaleX(1.1) } }
        .card-neon { border-radius: 16px; padding: 25px; background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(176, 0, 255, 0.4); box-shadow: inset 0 0 25px rgba(176, 0, 255, 0.12); transition: 0.25s ease }
        .card-neon:hover { transform: translateY(-6px); box-shadow: 0 0 25px rgba(176, 0, 255, 0.4), inset 0 0 25px rgba(176, 0, 255, 0.12); border-color: #d200ff }
        .card-neon a { color: #8ad8ff; text-decoration: none; font-weight: 600 }
        .card-neon a:hover { color: #fff; text-shadow: 0 0 10px #00d9ff }
        .partners-img { border-radius: 12px; opacity: 0.9; box-shadow: 0 0 15px rgba(0, 119, 255, 0.3) }
        footer { background: #03000e; padding: 50px 0; color: #bfbfff; border-top: 1px solid rgba(183,0,255,0.25) }
        footer .brand { font-weight: 800; letter-spacing: 0.08em }
    </style>
    <script>document.addEventListener('touchstart', function(){}, {passive: true});</script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-neon navbar-dark fixed-top py-3">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center neon-glow" href="#">CONDUZO</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: brightness(10)"></span>
        </button>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto fw-semibold">
                <li class="nav-item"><a class="nav-link" href="#produtos">Encoders</a></li>
                <li class="nav-item"><a class="nav-link" href="#produtos">Multiplexadores</a></li>
                <li class="nav-item"><a class="nav-link" href="#produtos">Moduladores</a></li>
                <li class="nav-item"><a class="nav-link" href="#produtos">BUC/HPAs</a></li>
                <li class="nav-item"><a class="nav-link" href="#produtos">Antenas Fixas</a></li>
                <li class="nav-item"><a class="nav-link" href="#produtos">Flyaway</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="container" data-aos="fade-up">
        <h1 class="neon-glow mb-3">O Futuro da Telecomunicação Começa Aqui</h1>
        <div class="glow-line mb-4"></div>
        <p class="lead col-lg-6">Equipamentos avançados para headends, enlaces, satélite e transmissão profissional.</p>
        <div class="mt-4 d-flex flex-wrap gap-3">
            <a href="#produtos" class="btn btn-primary btn-lg px-4" style="background: linear-gradient(90deg, #b400ff, #0077ff); border: none">Catálogo</a>
            <a href="#contato" class="btn btn-outline-light btn-lg px-4">Fale Conosco</a>
        </div>
    </div>
</section>

<section id="produtos" class="py-5">
    <div class="container">
        <h2 class="fw-bold text-center neon-glow mb-4" data-aos="fade-up">Produtos & Serviços</h2>
        <div class="row g-4">
            <div class="col-md-4" data-aos="zoom-in">
                <div class="card-neon"><h5 class="fw-semibold text-white">Encoders</h5><p class="text-muted mt-2">Qualidade e eficiência máxima em transmissão.</p><a href="#">Ver detalhes →</a></div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="card-neon"><h5 class="fw-semibold text-white">Multiplexadores</h5><p class="text-muted mt-2">Integração precisa de fluxos múltiplos.</p><a href="#">Ver detalhes →</a></div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="200">
                <div class="card-neon"><h5 class="fw-semibold text-white">Moduladores</h5><p class="text-muted mt-2">Modulação confiável para diversos padrões.</p><a href="#">Ver detalhes →</a></div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="300">
                <div class="card-neon"><h5 class="fw-semibold text-white">BUC/HPAs</h5><p class="text-muted mt-2">Potência e estabilidade para enlaces.</p><a href="#">Ver detalhes →</a></div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="400">
                <div class="card-neon"><h5 class="fw-semibold text-white">Antenas Fixas</h5><p class="text-muted mt-2">Performance em cenários de missão crítica.</p><a href="#">Ver detalhes →</a></div>
            </div>
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="500">
                <div class="card-neon"><h5 class="fw-semibold text-white">Flyaway</h5><p class="text-muted mt-2">Mobilidade para operações remotas.</p><a href="#">Ver detalhes →</a></div>
            </div>
        </div>
    </div>
</section>

<section id="contato" class="py-5">
    <div class="container" data-aos="fade-up">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <h3 class="neon-glow">Parcerias e Integrações</h3>
                <p class="text-muted">Integrações com fabricantes líderes e soluções customizadas.</p>
                <div class="d-flex flex-wrap gap-3">
                    <img class="partners-img" src="https://via.placeholder.com/220x120/0b0f2a/ffffff?text=Parceiro+1" alt="Parceiro 1" width="220" height="120">
                    <img class="partners-img" src="https://via.placeholder.com/220x120/0b0f2a/ffffff?text=Parceiro+2" alt="Parceiro 2" width="220" height="120">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-neon">
                    <h5 class="fw-semibold text-white mb-3">Entre em contato</h5>
                    <form class="row g-3">
                        <div class="col-md-6"><input type="text" class="form-control" placeholder="Nome"></div>
                        <div class="col-md-6"><input type="email" class="form-control" placeholder="E-mail"></div>
                        <div class="col-12"><textarea class="form-control" rows="4" placeholder="Mensagem"></textarea></div>
                        <div class="col-12"><button type="button" class="btn btn-primary" style="background: linear-gradient(90deg, #b400ff, #0077ff); border: none">Enviar</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container text-center">
        <div class="brand neon-glow">CONDUZO</div>
        <div class="text-muted">Equipamentos de Telecomunicações</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script> AOS.init({ once: true, duration: 700 }); </script>
</footer>
</body>
</html>
