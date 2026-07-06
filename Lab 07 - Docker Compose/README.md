# Lab 7 — Docker Compose Basics

**Objective:** Describe a multi-service application in a single file and bring it up with one command.

File in this folder: `compose.yaml` (all public images).

## Steps

```bash
docker compose up -d
docker compose ps
docker compose logs -f db        # Ctrl+C to stop following
# phpMyAdmin: http://localhost:8080  (server: db, user: root, pass: genpass)
# MailHog UI: http://localhost:8025
docker compose down              # stop & remove (add -v to drop volumes)
```

## Why it matters
Compose creates one network for the project, so `phpmyadmin` reaches the database simply as the hostname `db` — Docker's built-in DNS uses the service name. That's why `PMA_HOST` is just `db`, no IP address.

## Watch out
YAML is indentation-sensitive: spaces only, never tabs. Modern Docker uses `docker compose` (a space); the old `docker-compose` (hyphen) is the legacy tool. The `version:` top line of old files is no longer needed.

## Check yourself
- How does phpMyAdmin find the database without an IP address?
- Which command starts the whole stack, and which tears it down?
