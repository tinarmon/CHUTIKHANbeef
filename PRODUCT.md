# Product

<!-- impeccable:product-schema 1 -->

## Platform

web

## Users

Corporate Management Trainee and Strategy/Operations recruiters scanning candidates in under 60 seconds to decide whether to shortlist for interviews.

## Product Purpose

Reposition an engineering-background graduate (Chutikhan Chomklang) into business-track roles (Commercial Strategy, Commercial Operations, and Management Trainee programs) by presenting operating roles, commercial case studies, competition wins, and leadership scope clearly and fast. Success means a recruiter understands commercial capability and clicks Email, LinkedIn, or Resume within 60 seconds.

## Positioning

Bridges hands-on systems execution (automated billing, hospital-scale rollout, clinical kiosks) with measurable business outcomes (intake throughput, billing accuracy, and go-to-market commercialization).

## Operating Context

Self-deployed, local-first Laravel 13 + TALL stack (Tailwind CSS v4, Alpine.js, Livewire v4) portfolio (`/` active draft, `/apple` archived draft). All content and image paths live in `config/portfolio.php` so the owner updates copy and photos directly without a database or CMS.

## Capabilities and Constraints

- Single-page portfolio with an interactive navigation drawer (Alpine.js) and awards switcher (Livewire).
- No database required at runtime (`SESSION_DRIVER=file`, `CACHE_STORE=file`).
- Local Windows PHP environment blocks `curl`, `pdo_sqlite`, `sqlite3`, and `zip` extensions via Application Control; runtime and test suite run without SQLite.

## Evidence on Hand

- **Confirmed real (preserve):** Roles and organizations (`HealthLink Wellness`, `Surasawat Residential Ventures`, `Suratech Analytics`, `SUT Healthcare Operations`), awards (`ENGi Research to Market (R2M) 1st Place`, `C2C TechX`), education (`Suranaree University of Technology`), and university leadership initiatives (`ENGi Run`, `Battle of AI`, `Special Talk Seminar`, `Graduation Arch`, `Class Secretary`, `TCAS Admissions`, `Student Ambassador`, `C Camp 2025`, `Leadership Fellowship`, `Inter-Faculty Sports Events`).
- **Placeholders (awaiting owner replacement in `config/portfolio.php` — do not treat as verified proof):** Business KPI figures (`฿4.2M+`, percentage lifts), contact email/LinkedIn/Resume URLs, and all 24 image slots (`IMG-HERO-01`, `IMG-CAP-01`, `IMG-EXP-01..04`, `IMG-CASE-01..06`, `IMG-AWD-01..02`, `IMG-LEAD-01..10`).

## Product Principles

- Scannable in under 60 seconds for time-pressed corporate recruiters.
- Minimal copy: one crisp line per point with zero walls of prose.
- Honest separation between verified experience/awards and placeholder metrics or photos.
- Lightweight, self-hostable TALL stack with single-file content maintenance.

## Accessibility & Inclusion

Standard web accessibility (WCAG AA text contrast, full keyboard navigation, semantic landmarks, and reduced-motion support).
