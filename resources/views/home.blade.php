<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} · Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
    :root {
        --bg: #0b1024;
        --text: #e9eef7;
        --muted: #a6b0c2;
        --accent: #2bd8c1;
        --panel: #151a33;
        --border: #28324e;
    }

    * {
        box-sizing: border-box
    }

    body {
        margin: 0;
        font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Ubuntu;
        background: var(--bg);
        color: var(--text)
    }

    .topbar {
        height: 56px;
        background: #142043;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 16px;
        border-bottom: 1px solid var(--border)
    }

    .brand {
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 700
    }

    .brand .logo {
        color: var(--accent);
        font-size: 20px
    }

    .actions {
        display: flex;
        gap: 12px
    }

    .actions a {
        color: var(--muted);
        text-decoration: none
    }

    .layout {
        display: grid;
        grid-template-columns: 280px 1fr;
    }

    .sidebar {
        background: #0c1a31;
        border-right: 1px solid var(--border);
        min-height: calc(100vh - 56px);
        padding: 12px
    }

    .search {
        margin: 8px 0 12px;
        display: flex;
        gap: 8px
    }

    .search input {
        flex: 1;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid var(--border);
        background: #13254a;
        color: var(--text)
    }

    .menu-group {
        margin-bottom: 8px
    }

    .menu-header {
        background: var(--accent);
        color: #04121a;
        font-weight: 700;
        padding: 10px 12px;
        border-radius: 8px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: space-between
    }

    .menu-items {
        background: #13254a;
        border: 1px solid var(--border);
        border-radius: 8px;
        margin-top: 6px;
        display: none
    }

    .menu-items a {
        display: block;
        padding: 10px 12px;
        color: var(--text);
        text-decoration: none;
        border-bottom: 1px solid #243763
    }

    .menu-items a:last-child {
        border-bottom: none
    }
    .menu-sub .parent {
        display: block;
        padding: 10px 12px;
        color: var(--text);
        text-decoration: none;
        border-bottom: 1px solid #243763
    }
    .menu-sub .children {
        border-top: 1px solid var(--border);
        display: none
    }

    .content {
        padding: 20px
    }

    .cards {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 12px
    }

    .card {
        border-radius: 12px;
        padding: 16px;
        color: #0e1726;
        font-weight: 700;
        background-image: linear-gradient(135deg, rgba(255, 255, 255, .18), transparent)
    }

    .card .sub {
        font-size: 12px;
        color: #0e1726;
        opacity: .85;
        margin-top: 4px
    }

    .panel {
        margin-top: 16px;
        background: var(--panel);
        border: 1px solid var(--border);
        border-radius: 12px;
        padding: 16px
    }

    .panel h3 {
        margin: 0 0 12px;
        font-size: 16px
    }

    .grid-2 {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px
    }

    .list {
        display: grid;
        gap: 8px
    }

    .list .item {
        background: #13254a;
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 10px
    }

    .label {
        font-size: 12px;
        color: var(--muted)
    }

    .value {
        font-size: 20px;
        font-weight: 700
    }

    .badge {
        display: inline-block;
        padding: 6px 10px;
        border-radius: 999px;
        background: #13254a;
        border: 1px solid var(--border);
        color: var(--text);
        font-size: 12px
    }

    .progress {
        height: 8px;
        background: #13254a;
        border-radius: 999px;
        overflow: hidden
    }

    .progress .bar {
        height: 100%;
        background: var(--accent)
    }

    @media (max-width:1000px) {
        .cards {
            grid-template-columns: repeat(2, 1fr)
        }

        .layout {
            grid-template-columns: 1fr
        }

        .sidebar {
            position: sticky;
            top: 56px
        }
    }
    </style>
</head>

<body>
    <div class="topbar">
        <div class="brand"><span class="logo">{{ config('app.name') }}</span> <span>Hub</span></div>
        <div class="actions">
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.home') }}">Admin</a>
            <a href="{{ route('profile.edit') }}">Perfil</a>
            <div style="position:relative">
                <button id="btnNew"
                    style="background:transparent;color:var(--muted);border:1px solid var(--border);padding:6px 10px;border-radius:8px;cursor:pointer">Novo
                    ▾</button>
                <div id="menuNew"
                    style="position:absolute; right:0; top:32px; background:#13254a; border:1px solid var(--border); border-radius:8px; display:none; min-width:220px">
                    <button id="openCreateFeature"
                        style="display:block;width:100%;text-align:left;background:none;border:0;color:var(--text);padding:10px 12px;cursor:pointer">Nova
                        funcionalidade</button>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button
                style="background:var(--accent);border:0;color:#04121a;padding:8px 12px;border-radius:8px;font-weight:700;cursor:pointer">Sair</button>
        </form>
    </div>
    <div class="layout">
        <aside class="sidebar">
            <div class="search">
                <input type="text" placeholder="Buscar tela">
            </div>
            @foreach($menus as $idx => $m)
            <div class="menu-group">
                <div class="menu-header" data-target="items-{{ $idx }}">{{ $m['label'] }}<span>▾</span></div>
                <div id="items-{{ $idx }}" class="menu-items">
                    @foreach($m['items'] as $it)
                        @if(isset($it['children']) && count($it['children']) > 0)
                            <div class="menu-sub">
                                <a href="{{ $it['href'] }}" class="parent" data-sub="sub-{{ $idx }}-{{ str_replace(' ', '-', strtolower($it['label'])) }}">{{ $it['icon'] ?? '' }} {{ $it['label'] }} ▾</a>
                                <div id="sub-{{ $idx }}-{{ str_replace(' ', '-', strtolower($it['label'])) }}" class="children">
                                    @foreach($it['children'] as $ch)
                                        <a href="{{ $ch['href'] }}">{{ $ch['icon'] ?? '' }} {{ $ch['label'] }}</a>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <a href="{{ $it['href'] }}">{{ $it['icon'] ?? '' }} {{ $it['label'] }}</a>
                        @endif
                    @endforeach
                </div>
            </div>
            @endforeach
        </aside>
        <main class="content">
            @if (session('status'))
            <div
                style="margin-bottom:12px; background:rgba(43,216,193,.15); border:1px solid var(--border); color:var(--text); padding:10px; border-radius:8px">
                {{ session('status') }}</div>
            @endif
            @if (session('error'))
            <div
                style="margin-bottom:12px; background:rgba(239,71,111,.15); border:1px solid #5a2a2a; color:var(--text); padding:10px; border-radius:8px">
                {{ session('error') }}</div>
            @endif

            <div id="createFeaturePanel"
                style="display:none; margin-bottom:16px; background:#13254a; border:1px solid var(--border); border-radius:12px; padding:12px">
                <form method="POST" action="{{ route('home.feature.store') }}"
                    style="display:grid; grid-template-columns:2fr 2fr auto; gap:8px; align-items:end">
                    @csrf
                    <div>
                        <div class="label">Nome</div>
                        <input type="text" name="label" placeholder="Ex.: Auditorias"
                            style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--border); background:#182039; color:var(--text)">
                    </div>
                    <div>
                        <div class="label">Link (opcional)</div>
                        <input type="text" name="href" placeholder="Ex.: /auditorias"
                            style="width:100%; padding:10px; border-radius:8px; border:1px solid var(--border); background:#182039; color:var(--text)">
                    </div>
                    <div>
                        <button class="btn" type="submit">Adicionar</button>
                    </div>
                </form>
            </div>
            <div class="cards">
                @foreach($metrics as $mt)
                <div class="card" style="background: {{ $mt['color'] }}">
                    <div>{{ $mt['icon'] }} {{ $mt['label'] }}</div>
                    <div class="value">{{ $mt['value'] }}</div>
                    <div class="sub">{{ $mt['sub'] }}</div>
                </div>
                @endforeach
            </div>

            <div class="grid-2">
                <div class="panel">
                    <h3>Créditos e Licença</h3>
                    <div class="list">
                        <div class="item">
                            <div class="label">Número Licença</div>
                            <div class="value">{{ $credits['license_number'] }}</div>
                        </div>
                        <div class="item">
                            <div class="label">Expiração Licença</div>
                            <div>{{ $credits['license_expiration']->format('d/m/Y H:i') }}</div>
                        </div>
                        <div class="item" style="display:grid; grid-template-columns:repeat(3,1fr); gap:8px">
                            <div class="list">
                                <div class="label">Créditos Ativados</div>
                                <div class="value">{{ $credits['activated'] }}</div>
                            </div>
                            <div class="list">
                                <div class="label">Créditos Já Usados</div>
                                <div class="value">{{ $credits['used'] }}</div>
                            </div>
                            <div class="list">
                                <div class="label">Saldo Pendente</div>
                                <div class="value">{{ $credits['pending'] }}</div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="label">% de Créditos Utilizados</div>
                            <div class="progress">
                                <div class="bar" style="width: {{ $credits['percent_used'] }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <h3>Tutoriais</h3>
                    <div class="list">
                        @foreach($videos as $v)
                        <div class="item"><a href="{{ $v['href'] }}"
                                style="color:var(--text); text-decoration:none">{{ $v['title'] }}</a></div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="grid-2">
                <div class="panel">
                    <h3>Atualizações</h3>
                    <div class="list">
                        @foreach($news as $n)
                        <div class="item">
                            <div class="badge">{{ $n['date']->format('d/m/Y') }}</div> <span
                                style="margin-left:8px">{{ $n['title'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="panel">
                    <h3>Links Úteis</h3>
                    <div class="list">
                        @foreach($links as $l)
                        <div class="item">
                            <div style="font-weight:700">{{ $l['label'] }}</div>
                            <div class="label">{{ $l['desc'] }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
    document.querySelectorAll('.menu-header').forEach(function(h) {
        h.addEventListener('click', function() {
            var id = h.getAttribute('data-target');
            var el = document.getElementById(id);
            var shown = el.style.display === 'block';
            el.style.display = shown ? 'none' : 'block';
        });
    });
    document.querySelectorAll('.menu-sub .parent').forEach(function(p){
        p.addEventListener('click', function(e){
            e.preventDefault();
            var id = p.getAttribute('data-sub');
            var el = document.getElementById(id);
            var shown = el.style.display === 'block';
            el.style.display = shown ? 'none' : 'block';
        });
    });
    var btnNew = document.getElementById('btnNew');
    var menuNew = document.getElementById('menuNew');
    var openCreate = document.getElementById('openCreateFeature');
    if (btnNew) {
        btnNew.addEventListener('click', function() {
            menuNew.style.display = menuNew.style.display === 'block' ? 'none' : 'block'
        })
    }
    if (openCreate) {
        openCreate.addEventListener('click', function() {
            menuNew.style.display = 'none';
            var p = document.getElementById('createFeaturePanel');
            if (p) {
                p.style.display = 'block'
            }
        })
    }
    </script>
</body>

</html>
