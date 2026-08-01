<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401 · Accès non autorisé</title>
    <style>
        :root {
            color-scheme: dark;
            --bg: #07111f;
            --panel: rgba(10, 20, 36, 0.85);
            --text: #f7fbff;
            --muted: #97a9c3;
            --accent: #4f8cff;
            --accent-2: #7c5cff;
            --border: rgba(255, 255, 255, 0.12);
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            min-height: 100vh;
            display: grid;
            place-items: center;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(79, 140, 255, 0.18), transparent 28%),
                radial-gradient(circle at bottom right, rgba(124, 92, 255, 0.2), transparent 22%),
                var(--bg);
            overflow: hidden;
        }

        .background-glow {
            position: absolute;
            inset: auto;
            width: 32rem;
            height: 32rem;
            border-radius: 50%;
            filter: blur(120px);
            opacity: 0.35;
            pointer-events: none;
        }

        .background-glow.one { background: #4f8cff; top: -10rem; left: -8rem; }
        .background-glow.two { background: #7c5cff; bottom: -10rem; right: -8rem; }

        .card {
            position: relative;
            z-index: 1;
            width: min(92vw, 480px);
            padding: 2.25rem;
            border: 1px solid var(--border);
            border-radius: 24px;
            background: var(--panel);
            backdrop-filter: blur(18px);
            box-shadow: 0 24px 70px rgba(0, 0, 0, 0.35);
            text-align: center;
        }

        .icon {
            width: 78px;
            height: 78px;
            margin: 0 auto 1rem;
            display: grid;
            place-items: center;
            border-radius: 20px;
            background: linear-gradient(135deg, rgba(79, 140, 255, 0.2), rgba(124, 92, 255, 0.24));
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .icon svg { width: 36px; height: 36px; stroke: #ffffff; }

        .code {
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #90b7ff;
            margin-bottom: 0.4rem;
        }

        h1 {
            margin: 0 0 0.6rem;
            font-size: clamp(1.7rem, 3vw, 2.2rem);
            line-height: 1.15;
        }

        p {
            margin: 0 0 1.5rem;
            color: var(--muted);
            font-size: 1rem;
            line-height: 1.7;
        }

        .actions {
            display: flex;
            gap: 0.75rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.9rem 1.1rem;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 600;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }

        .btn:hover { transform: translateY(-2px); }

        .btn-primary {
            color: white;
            background: linear-gradient(135deg, var(--accent), var(--accent-2));
            box-shadow: 0 12px 30px rgba(79, 140, 255, 0.25);
        }

        .btn-secondary {
            color: #dfe9ff;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.12);
        }

        .footer {
            margin-top: 1.3rem;
            font-size: 0.92rem;
            color: var(--muted);
        }

        @media (max-width: 480px) {
            .card { padding: 1.4rem; }
            .actions { flex-direction: column; }
            .btn { width: 100%; }
        }
    </style>
</head>
<body>
    <div class="background-glow one"></div>
    <div class="background-glow two"></div>

    <div class="card">
        <div class="icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 3l8 4.5v5c0 4.8-3.2 8.9-8 10.5-4.8-1.6-8-5.7-8-10.5v-5L12 3z"></path>
                <path d="M10 11l2 2 4-4"></path>
            </svg>
        </div>

        <div class="code">Erreur 401</div>
        <h1>Accès non autorisé</h1>
        <p>Vous n’avez pas les permissions nécessaires pour consulter cette page. Si vous pensez qu’il s’agit d’une erreur, merci de vous reconnecter ou de contacter l’administrateur.</p>

        <div class="actions">
            <a href="{{ url('/') }}" class="btn btn-primary">Retour à l’accueil</a>
            <a href="{{ url('/login') }}" class="btn btn-secondary">Se connecter</a>
        </div>

        <div class="footer">{{ config('app.name', 'Immolink') }}</div>
    </div>
</body>
</html>
