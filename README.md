# Docker Hands-On Labs

A one-day, hands-on Docker course — **9:00 am to 5:00 pm** — that takes you from your
first containers to orchestrating with Docker Swarm. You learn by typing and running
commands, not by watching slides.

> **Before the training day:** install Docker by following **[INSTALL.md](INSTALL.md)**.
> Installation is a prerequisite — we start at 9:00 am with a quick check that everyone's
> Docker works, then go straight into the labs.

All labs are **self-contained**: they use public Docker Hub images (nginx, ubuntu, php,
mysql, wordpress, phpmyadmin, mailhog), so nothing depends on an internal server.

## Labs

| # | Lab | You'll be able to... |
|---|-----|----------------------|
| 1 | [Basic Docker Commands](Lab%2001%20-%20Basic%20Commands/) | Run, list, inspect, and manage containers |
| 2 | [Docker Run & Port Mapping](Lab%2002%20-%20Run%20and%20Port%20Mapping/) | Serve an app and reach it from the browser |
| 3 | [Build Your First Image](Lab%2003%20-%20Build%20Your%20First%20Image/) | Write a Dockerfile and build an image |
| 4 | [Web App Image](Lab%2004%20-%20Web%20App%20Image/) | Use env vars and a custom port in an image |
| 5 | [Image with Dependencies](Lab%2005%20-%20Image%20with%20Dependencies/) | Install packages/extensions in a build |
| 6 | [Data Persistence with Volumes](Lab%2006%20-%20Volumes/) | Keep data across container removal |
| 7 | [Docker Compose](Lab%2007%20-%20Docker%20Compose/) | Run a multi-service app from one file |
| 8 | [WordPress Stack](Lab%2008%20-%20WordPress%20Stack/) | Wire app + DB + admin with volumes |
| 9 | [Docker Swarm](Lab%2009%20-%20Docker%20Swarm/) | Deploy, scale, self-heal, rolling-update |

## Schedule (9:00 am – 5:00 pm)

| Time | Session |
|------|---------|
| 09:00 – 09:15 | Welcome & verify your setup |
| 09:15 – 09:45 | Docker concepts (image vs container, architecture) |
| 09:45 – 10:25 | Lab 1 — Basic commands |
| 10:25 – 11:05 | Lab 2 — Run & port mapping |
| 11:05 – 11:20 | Break |
| 11:20 – 12:00 | Lab 3 — Build your first image |
| 12:00 – 12:45 | Lab 4 — Build a web app image |
| 12:45 – 13:00 | Q&A / buffer |
| 13:00 – 14:00 | Lunch |
| 14:00 – 14:40 | Lab 5 — Image with dependencies |
| 14:40 – 15:15 | Lab 6 — Data persistence with volumes |
| 15:15 – 15:30 | Break |
| 15:30 – 16:05 | Lab 7 — Docker Compose |
| 16:05 – 16:30 | Lab 8 — Full WordPress stack |
| 16:30 – 16:55 | Lab 9 — Docker Swarm |
| 16:55 – 17:00 | Wrap-up & closing |

## How each lab works
Every lab folder has a `README.md` with the Objective, Steps, and Expected result, plus any
files you need (`Dockerfile`, `script.sh`, `index.php`, `compose.yaml`) ready to run. Type
the commands yourself — the muscle memory is the point.

## Cleanup (careful — deletes things)

```bash
docker swarm leave --force          # if a swarm is still active
docker compose down -v              # in any compose folder you used
docker rm -f $(docker ps -aq)       # remove all containers
docker system prune -a --volumes    # reclaim disk (images, networks, volumes)
```

## Where to go next
- Multi-stage builds to shrink production images
- Image security: scanning, minimal/official base images, non-root users
- `docker stack deploy` to run Compose files on a Swarm
- **Kubernetes** as a dedicated, more advanced course once Swarm feels comfortable
- Docs: <https://docs.docker.com> • Free practice: <https://labs.play-with-docker.com>
