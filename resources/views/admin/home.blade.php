<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plataforma | Administração</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --bg:#0b132b; --card:#1c2541; --accent:#5bc0be; --text:#eaf1f8; --muted:#a8b2c1; }
        *{ box-sizing:border-box }
        body{ margin:0; font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Ubuntu; background:var(--bg); color:var(--text); }
        header{ display:flex; align-items:center; justify-content:space-between; padding:16px 24px; border-bottom:1px solid #2a3558; }
        header .brand{ display:flex; align-items:center; gap:12px; font-weight:700; letter-spacing:.2px }
        header .brand .dot{ width:10px; height:10px; border-radius:50%; background:var(--accent) }
        header nav a{ color:var(--muted); text-decoration:none; margin-left:16px; font-weight:600 }
        main{ max-width:1000px; margin:40px auto; padding:0 24px }
        .hero{ background:linear-gradient(135deg, rgba(91,192,190,.22), #121a33); border:1px solid #2a3558; border-radius:16px; padding:32px; display:grid; grid-template-columns:1.1fr .9fr; gap:24px }
        .hero h1{ margin:0 0 8px; font-size:28px }
        .hero p{ margin:0 0 20px; color:var(--muted) }
        .hero .actions{ display:flex; gap:12px }
        .btn{ display:inline-flex; align-items:center; gap:8px; padding:10px 14px; border-radius:10px; border:1px solid #2a3558; background:#182039; color:var(--text); text-decoration:none; font-weight:600 }
        .btn:focus{ outline:none; box-shadow:0 0 0 2px #5bc0be55 }
        .btn.primary{ background:var(--accent); color:#0b132b; border-color:transparent }
        .stats{ display:grid; grid-template-columns:repeat(3,1fr); gap:16px; margin-top:24px }
        .card{ background:linear-gradient(180deg, #1b2442, #172039); border:1px solid #2a3558; border-radius:12px; padding:16px }
        .label{ font-size:12px; color:var(--muted) }
        .value{ font-size:22px; font-weight:700 }
        footer{ text-align:center; padding:20px; color:var(--muted) }
        @media (max-width:800px){ .hero{ grid-template-columns:1fr } }
    </style>
</head>
<body>
<header>
    <div class="brand"><span class="dot"></span> <span>Plataforma Segurança</span></div>
    <nav>
        <a href="/">Início</a>
        <a href="#">Administração</a>
        <a href="{{ route('admin.users.index') }}">Usuários</a>
    </nav>
</header>
<main>
    <section class="hero">
        <div>
            <h1>Inovações para melhorar a segurança no trabalho</h1>
            <p>Painel administrativo com visão geral dos indicadores e atalhos rápidos.</p>
            <div class="actions">
                <a class="btn primary" href="#">Criar relatório</a>
                <a class="btn" href="#">Configurações</a>
            </div>
        </div>
        <div class="card">
            <div class="label">Alertas ativos</div>
            <div class="value">12</div>
            <div class="label" style="margin-top:12px">Última atualização</div>
            <div>há 5 min</div>
        </div>
    </section>

    <section class="stats">
        <div class="card">
            <div class="label">Incidentes este mês</div>
            <div class="value">3</div>
        </div>
        <div class="card">
            <div class="label">Treinamentos concluídos</div>
            <div class="value">58%</div>
        </div>
        <div class="card">
            <div class="label">Checklists pendentes</div>
            <div class="value">7</div>
        </div>
    </section>
</main>
<footer>© {{ date('Y') }} Plataforma Segurança</footer>
</body>
</html>