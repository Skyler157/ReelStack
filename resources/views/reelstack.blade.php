<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ReelStack | Instagram Reels & Video Downloader</title>
    <meta name="description" content="ReelStack is a fast Instagram Reels and Video downloader. Save high-quality content from public links in seconds.">
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
            background: radial-gradient(circle at 20% -10%, #163467 0%, transparent 45%),
                        radial-gradient(circle at 80% 0%, #0f2d57 0%, transparent 42%),
                        linear-gradient(180deg, var(--bg-1), var(--bg-0) 32%, #061121 100%);
            line-height: 1.55;
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
            background: rgba(5, 14, 29, 0.72);
            border-bottom: 1px solid rgba(112, 150, 198, 0.16);
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
            color: white;
            letter-spacing: 0.01em;
            font-size: 1.1rem;
        }

        .brand span {
            color: var(--accent-2);
        }

        .nav-links {
            display: flex;
            gap: 1.2rem;
            font-size: 0.92rem;
        }

        .nav-links a {
            color: var(--muted);
            text-decoration: none;
        }

        .hero {
            padding: 5.2rem 0 4rem;
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
            background: rgba(10, 29, 58, 0.72);
            border: 1px solid var(--panel-border);
        }

        .download-form input {
            width: 100%;
            background: rgba(7, 19, 39, 0.85);
            border: 1px solid rgba(145, 180, 220, 0.22);
            color: var(--text);
            border-radius: 10px;
            font-size: 0.96rem;
            padding: 0.86rem 0.9rem;
            outline: none;
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

        .subtle {
            color: #86a2c4;
            font-size: 0.87rem;
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
        }

        .card h3 {
            margin: 0 0 0.55rem;
            font-size: 1.02rem;
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
            color: #d9ecff;
            font-size: 0.93rem;
        }

        .dot {
            width: 0.56rem;
            height: 0.56rem;
            border-radius: 999px;
        }

        .dot.good { background: var(--good); }
        .dot.bad { background: var(--bad); }

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
            background: rgba(10, 31, 57, 0.58);
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

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 1rem;
            margin-top: 1.1rem;
        }

        .stat {
            text-align: center;
            padding: 1rem;
            border-radius: 12px;
            border: 1px solid var(--panel-border);
            background: rgba(11, 35, 64, 0.72);
        }

        .stat strong {
            display: block;
            font-size: 1.65rem;
            color: var(--accent-2);
            margin-bottom: 0.2rem;
        }

        footer {
            padding: 1.1rem 0 2.4rem;
            color: #7e99b7;
            font-size: 0.85rem;
            border-top: 1px solid rgba(135, 171, 219, 0.16);
            margin-top: 2rem;
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
            .nav-links {
                display: none;
            }

            .download-form {
                grid-template-columns: 1fr;
            }

            .grid,
            .media-tabs,
            .stats {
                grid-template-columns: 1fr;
            }

            .hero {
                padding-top: 4.3rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container nav">
            <a href="/" class="brand">Reel<span>Stack</span></a>
            <nav class="nav-links">
                <a href="#why">Features</a>
                <a href="#download">How It Works</a>
                <a href="#faq">FAQ</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <span class="pill">Fast • No Watermark • Secure</span>
                <h1>The Ultimate Instagram Reels & Video Downloader</h1>
                <p class="lead">Paste a public Instagram link and download high-quality reels, videos, and photos in seconds. ReelStack works on phone, tablet, and desktop.</p>
                <form class="download-form" action="#" method="post">
                    <input type="url" placeholder="Paste Instagram URL here..." aria-label="Instagram URL">
                    <button type="button">Download</button>
                </form>
                <p class="subtle">No login required. ReelStack only supports publicly available content.</p>
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
                    <article class="card"><h3>Fast Processing</h3><p>Optimized extraction pipeline for instant link parsing and quick downloads.</p></article>
                    <article class="card"><h3>Anonymous & Private</h3><p>No mandatory login and no user tracking dashboards for basic usage.</p></article>
                    <article class="card"><h3>High-Resolution Media</h3><p>Download content in available source quality for sharp playback.</p></article>
                    <article class="card"><h3>Device Friendly</h3><p>Works on Android, iOS, Windows, and macOS with responsive UX.</p></article>
                    <article class="card"><h3>All Public Formats</h3><p>Supports reels, videos, photos, and carousel posts from public URLs.</p></article>
                    <article class="card"><h3>Simple Workflow</h3><p>Copy link, paste into ReelStack, and save media with minimal clicks.</p></article>
                </div>
            </div>
        </section>

        <section id="download" class="steps">
            <div class="container">
                <div class="section-head">
                    <span class="pill">3 Easy Steps</span>
                    <h2>How to Download Instagram Content</h2>
                    <p>Use this quick flow to grab content safely and efficiently.</p>
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
                        <p>Insert the link in the input field and trigger download processing.</p>
                    </article>
                    <article class="card">
                        <span class="step-badge">3</span>
                        <h3>Save to Device</h3>
                        <p>Choose the generated file and save directly to your phone or desktop.</p>
                    </article>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="section-head">
                    <span class="pill">Comparison</span>
                    <h2>Online Downloader vs Mobile Apps</h2>
                </div>
                <div class="two-col">
                    <article class="card">
                        <h3>ReelStack (Online)</h3>
                        <ul class="checklist">
                            <li><span class="dot good"></span>No installation required</li>
                            <li><span class="dot good"></span>Works across all devices</li>
                            <li><span class="dot good"></span>No account required for public links</li>
                            <li><span class="dot good"></span>Quick browser-based workflow</li>
                        </ul>
                    </article>
                    <article class="card">
                        <h3>Typical Downloader Apps</h3>
                        <ul class="checklist">
                            <li><span class="dot bad"></span>Requires install and updates</li>
                            <li><span class="dot bad"></span>Can include ads and bloat</li>
                            <li><span class="dot bad"></span>Often device/platform-limited</li>
                            <li><span class="dot bad"></span>May request excessive permissions</li>
                        </ul>
                    </article>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="section-head">
                    <span class="pill">Media Types</span>
                    <h2>Supported Instagram Media Types</h2>
                </div>
                <div class="media-tabs">
                    <div class="media-tab">Reels</div>
                    <div class="media-tab">Videos</div>
                    <div class="media-tab">Stories</div>
                    <div class="media-tab">Photos</div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="section-head">
                    <span class="pill">Social Proof</span>
                    <h2>What Our Users Say</h2>
                    <p>Used by creators, marketers, and teams who need reliable access to downloadable media from public links.</p>
                </div>
                <div class="stats">
                    <div class="stat"><strong>50K+</strong>Monthly active users</div>
                    <div class="stat"><strong>100K+</strong>Downloads processed</div>
                    <div class="stat"><strong>4.9/5</strong>Average satisfaction score</div>
                </div>
            </div>
        </section>

        <section id="faq">
            <div class="container">
                <div class="section-head">
                    <span class="pill">Help</span>
                    <h2>Detailed FAQ & Troubleshooting</h2>
                </div>
                <div class="grid">
                    <details class="card" open>
                        <summary>Is ReelStack free to use?</summary>
                        <p>Yes. Core downloading features for public Instagram links are free.</p>
                    </details>
                    <details class="card">
                        <summary>Do I need to sign in?</summary>
                        <p>No sign-in is required for basic public-link downloads.</p>
                    </details>
                    <details class="card">
                        <summary>Why is my download not working?</summary>
                        <p>Check that the URL is public and valid, then retry. Private or removed posts are not supported.</p>
                    </details>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <div>© {{ date('Y') }} ReelStack. Download responsibly and respect creators' rights.</div>
        </div>
    </footer>
</body>
</html>
