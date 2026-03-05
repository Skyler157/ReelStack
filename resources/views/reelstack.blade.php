<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ReelStack | Free Instagram Reels & Video Downloader</title>

    <meta name="description" content="ReelStack is a Free Instagram Reels downloader. Download Instagram videos, photos, and carousel posts in HD quality from public links.">
    <meta name="robots" content="index, follow">
    <meta name="author" content="ReelStack">
    <meta name="theme-color" content="#081a35" id="theme-color-meta">

    <link rel="canonical" href="https://reelstackapp.onrender.com/">
    <link rel="icon" type="image/svg+xml" href="/reelstack-icon.svg">

    <meta property="og:title" content="Free Instagram Reels Downloader | ReelStack">
    <meta property="og:description" content="Download Instagram Reels, videos, and photos in HD quality. No login required. 100% free.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://reelstackapp.onrender.com/">
    <meta property="og:image" content="https://reelstackapp.onrender.com/preview.jpg">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Free Instagram Reels Downloader | ReelStack">
    <meta name="twitter:description" content="Download Instagram videos and reels in HD from public links. No login required.">
    <meta name="twitter:image" content="https://reelstackapp.onrender.com/preview.jpg">
    <script>
        (() => {
            const setThemeColor = (theme) => {
                const meta = document.getElementById("theme-color-meta");
                if (!meta) return;
                meta.setAttribute("content", theme === "light" ? "#f5f9ff" : "#081a35");
            };

            const storedTheme = localStorage.getItem("reelstack-theme");
            const prefersLight = window.matchMedia && window.matchMedia("(prefers-color-scheme: light)").matches;
            const theme = storedTheme || (prefersLight ? "light" : "dark");
            document.documentElement.setAttribute("data-theme", theme);
            setThemeColor(theme);
        })();
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-0: #040b1b;
            --bg-1: #081a35;
            --bg-2: #0b2447;
            --panel: rgba(18, 42, 78, 0.72);
            --panel-border: rgba(137, 173, 219, 0.2);
            --text: #f3f7ff;
            --muted: #9fb2cc;
            --accent: #21d4c4;
            --accent-2: #38f0cb;
            --warning: #f68c7c;
            --good: #8cf7ce;
            --bad: #ff9ea1;
            --body-bg: radial-gradient(circle at 20% -10%, #163467 0%, transparent 45%),
                radial-gradient(circle at 80% 0%, #0f2d57 0%, transparent 42%),
                linear-gradient(180deg, var(--bg-1), var(--bg-0) 32%, #061121 100%);
            --header-bg: rgba(5, 14, 29, 0.72);
            --header-border: rgba(112, 150, 198, 0.16);
            --input-bg: rgba(7, 19, 39, 0.85);
            --input-border: rgba(145, 180, 220, 0.22);
            --surface-1: rgba(10, 29, 58, 0.72);
            --surface-2: rgba(10, 31, 57, 0.58);
            --btn-secondary-bg: rgba(8, 25, 49, 0.9);
            --btn-secondary-color: #dcecff;
            --footer-text: #7e99b7;
            --footer-link: #a8c2df;
            --preview-bg: #071327;
            --theme-btn-bg: rgba(8, 25, 49, 0.88);
            --theme-btn-border: rgba(137, 173, 219, 0.35);
            --theme-btn-icon: #dcecff;
            --status-bg: rgba(54, 18, 20, 0.72);
            --status-border: rgba(246, 140, 124, 0.55);
            --status-text: #ffd2cb;
            --loading-text: #cfe3fa;
            --modal-overlay: rgba(1, 8, 18, 0.85);
            --video-bg: #000;
        }

        html[data-theme="light"] {
            --bg-0: #e8f0ff;
            --bg-1: #f5f9ff;
            --bg-2: #dce9ff;
            --panel: rgba(255, 255, 255, 0.94);
            --panel-border: rgba(117, 147, 190, 0.28);
            --text: #10233f;
            --muted: #4f6787;
            --accent: #18b9ac;
            --accent-2: #12a497;
            --warning: #d8574d;
            --good: #149d66;
            --bad: #dc4951;
            --body-bg: radial-gradient(circle at 10% -10%, #eaf2ff 0%, transparent 40%),
                radial-gradient(circle at 90% 0%, #e1edff 0%, transparent 38%),
                linear-gradient(180deg, #f9fcff, #eef5ff 40%, #e5efff 100%);
            --header-bg: rgba(255, 255, 255, 0.8);
            --header-border: rgba(117, 147, 190, 0.24);
            --input-bg: rgba(255, 255, 255, 0.95);
            --input-border: rgba(117, 147, 190, 0.35);
            --surface-1: rgba(255, 255, 255, 0.92);
            --surface-2: rgba(247, 251, 255, 0.96);
            --btn-secondary-bg: rgba(240, 247, 255, 0.95);
            --btn-secondary-color: #1a365e;
            --footer-text: #4f6787;
            --footer-link: #2b517f;
            --preview-bg: #f2f8ff;
            --theme-btn-bg: rgba(242, 248, 255, 0.95);
            --theme-btn-border: rgba(117, 147, 190, 0.35);
            --theme-btn-icon: #1a365e;
            --status-bg: rgba(255, 236, 236, 0.92);
            --status-border: rgba(212, 87, 77, 0.35);
            --status-text: #8a2e28;
            --loading-text: #36547b;
            --modal-overlay: rgba(10, 25, 45, 0.45);
            --video-bg: #0f213a;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: "Plus Jakarta Sans", sans-serif;
            color: var(--text);
            background: var(--body-bg);
            line-height: 1.55;
            transition: background 0.3s ease, color 0.3s ease;
        }

        .container {
            width: min(1100px, 92%);
            margin: 0 auto;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            padding: 0.38rem 0.8rem;
            border-radius: 999px;
            border: 1px solid rgba(56, 240, 203, 0.4);
            color: var(--accent-2);
            font-size: 0.72rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-weight: 700;
            background: rgba(17, 68, 85, 0.28);
        }

        header {
            position: sticky;
            top: 0;
            z-index: 20;
            backdrop-filter: blur(10px);
            background: var(--header-bg);
            border-bottom: 1px solid var(--header-border);
            transition: background 0.3s ease, border-color 0.3s ease;
        }

        .nav {
            height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            font-weight: 800;
            text-decoration: none;
            color: var(--text);
            letter-spacing: 0.01em;
            font-size: 2.0rem;
        }

        .brand span {
            color: var(--accent-2);
        }

        .nav-links {
            display: flex;
            gap: 1.2rem;
            font-size: 0.92rem;
            align-items: center;
        }

        .nav-links a {
            color: var(--muted);
            text-decoration: none;
            transition: color 0.2s ease, transform 0.2s ease;
        }

        .nav-links a:hover {
            color: var(--accent-2);
            transform: translateY(-2px);
        }

        .theme-toggle {
            width: 2.1rem;
            height: 2.1rem;
            border-radius: 999px;
            border: 1px solid var(--theme-btn-border);
            background: var(--theme-btn-bg);
            color: var(--theme-btn-icon);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .theme-toggle:hover {
            transform: translateY(-2px);
            border-color: var(--accent-2);
        }

        .theme-toggle svg {
            width: 1rem;
            height: 1rem;
        }

        .theme-toggle .icon-moon {
            display: none;
        }

        html[data-theme="light"] .theme-toggle .icon-sun {
            display: none;
        }

        html[data-theme="light"] .theme-toggle .icon-moon {
            display: inline;
        }

        .hero {
            padding: 4.6rem 0 1.6rem;
            text-align: center;
        }

        h1 {
            margin: 0.9rem auto 1rem;
            max-width: 760px;
            font-size: clamp(2rem, 4.9vw, 3.65rem);
            line-height: 1.08;
            letter-spacing: -0.025em;
        }

        .lead {
            max-width: 740px;
            margin: 0 auto 1.7rem;
            color: var(--muted);
            font-size: 1.03rem;
        }

        .download-form {
            width: min(760px, 100%);
            margin: 0 auto 1.2rem;
            display: grid;
            grid-template-columns: 1fr auto;
            gap: 0.75rem;
            padding: 0.75rem;
            border-radius: 14px;
            background: var(--surface-1);
            border: 1px solid var(--panel-border);
        }

        .download-form input {
            width: 100%;
            background: var(--input-bg);
            border: 1px solid var(--input-border);
            color: var(--text);
            border-radius: 10px;
            font-size: 0.96rem;
            padding: 0.86rem 0.9rem;
            outline: none;
            scroll-margin-top: 96px;
        }

        .download-form input:focus {
            border-color: var(--accent-2);
            box-shadow: 0 0 0 2px rgba(56, 240, 203, 0.15);
        }

        .download-form input.error {
            border-color: var(--warning);
        }

        .download-form button,
        .cta {
            border: 0;
            border-radius: 10px;
            padding: 0.86rem 1.2rem;
            font-weight: 700;
            font-size: 0.92rem;
            cursor: pointer;
            color: #03211d;
            background: linear-gradient(120deg, var(--accent), var(--accent-2));
            box-shadow: 0 10px 30px rgba(18, 188, 169, 0.32);
        }

        .cta:hover,
        .download-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(18, 188, 169, 0.45);
        }

        .subtle {
            color: #86a2c4;
            font-size: 0.87rem;
        }

        .status-box {
            width: min(760px, 100%);
            margin: 0.75rem auto 0;
            padding: 0.9rem;
            border-radius: 10px;
            border: 1px solid var(--status-border);
            background: var(--status-bg);
            color: var(--status-text);
            font-size: 0.9rem;
            display: none;
            text-align: left;
        }

        .loading-indicator {
            width: min(760px, 100%);
            margin: 0.75rem auto 0;
            display: none;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            padding: 0.8rem;
            border-radius: 10px;
            border: 1px solid var(--panel-border);
            background: var(--surface-1);
            color: var(--loading-text);
            font-size: 0.9rem;
        }

        .spinner {
            width: 1rem;
            height: 1rem;
            border-radius: 999px;
            border: 2px solid rgba(56, 240, 203, 0.25);
            border-top-color: var(--accent-2);
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .result-actions {
            width: min(760px, 100%);
            margin: 0.85rem auto 0;
            padding: 0.9rem;
            border-radius: 10px;
            border: 1px solid var(--panel-border);
            background: var(--surface-1);
            display: none;
        }

        .result-preview {
            width: 100%;
            border-radius: 10px;
            border: 1px solid var(--input-border);
            margin-bottom: 0.8rem;
            max-height: 260px;
            object-fit: cover;
            background: var(--preview-bg);
        }

        .result-btns {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .btn-secondary {
            border: 1px solid var(--panel-border);
            border-radius: 10px;
            padding: 0.86rem 1.2rem;
            font-weight: 700;
            font-size: 0.92rem;
            cursor: pointer;
            color: var(--btn-secondary-color);
            background: var(--btn-secondary-bg);
        }

        .preview-modal {
            position: fixed;
            inset: 0;
            background: var(--modal-overlay);
            backdrop-filter: blur(6px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 90;
            padding: 1rem;
        }

        .preview-modal-content {
            width: min(880px, 100%);
            background: var(--preview-bg);
            border: 1px solid var(--panel-border);
            border-radius: 14px;
            padding: 0.8rem;
            position: relative;
        }

        .preview-close {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 2rem;
            height: 2rem;
            border-radius: 999px;
            border: 1px solid var(--panel-border);
            background: var(--surface-1);
            color: var(--text);
            font-size: 1.2rem;
            line-height: 1;
            cursor: pointer;
            z-index: 5;
        }

        .preview-player {
            width: 100%;
            border-radius: 10px;
            background: var(--video-bg);
            max-height: 72vh;
        }

        section {
            padding: 3.8rem 0;
        }

        .section-head {
            text-align: center;
            margin-bottom: 2rem;
        }

        .section-head h2 {
            margin: 0.85rem 0 0.7rem;
            font-size: clamp(1.35rem, 3.3vw, 2.1rem);
            letter-spacing: -0.02em;
        }

        .section-head p {
            max-width: 720px;
            margin: 0 auto;
            color: var(--muted);
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1rem;
        }

        .card {
            background: var(--panel);
            border: 1px solid var(--panel-border);
            border-radius: 14px;
            padding: 1rem;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            border-color: rgba(56, 240, 203, 0.4);
        }

        .card h3 {
            margin: 0 0 0.55rem;
            font-size: 1.02rem;
        }

        .feature-icon {
            width: 2.2rem;
            height: 2.2rem;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.75rem;
            background: rgba(37, 212, 194, 0.14);
            border: 1px solid rgba(56, 240, 203, 0.35);
            color: var(--accent-2);
        }

        .feature-icon svg {
            width: 1.1rem;
            height: 1.1rem;
        }

        .card p {
            margin: 0;
            color: var(--muted);
            font-size: 0.92rem;
        }

        .steps .card {
            position: relative;
            padding-top: 2rem;
        }

        .steps {
            padding-top: 1.3rem;
        }

        .step-badge {
            position: absolute;
            top: -12px;
            left: 1rem;
            width: 1.7rem;
            height: 1.7rem;
            border-radius: 999px;
            display: grid;
            place-items: center;
            font-size: 0.82rem;
            font-weight: 700;
            color: #092822;
            background: linear-gradient(120deg, var(--accent), var(--accent-2));
        }

        .step-cta-wrap {
            margin-top: 1.25rem;
            display: flex;
            justify-content: center;
        }

        .step-cta-wrap .cta {
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .two-col {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 1.1rem;
            align-items: stretch;
        }

        .checklist {
            list-style: none;
            margin: 1rem 0 0;
            padding: 0;
            display: grid;
            gap: 0.7rem;
        }

        .checklist li {
            display: flex;
            align-items: center;
            gap: 0.55rem;
            color: var(--text);
            font-size: 0.93rem;
        }

        .dot {
            width: 0.56rem;
            height: 0.56rem;
            border-radius: 999px;
        }

        .dot.good {
            background: var(--good);
        }

        .dot.bad {
            background: var(--bad);
        }

        .media-tabs {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 0.75rem;
            margin-top: 0.8rem;
        }

        .media-tab {
            text-align: center;
            padding: 0.85rem 0.7rem;
            border-radius: 10px;
            border: 1px solid var(--panel-border);
            background: var(--surface-2);
            font-weight: 700;
            font-size: 0.9rem;
        }

        details.card summary {
            cursor: pointer;
            font-weight: 700;
        }

        details.card p {
            margin-top: 0.7rem;
        }

        .faq-list {
            grid-template-columns: 1fr;
            max-width: 900px;
            margin: 0 auto;
        }


        footer {
            padding: 1.1rem 0 2.4rem;
            color: var(--footer-text);
            font-size: 0.85rem;
            border-top: 1px solid var(--header-border);
            margin-top: 2rem;
        }

        .footer-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .footer-links {
            display: flex;
            align-items: center;
            gap: 0.9rem;
            flex-wrap: wrap;
        }

        .footer-links a {
            color: var(--footer-link);
            text-decoration: none;
        }

        .footer-links a:hover {
            color: var(--accent-2);
        }

        @media (max-width: 920px) {
            .grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .two-col {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .nav {
                height: auto;
                padding: 0.75rem 0;
            }

            .brand {
                font-size: 1.6rem;
            }

            .nav-links {
                gap: 0.6rem;
            }

            .nav-links a {
                display: none;
            }

            .download-form {
                grid-template-columns: 1fr;
            }

            .grid,
            .media-tabs {
                grid-template-columns: 1fr;
            }

            .hero {
                padding-top: 4.3rem;
                padding-bottom: 1.1rem;
            }

            h1 {
                font-size: clamp(1.7rem, 8vw, 2.1rem);
                line-height: 1.15;
            }

            .lead {
                font-size: 0.95rem;
                margin-bottom: 1.1rem;
            }

            section {
                padding: 2.6rem 0;
            }

            .card {
                padding: 0.9rem;
            }

            .result-btns .cta,
            .result-btns .btn-secondary {
                width: 100%;
                justify-content: center;
            }

            .footer-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .preview-modal-content {
                padding: 0.65rem;
            }
        }

        @media (max-width: 420px) {
            .download-form {
                padding: 0.6rem;
                gap: 0.6rem;
            }

            .download-form input,
            .download-form button {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="container nav">
            <a href="/" class="brand">Reel<span>Stack</span></a>
            <nav class="nav-links">
                <a href="#download">How It Works</a>
                <a href="#why">Features</a>
                <a href="#faq">FAQ</a>
                <button id="theme-toggle" type="button" class="theme-toggle" aria-label="Toggle theme">
                    <svg class="icon-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="4"></circle>
                        <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"></path>
                    </svg>
                    <svg class="icon-moon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8z"></path>
                    </svg>
                </button>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h1>The Ultimate Instagram Reels & Video Downloader</h1>
                <p class="lead">Paste a public Instagram link and download high quality reels, videos, and photos instantly. </p>
                <form id="download-form" class="download-form" action="#" method="post">
                    <input id="reel-input" type="url" placeholder="Paste Instagram URL here..." aria-label="Instagram URL" required>
                    <button type="submit">Download</button>
                </form>
                <div id="download-status" class="status-box"></div>
                <div id="loading-indicator" class="loading-indicator">
                    <span class="spinner" aria-hidden="true"></span>
                    <span>Fetching video...</span>
                </div>
                <div id="result-actions" class="result-actions">
                    <video id="result-preview" class="result-preview" controls preload="metadata"></video>
                    <div class="result-btns">
                        <button id="download-now-btn" type="button" class="cta">Download Video</button>
                        <button id="preview-btn" type="button" class="btn-secondary">Preview</button>
                    </div>
                </div>
            </div>
        </section>

        <section id="download" class="steps">
            <div class="container">
                <div class="section-head">
                    <span class="pill">3 Easy Steps</span>
                    <h2>How to Download Instagram Content</h2>
                </div>
                <div class="grid">
                    <article class="card">
                        <span class="step-badge">1</span>
                        <h3>Copy Media Link</h3>
                        <p>Open Instagram and copy the URL of the public reel, post, or video.</p>
                    </article>
                    <article class="card">
                        <span class="step-badge">2</span>
                        <h3>Paste Into ReelStack</h3>
                        <p>Insert the link in the input field and tap download.</p>
                    </article>
                    <article class="card">
                        <span class="step-badge">3</span>
                        <h3>Save to Device</h3>
                        <p>Choose the generated file and save directly to your phone or desktop.</p>
                    </article>
                </div>
                <div class="step-cta-wrap">
                    <a href="#reel-input" class="cta">Start Download</a>
                </div>
            </div>
        </section>

        <section id="why">
            <div class="container">
                <div class="section-head">
                    <span class="pill">Why ReelStack</span>
                    <h2>Why ReelStack Is The Best Downloader</h2>
                    <p>Built for speed, quality, and privacy. Everything you need to download social content from public links in one clean tool.</p>
                </div>
                <div class="grid">
                    <article class="card">
                        <div class="feature-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M13 2L3 14h7l-1 8 10-12h-7l1-8z"></path>
                            </svg>
                        </div>
                        <h3>Lightning Fast Downloads</h3>
                        <p>Paste your link and get your file in seconds. No waiting. No buffering.</p>
                    </article>
                    <article class="card">
                        <div class="feature-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="9"></circle>
                                <path d="M12 7v10M8.5 9.5h7M8.5 14.5h7"></path>
                            </svg>
                        </div>
                        <h3>100% Free No Limits</h3>
                        <p>Download as much as you want. No subscriptions, no hidden fees.</p>
                    </article>
                    <article class="card">
                        <div class="feature-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="18" height="14" rx="2"></rect>
                                <path d="M7 9h10M7 13h6"></path>
                                <path d="M9 20h6"></path>
                            </svg>
                        </div>
                        <h3>Original HD Quality</h3>
                        <p>Download content in available source quality for sharp playback.</p>
                    </article>
                    <article class="card">
                        <div class="feature-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="4" y="10" width="16" height="10" rx="2"></rect>
                                <path d="M8 10V7a4 4 0 118 0"></path>
                            </svg>
                        </div>
                        <h3>No Login Required</h3>
                        <p>No sign-ups, no accounts, no personal data needed.</p>
                    </article>
                    <article class="card">
                        <div class="feature-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2.5" y="5" width="13" height="9" rx="1.5"></rect>
                                <rect x="17" y="7" width="4.5" height="10" rx="1"></rect>
                                <path d="M8 17h2"></path>
                            </svg>
                        </div>
                        <h3>Device Friendly</h3>
                        <p>Works on Android, iOS, Windows, and macOS flawlessly in any modern browser. No app installation required.</p>
                    </article>
                    <article class="card">
                        <div class="feature-icon" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="4" width="7" height="7" rx="1"></rect>
                                <rect x="14" y="4" width="7" height="7" rx="1"></rect>
                                <rect x="3" y="13" width="7" height="7" rx="1"></rect>
                                <rect x="14" y="13" width="7" height="7" rx="1"></rect>
                            </svg>
                        </div>
                        <h3>Supports All Public Content</h3>
                        <p>Download reels, videos, photos, and carousel posts from public URLs.</p>
                    </article>
                </div>
            </div>
        </section>

        <section id="faq">
            <div class="container">
                <div class="section-head">
                    <span class="pill">Help Centre</span>
                    <h2>Frequently Asked Questions</h2>
                </div>
                <div class="grid faq-list">
                    <details class="card">
                        <summary>Is ReelStack free to use?</summary>
                        <p>Yes. ReelStack is completely free for downloading public Instagram links. No subscriptions or hidden fees.</p>
                    </details>
                    <details class="card">
                        <summary>Do I need to sign in or create an account?</summary>
                        <p>No. You do not need to sign up or log in to download public content.</p>
                    </details>
                    <details class="card">
                        <summary>Do I need to install an app or extension?</summary>
                        <p>No installation is required. ReelStack works directly in your browser on both desktop and mobile devices.</p>
                    </details>
                    <details class="card">
                        <summary>Does ReelStack work on iPhone, Android, and PC?</summary>
                        <p>Yes. It works on iPhone, iPad, Android, Windows, macOS, and Linux as long as you are using a modern browser.</p>
                    </details>
                    <details class="card">
                        <summary>What type of Instagram content can I download?</summary>
                        <p>You can download public Reels, videos, photos, stories, carousel posts, and IGTV videos.</p>
                    </details>
                    <details class="card">
                        <summary>Can I download private Instagram posts or stories?</summary>
                        <p>No. ReelStack only works with publicly available content. Private, removed, or restricted posts cannot be accessed.</p>
                    </details>
                    <details class="card">
                        <summary>What file formats will my downloads be in?</summary>
                        <p>Videos are downloaded in MP4 format for universal playback, and images are saved as high-quality JPG files.</p>
                    </details>
                    <details class="card">
                        <summary>Will my downloads be in HD quality?</summary>
                        <p>Yes. If the original content is uploaded in high definition, ReelStack preserves the best available quality.</p>
                    </details>
                    <details class="card">
                        <summary>Why is my download not working?</summary>
                        <p>Make sure the link is valid and publicly accessible. Private, deleted, or restricted posts are not supported. If needed, wait a few minutes and try again.</p>
                    </details>
                    <details class="card">
                        <summary>Do you store my downloads or track my activity?</summary>
                        <p>No. ReelStack does not store your media, links, or download history. Your activity remains private.</p>
                    </details>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container footer-row">
            <div>&copy; {{ date('Y') }} ReelStack. All rights reserved.</div>
            <div class="footer-links">
                <a href="{{ route('about') }}">About Us</a>
                <a href="{{ route('privacy') }}">Privacy Policy</a>
                <a href="{{ route('terms') }}">Terms of Use</a>
            </div>
        </div>
    </footer>

    <div id="preview-modal" class="preview-modal" aria-hidden="true">
        <div class="preview-modal-content">
            <button id="preview-close" type="button" class="preview-close" aria-label="Close preview">×</button>
            <video id="preview-player" class="preview-player" controls preload="metadata"></video>
        </div>
    </div>
    <script>
        (() => {
            const form = document.getElementById("download-form");
            const input = document.getElementById("reel-input");
            const statusBox = document.getElementById("download-status");
            const loadingIndicator = document.getElementById("loading-indicator");
            const actionsBox = document.getElementById("result-actions");
            const resultPreview = document.getElementById("result-preview");
            const downloadNowBtn = document.getElementById("download-now-btn");
            const previewBtn = document.getElementById("preview-btn");
            const previewModal = document.getElementById("preview-modal");
            const previewPlayer = document.getElementById("preview-player");
            const previewClose = document.getElementById("preview-close");
            const themeToggle = document.getElementById("theme-toggle");
            const themeColorMeta = document.getElementById("theme-color-meta");
            let pollTimer = null;
            let currentMediaUrl = "";
            let currentTaskId = null;

            const setError = (message) => {
                statusBox.style.display = "block";
                statusBox.textContent = message;
            };

            const clearError = () => {
                statusBox.style.display = "none";
                statusBox.textContent = "";
            };

            const setLoading = (isLoading) => {
                loadingIndicator.style.display = isLoading ? "flex" : "none";
            };

            const setThemeColor = (theme) => {
                if (!themeColorMeta) return;
                themeColorMeta.setAttribute("content", theme === "light" ? "#f5f9ff" : "#081a35");
            };

            const hideActions = () => {
                actionsBox.style.display = "none";
                resultPreview.removeAttribute("src");
                resultPreview.load();
                currentMediaUrl = "";
                currentTaskId = null;
            };

            const showActions = (url, taskId) => {
                currentMediaUrl = url;
                currentTaskId = taskId;
                resultPreview.src = url;
                actionsBox.style.display = "block";
            };

            const openPreview = () => {
                if (!currentMediaUrl) return;
                previewPlayer.src = currentMediaUrl;
                previewModal.style.display = "flex";
                previewModal.setAttribute("aria-hidden", "false");
                previewPlayer.play().catch(() => {});
            };

            const closePreview = () => {
                previewModal.style.display = "none";
                previewModal.setAttribute("aria-hidden", "true");
                previewPlayer.pause();
                previewPlayer.removeAttribute("src");
                previewPlayer.load();
            };

            const stopPolling = () => {
                if (pollTimer) {
                    clearInterval(pollTimer);
                    pollTimer = null;
                }
            };

            const pollTask = (taskId) => {
                pollTimer = setInterval(async () => {
                    try {
                        const response = await fetch(`/api/downloads/${taskId}`);
                        const data = await response.json();

                        if (data.status === "completed") {
                            stopPolling();
                            setLoading(false);
                            if (!data.media_url) {
                                setError("Could not retrieve a downloadable media URL.");
                                return;
                            }
                            showActions(data.media_url, taskId);
                            return;
                        }

                        if (data.status === "failed") {
                            stopPolling();
                            setLoading(false);
                            setError(`Failed: ${data.error || "Could not process this link."}`);
                            return;
                        }
                    } catch (error) {
                        stopPolling();
                        setLoading(false);
                        setError("Could not fetch task status. Please try again.");
                    }
                }, 1500);
            };

            form.addEventListener("submit", async (event) => {
                event.preventDefault();
                stopPolling();
                closePreview();
                hideActions();
                clearError();

                const url = input.value.trim();
                if (!url) {
                    setError("Please paste a valid Instagram URL.");
                    return;
                }
                setLoading(true);

                try {
                    const response = await fetch("/api/downloads", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "Accept": "application/json"
                        },
                        body: JSON.stringify({
                            url
                        })
                    });

                const data = await response.json();
                if (!response.ok) {
                    setLoading(false);
                    const msg = data.message || "Request failed.";
                    setError(msg);
                    return;
                }

                    pollTask(data.id);
                } catch (error) {
                    setLoading(false);
                    setError("Network error while submitting the request.");
                }
            });

            input.addEventListener("keydown", (event) => {
                if (event.key === "Enter") {
                    event.preventDefault();
                    form.requestSubmit();
                }
            });

            downloadNowBtn.addEventListener("click", () => {
                if (!currentTaskId) return;
                window.location.href = `/api/downloads/${currentTaskId}/file`;
            });

            previewBtn.addEventListener("click", openPreview);
            previewClose.addEventListener("click", (event) => {
                event.preventDefault();
                event.stopPropagation();
                closePreview();
            });
            previewModal.addEventListener("click", (event) => {
                if (event.target === previewModal) {
                    closePreview();
                }
            });
            document.addEventListener("keydown", (event) => {
                if (event.key === "Escape" && previewModal.style.display === "flex") {
                    closePreview();
                }
            });

            if (themeToggle) {
                themeToggle.addEventListener("click", () => {
                    const current = document.documentElement.getAttribute("data-theme") || "dark";
                    const next = current === "dark" ? "light" : "dark";
                    document.documentElement.setAttribute("data-theme", next);
                    localStorage.setItem("reelstack-theme", next);
                    setThemeColor(next);
                });
            }
        })();
    </script>

</body>

</html>
