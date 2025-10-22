# syntax=docker/dockerfile:1

# Node LTS for Vite React dev server
FROM node:20-alpine

# Working directory (bind-mounted by docker-compose)
WORKDIR /app

# Helpful defaults for dev inside container
ENV CI=true \
    NPM_CONFIG_FUND=false \
    NPM_CONFIG_AUDIT=false

# Expose Vite dev port (docs only; compose publishes it)
EXPOSE 3000

# No CMD here — docker-compose provides:
# sh -lc "npm install && npm run dev -- --host 0.0.0.0 --port 3000"
