# Aetheris Cloud — hybrid deployment

This deployment keeps the Appwrite source tree intact and separates the Console web process from the Appwrite server stack.

## Current deployment layout

- **GitHub:** this repository is the source of truth.
- **Render — Console origin:** the standalone application in `apps/console`, built with its repository Dockerfile. Docker build context: `apps/console`.
- **Vercel — public entry:** the project rooted at `deploy/vercel-edge` reverse-proxies requests to the Render Console origin. It does not rebuild the Console's Bun SSR server.
- **Render — engine:** the existing `frankenstein-engine` service remains a separate service and is deployed from its own repository.
- **Appwrite API:** the Console defaults to the public Appwrite Cloud API endpoint. This is a managed Appwrite backend, not a self-hosted Aetheris Appwrite cluster.

## Important platform boundary

The repository's root `Dockerfile` builds the Appwrite PHP API image. The root `docker-compose.yml` runs a multi-service stack (API, Console, Realtime, workers, database engines, Redis, ClickHouse, executor, gateway, browser and supporting services). It also mounts the host Docker socket for parts of the execution stack.

A single Render Docker web service is not a replacement for this Compose deployment. Do not deploy the root Appwrite Dockerfile as if it were the complete Appwrite backend. A complete self-hosted Appwrite installation needs a Docker host / Kubernetes environment that supports the documented orchestration, persistent storage, networking and runtime dependencies.

## Render Console service

- Repository: `Frankenstein-Labs/aetheris`
- Branch: `main`
- Dockerfile: `apps/console/Dockerfile`
- Docker context: `apps/console`
- Runtime: Bun 1.4, port 3000 (Render supplies the runtime port)
- Health endpoint: `/health`
- Public configuration:
  - `VITE_APPWRITE_ENDPOINT=https://cloud.appwrite.io/v1`
  - `VITE_CONSOLE_PROFILE=cloud`
  - `VITE_COMPANY_NAME=Aetheris Cloud`

Only public configuration belongs in `VITE_*` variables. Never put server API keys, passwords or private tokens in them.

## Vercel edge project

Create the Vercel project from this repository with root directory `deploy/vercel-edge`. The `vercel.json` rewrite forwards the complete request path to the Render Console origin. Keep the Render origin URL in sync if the Render service is renamed.

## Production readiness gates

1. Confirm the Render Console deployment is healthy at `/health`.
2. Confirm the Vercel rewrite serves the Console and preserves nested paths and query strings.
3. Confirm sign-in, OAuth callbacks, cookies and redirects use the intended public hostname.
4. Verify the Appwrite backend account, project, OAuth providers, allowed origins and email delivery.
5. Before claiming an independent Aetheris BaaS, provision and validate a dedicated Appwrite backend. The default `cloud.appwrite.io` endpoint is Appwrite Cloud, not an Aetheris-owned cluster.
6. Keep production secrets in provider secret stores; rotate any real value accidentally committed to Git.

## Cost and availability

The Render service was created on the Free plan. Free services can sleep while idle and may have cold-start delays. Persistent storage, sustained availability and production capacity must be reviewed before public launch. No paid resource is created by this deployment manifest.
