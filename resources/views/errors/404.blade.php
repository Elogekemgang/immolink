<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 · Immolink</title>
    <style>
        :root {
            color-scheme: dark;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: radial-gradient(circle at top left, #0f172a 0%, #020617 45%, #030712 100%);
            color: #f8fafc;
        }

        .page {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .orb {
            position: absolute;
            border-radius: 9999px;
            filter: blur(80px);
            opacity: 0.45;
            pointer-events: none;
        }

        .orb-1 {
            top: 8%;
            left: 5%;
            width: 280px;
            height: 280px;
            background: #34d399;
        }

        .orb-2 {
            bottom: 12%;
            right: 6%;
            width: 320px;
            height: 320px;
            background: #22d3ee;
        }

        .card {
            position: relative;
            z-index: 1;
            width: min(1120px, 100%);
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 32px;
            padding: 40px;
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 28px;
            background: rgba(2, 6, 23, 0.72);
            box-shadow: 0 30px 80px rgba(2, 6, 23, 0.45);
            backdrop-filter: blur(20px);
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 12px;
            border: 1px solid rgba(148, 163, 184, 0.25);
            border-radius: 999px;
            background: rgba(15, 23, 42, 0.8);
            color: #cbd5e1;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: #34d399;
            box-shadow: 0 0 0 4px rgba(52, 211, 153, 0.18);
        }

        h1 {
            margin: 20px 0 12px;
            font-size: clamp(3.5rem, 7vw, 5.5rem);
            line-height: 0.95;
            letter-spacing: -0.04em;
        }

        .lead {
            margin: 0;
            max-width: 620px;
            font-size: 1.05rem;
            line-height: 1.8;
            color: #cbd5e1;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 26px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            padding: 13px 18px;
            font-weight: 700;
            text-decoration: none;
            transition: transform 180ms ease, box-shadow 180ms ease, border-color 180ms ease, background 180ms ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            background: linear-gradient(135deg, #34d399, #2dd4bf);
            color: #022c22;
            box-shadow: 0 12px 24px rgba(45, 212, 191, 0.2);
        }

        .btn-secondary {
            border: 1px solid rgba(148, 163, 184, 0.25);
            background: rgba(15, 23, 42, 0.85);
            color: #f8fafc;
        }

        .panel {
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 24px;
            background: linear-gradient(145deg, rgba(15, 23, 42, 0.95), rgba(2, 6, 23, 0.95));
            padding: 24px;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
        }

        .panel-title {
            margin: 0;
            font-size: 1.16rem;
            font-weight: 700;
        }

        .panel-subtitle {
            margin: 6px 0 0;
            font-size: 0.95rem;
            color: #94a3b8;
        }

        .icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 16px;
            background: rgba(52, 211, 153, 0.14);
            color: #6ee7b7;
        }

        .links {
            display: grid;
            gap: 10px;
            margin-top: 20px;
        }

        .link-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 16px;
            border-radius: 16px;
            border: 1px solid rgba(148, 163, 184, 0.16);
            background: rgba(2, 6, 23, 0.68);
            text-decoration: none;
            color: #e2e8f0;
            transition: border-color 180ms ease, background 180ms ease;
        }

        .link-card:hover {
            border-color: rgba(52, 211, 153, 0.35);
            background: rgba(15, 23, 42, 0.9);
        }

        .link-card span:last-child {
            color: #6ee7b7;
            font-weight: 700;
        }

        @media (max-width: 860px) {
            .card {
                grid-template-columns: 1fr;
                padding: 28px;
            }

            .panel {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>

        <main class="card">
            <section>
                <p class="eyebrow">
                    <span class="dot"></span>
                    Immolink · Gestion immobilière
                </p>
                <h1>404</h1>
                <p class="lead">
                    La page que vous cherchez ne correspond pas à un bien, à une annonce, à un dossier ou à une section de votre espace Immolink.
                    Pas d’inquiétude : vous pouvez reprendre la navigation et retrouver rapidement votre activité immobilière.
                </p>

                <div class="actions">
                    <a href="{{ url('/') }}" class="btn btn-primary">Retour au tableau de bord</a>
                    <a href="javascript:history.back()" class="btn btn-secondary">Revenir à la page précédente</a>
                </div>
            </section>

            <aside class="panel" aria-label="Aide rapide">
                <div class="panel-header">
                    <div>
                        <p class="panel-title">Besoin d’un raccourci ?</p>
                        <p class="panel-subtitle">Quelques accès rapides pour poursuivre votre gestion.</p>
                    </div>
                    <div class="icon" aria-hidden="true">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 7h12"></path>
                            <path d="M6 12h12"></path>
                            <path d="M6 17h8"></path>
                        </svg>
                    </div>
                </div>

                <div class="links">
                    <a href="{{ url('/') }}" class="link-card">
                        <span>Revenir à l’accueil Immolink</span>
                        <span>→</span>
                    </a>
                    <a href="mailto:contact@immolink.com" class="link-card">
                        <span>Contacter l’équipe support</span>
                        <span>→</span>
                    </a>
                </div>
            </aside>
        </main>
    </div>
</body>
</html>
