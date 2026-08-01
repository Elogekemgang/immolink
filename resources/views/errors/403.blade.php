<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Accès interdit</title>
    <style>
        :root {
            color-scheme: dark;
            --bg-start: #0f172a;
            --bg-end: #1e293b;
            --card-bg: rgba(15, 23, 42, 0.8);
            --border: rgba(255, 255, 255, 0.12);
            --text: #e2e8f0;
            --muted: #94a3b8;
            --accent: #38bdf8;
            --accent-2: #818cf8;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 24px;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: var(--text);
            background: linear-gradient(135deg, var(--bg-start), var(--bg-end));
        }

        .card {
            width: min(100%, 720px);
            padding: 40px 32px;
            border-radius: 24px;
            background: var(--card-bg);
            border: 1px solid var(--border);
            box-shadow: 0 20px 60px rgba(2, 6, 23, 0.35);
            backdrop-filter: blur(16px);
            text-align: center;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(56, 189, 248, 0.15);
            color: #7dd3fc;
            font-size: 0.95rem;
            font-weight: 600;
            letter-spacing: 0.02em;
            margin-bottom: 18px;
        }

        h1 {
            margin: 0 0 12px;
            font-size: clamp(2rem, 3.2vw, 3rem);
            line-height: 1.1;
        }

        p {
            margin: 0 auto 24px;
            max-width: 560px;
            color: var(--muted);
            font-size: 1.05rem;
            line-height: 1.7;
        }

        .actions {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent), var(--accent-2));
            color: white;
            box-shadow: 0 10px 25px rgba(56, 189, 248, 0.2);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.06);
            color: var(--text);
            border: 1px solid var(--border);
        }

        .footer {
            margin-top: 20px;
            font-size: 0.9rem;
            color: var(--muted);
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="badge">🚫 Accès interdit</div>
        <h1>403 — Vous n'avez pas l'autorisation d'accéder à cette page</h1>
        <p>
            Désolé, cette ressource est protégée ou vous n'avez pas les droits requis pour la consulter.
            Si vous pensez qu'il s'agit d'une erreur, veuillez contacter l'administrateur.
        </p>

        <div class="actions">
            <a href="/" class="btn btn-primary">Retour à l'accueil</a>
            <a href="javascript:history.back()" class="btn btn-secondary">Retour à la page précédente</a>
        </div>

        <div class="footer">
            {{ config('app.name', 'Immolink') }}
        </div>
    </div>
</body>
</html>
