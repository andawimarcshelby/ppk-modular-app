# Company-Themed Modular App (Zenith / Aether)

A Laravel + React app with **company-based theming** and a **permission-filtered navigation tree** (system → module → submodule).  
Dockerized for easy setup. Built to the academic spec with step-by-step milestones and GitHub pushes.

---

## 1) Overview

- **Login** with username, password, and company dropdown  
- **Theming** changes background/header by selected company (colors/logo)  
- **Left pane** shows only modules/submodules assigned to the user  
- **Stack:** Laravel 12 (Sanctum), React (Vite + Tailwind), PostgreSQL, Docker Compose

### Brands (Option A: each is a separate company)
- **ZENITH** — primary `#5459AC`, accent `#B2D8CE`
- **AETHER** — primary `#648DB3`, accent `#B2D8CE`
- **ZENITH_CHRONOS** (luxury watches, men) — primary `#52357B`, accent `#5459AC`
- **AETHER_ORNAMENTS** (luxury accessories, women) — primary `#B2D8CE`, accent `#648DB3`

### UI Palette (global)
`#52357B` · `#5459AC` · `#648DB3` · `#B2D8CE`

---

## 2) Folder Structure

