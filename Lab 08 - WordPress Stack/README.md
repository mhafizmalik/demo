# Lab 8 — Compose: A Full WordPress Stack

**Objective:** Run a complete, real application — WordPress with a MySQL database and phpMyAdmin — using volumes for persistence and a dedicated network.

File in this folder: `compose.yaml` (official public images).

## Steps

```bash
docker compose up -d
# WordPress:  http://localhost:8888   (finish the 5-minute install)
# phpMyAdmin: http://localhost:8881

docker compose down        # stops containers but KEEPS the named volumes
docker compose up -d       # your WordPress site and data are still there
```

## Why it matters
Two volumes do the work: `db_data` keeps the database, `wp_data` keeps WordPress files/uploads. Because they're named volumes, `docker compose down` removes the containers but not the data. (`docker compose down -v` WOULD delete the volumes.)

## Watch out
First boot takes a minute while MySQL initialises; WordPress may show a database error until the DB is ready — wait and refresh. `depends_on` controls start order, not readiness.

## Check yourself
- Which volumes persist data, and what do they each hold?
- Why does your site survive a `docker compose down` (without `-v`)?
