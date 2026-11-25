# Chutikhan Chomklang — Business Portfolio

Laravel 13 + Livewire 4 + Tailwind CSS v4 + Alpine.js portfolio featuring the primary **NASA** theme (`/`) and archived **Apple** draft (`/apple`).

## Quick Start (Docker)

```bash
docker compose up -d --build
```

- `/` — NASA draft (`/nasa` redirects `301` to `/`)
- `/apple` — Apple draft (enabled when `PORTFOLIO_ENABLE_APPLE=true` or in `local`/`testing`)
- `/up` — Healthcheck endpoint

Default compose mapping publishes `0.0.0.0:8080 -> 8000`. Override host/port or bind localhost for SSH forwarding:

```bash
BIND_HOST=127.0.0.1 PORT=8080 docker compose up -d --build
ssh -N -L 8080:127.0.0.1:8080 <user>@<host-ip>
```

## Customization & Env

- Content, KPIs, and image slot `src` paths: [config/portfolio.php](config/portfolio.php)
- Resume download file: `public/resume/chutikhan-chomklang-resume.pdf`
- Environment variables (see [.env.example](.env.example)): `PORTFOLIO_ENABLE_APPLE`, `PORTFOLIO_EMAIL`, `PORTFOLIO_LINKEDIN`, `PORTFOLIO_RESUME_URL`, `TRUSTED_PROXIES`, `APP_KEY`

## Tests

```bash
php artisan test
```
