<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Terms of Use | ReelStack</title>
    <meta name="theme-color" content="#081a35" id="theme-color-meta">
    <script>
        (() => {
            const storedTheme = localStorage.getItem("reelstack-theme");
            const prefersLight = window.matchMedia && window.matchMedia("(prefers-color-scheme: light)").matches;
            const theme = storedTheme || (prefersLight ? "light" : "dark");
            document.documentElement.setAttribute("data-theme", theme);
        })();
    </script>
    <style>
        :root {
            --bg: #061121;
            --text: #e9f3ff;
            --muted: #9fb2cc;
            --link: #38f0cb;
            --panel: rgba(10, 29, 58, 0.72);
            --border: rgba(137, 173, 219, 0.25);
        }

        html[data-theme="light"] {
            --bg: #f5f9ff;
            --text: #10233f;
            --muted: #4f6787;
            --link: #127f73;
            --panel: rgba(255, 255, 255, 0.92);
            --border: rgba(117, 147, 190, 0.3);
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        .container {
            width: min(900px, 92%);
            margin: 32px auto;
            padding: 40px;
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 14px;
        }

        a { color: var(--link); text-decoration: none; }
        h1 { margin-top: 0; }
        p { color: var(--muted); }
    </style>
</head>
<body>
    <main class="container">
        <p><a href="{{ route('home') }}">&larr; Back to ReelStack</a></p>
        <h1>Terms of Use</h1>
        <p>By using ReelStack, you agree to use the service only for lawful purposes and in accordance with these terms.</p>
        <p>ReelStack is provided solely for downloading publicly available Instagram content that you have the legal right to access and use. You agree to download only content that you own or have permission to use. Users are solely responsible for ensuring that their use of downloaded media complies with applicable copyright laws, intellectual property rights, and platform policies.</p>
        <p>ReelStack supports public content links only. Private, restricted, removed, or otherwise inaccessible content cannot and will not be accessed through this service. Any attempt to bypass content restrictions or download private media may constitute a violation of these terms.</p>
        <p>This service is provided "as is," without warranties of any kind, either express or implied. ReelStack disclaims liability for misuse of the service or for any violations of third-party rights resulting from the use of downloaded content.</p>
        <p>By continuing to use ReelStack, you acknowledge and agree to these terms.</p>
    </main>
    <script>
        (() => {
            const meta = document.getElementById("theme-color-meta");
            const theme = document.documentElement.getAttribute("data-theme") || "dark";
            if (meta) meta.setAttribute("content", theme === "light" ? "#f5f9ff" : "#081a35");
        })();
    </script>
</body>
</html>
