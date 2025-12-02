<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administração | Usuários</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --bg:#0b132b; --card:#1c2541; --accent:#5bc0be; --text:#eaf1f8; --muted:#a8b2c1; }
        *{ box-sizing:border-box }
        body{ margin:0; font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Ubuntu; background:var(--bg); color:var(--text); }
        header{ display:flex; align-items:center; justify-content:space-between; padding:16px 24px; border-bottom:1px solid #2a3558; }
        header .brand{ display:flex; align-items:center; gap:12px; font-weight:700 }
        header .brand .dot{ width:10px; height:10px; border-radius:50%; background:var(--accent) }
        header nav a{ color:var(--muted); text-decoration:none; margin-left:16px; font-weight:600 }
        main{ max-width:1000px; margin:32px auto; padding:0 24px }
        .card{ background:var(--card); border:1px solid #2a3558; border-radius:12px; padding:16px }
        table{ width:100%; border-collapse:collapse }
        th, td{ padding:12px; border-bottom:1px solid #2a3558; text-align:left }
        th{ color:var(--muted); font-weight:600 }
        .badge{ display:inline-block; padding:4px 8px; border-radius:999px; font-size:12px; background:#182039; border:1px solid #2a3558 }
        .badge.admin{ background:var(--accent); color:#0b132b; border-color:transparent }
        .btn{ display:inline-flex; padding:8px 10px; border-radius:8px; background:#182039; border:1px solid #2a3558; color:var(--text); font-weight:600; cursor:pointer }
        .btn:hover{ filter:brightness(1.1) }
        .alert{ margin-bottom:16px; padding:12px; border-radius:10px }
        .alert.ok{ background:rgba(91,192,190,.15); border:1px solid #2a3558 }
        .alert.err{ background:rgba(220,53,69,.15); border:1px solid #5a2a2a }
    </style>
</head>
<body>
<header>
    <div class="brand"><span class="dot"></span> <span>Administração</span></div>
    <nav>
        <a href="{{ route('admin.home') }}">Home</a>
        <a href="{{ route('admin.users.index') }}">Usuários</a>
    </nav>
</header>
<main>
    <h1 style="margin:0 0 16px">Usuários</h1>

    <form method="GET" action="{{ route('admin.users.index') }}" style="margin-bottom:16px; display:flex; gap:8px">
        <input type="text" name="q" value="{{ $q ?? '' }}" placeholder="Buscar por nome ou e‑mail" style="flex:1; padding:10px; border-radius:8px; border:1px solid #2a3558; background:#182039; color:var(--text)">
        <button class="btn" type="submit">Buscar</button>
    </form>

    @if (session('status'))
        <div class="alert ok">{{ session('status') }}</div>
    @endif
    @if (session('error'))
        <div class="alert err">{{ session('error') }}</div>
    @endif

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Papel</th>
                    <th style="width:180px">Ações</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->is_admin)
                            <span class="badge admin">Admin</span>
                        @else
                            <span class="badge">Usuário</span>
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.users.toggle', $user) }}" style="display:inline" onsubmit="return confirm('Confirmar alteração de papel?')">
                            @csrf
                            <button class="btn" type="submit">{{ $user->is_admin ? 'Remover admin' : 'Promover a admin' }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div style="margin-top:16px">
        {{ $users->links() }}
    </div>
</main>
</body>
</html>