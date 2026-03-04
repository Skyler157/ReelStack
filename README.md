# ReelStack

ReelStack is a Laravel-based Instagram media downloader for public links.  
Users paste an Instagram URL, the backend processes it asynchronously via Apify, and the app returns a downloadable file with preview support.

## Features

- Public Instagram URL input (Reels/videos/photos)
- Async processing with Laravel queues
- Apify integration (`apify/instagram-scraper`)
- Inline preview + modal preview
- Direct file download endpoint
- Light/Dark theme toggle
- FAQ, About, Privacy Policy, Terms pages
- Scheduled cleanup for old tasks/files
- API rate limiting on download creation

## Architecture Overview

1. Frontend submits URL to `POST /api/downloads`
2. App creates a `download_tasks` record with `queued` status
3. Queue worker runs `ProcessDownloadTask`
4. Job calls Apify, fetches media URL, downloads file to local storage
5. Task becomes `completed`
6. Frontend polls `GET /api/downloads/{id}`
7. Download button uses `GET /api/downloads/{id}/file`

## Tech Stack

- Laravel 9
- PHP 8+
- MySQL
- Laravel Queue (`database` driver)
- Apify API
- Blade + vanilla JS

## Local Setup

1. Install dependencies:

```bash
composer install
```

2. Configure environment:

```bash
cp .env.example .env
php artisan key:generate
```

3. Set required `.env` values:

```env
APP_NAME=ReelStack
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=reelstack
DB_USERNAME=root
DB_PASSWORD=

QUEUE_CONNECTION=database
FILESYSTEM_DISK=local

APIFY_TOKEN=your_token
APIFY_ACTOR=apify/instagram-scraper
APIFY_BASE_URL=https://api.apify.com/v2
```

4. Run migrations:

```bash
php artisan migrate
```

5. Run services (separate terminals):

```bash
php artisan serve
php artisan queue:work
php artisan schedule:work
```

## API Endpoints

- `POST /api/downloads`
  - Body: `{ "url": "https://www.instagram.com/reel/..." }`
  - Response: task id + status

- `GET /api/downloads/{downloadTask}`
  - Returns status, media URL, and file readiness

- `GET /api/downloads/{downloadTask}/file`
  - Downloads prepared file to device

## Scheduled Maintenance

Cleanup command:

```bash
php artisan reelstack:cleanup --hours=24
```

Scheduled hourly in `app/Console/Kernel.php`.

## Deploy Notes (Render)

Use three services:

1. Web service (`php artisan serve ...`)
2. Worker service (`php artisan queue:work ...`)
3. Cron job (`php artisan schedule:run` every minute)

Set `APP_ENV=production`, `APP_DEBUG=false`, and provide production DB + Apify variables.

### Render Quick Start (Docker)

This repo includes:

- `Dockerfile`
- `docker/entrypoint.sh`
- `render.yaml` (web + worker + cron blueprint)

Steps:

1. Push code to GitHub.
2. In Render, click **New +** -> **Blueprint**.
3. Select this repo (`Skyler157/ReelStack`).
4. Render will detect `render.yaml` and create:
   - `reelstack-web`
   - `reelstack-worker`
   - `reelstack-cron`
5. Fill all `sync: false` environment variables in Render UI:
   - `APP_KEY`
   - `APP_URL`
   - `DB_*`
   - `APIFY_TOKEN`
6. Deploy.

Important:

- Rotate your Apify token if it was exposed.
- Ensure all services use the same production database.

## Security Notes

- Only supports publicly available Instagram content
- Rotate leaked tokens immediately if exposed
- Add stronger domain validation and abuse controls for production scale
