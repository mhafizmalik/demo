# Lab 1 — Basic Docker Commands

**Objective:** Get fluent with the everyday commands: running containers, listing them, looking inside, and managing their lifecycle.

> Docker is already installed (see [INSTALL.md](../INSTALL.md)). Verify first with `docker run hello-world`.

## Steps

```bash
# run an interactive Ubuntu container, look around, then leave
docker run -it ubuntu /bin/bash
#   (inside:) cat /etc/os-release ; ls / ; exit

docker ps          # running containers
docker ps -a       # all containers (incl. stopped)
docker images      # local images
docker pull nginx  # download an image without running it
```

Practise the lifecycle on a named container:

```bash
docker run -d --name web nginx
docker stop web
docker start web
docker restart web
docker exec -it web bash    # open a shell inside it; then: exit
docker rm -f web            # stop and remove
```

## Command reference

| Command | What it does |
|---|---|
| `docker run -it <img> bash` | Start a container interactively |
| `docker ps` / `docker ps -a` | List running / all containers |
| `docker images` | List local images |
| `docker pull <img>` | Download an image |
| `docker stop / start / restart` | Control a container's run state |
| `docker exec -it <name> bash` | Run a command inside a running container |
| `docker rm <name>` (`rm -f`) | Remove a stopped (or running) container |

## Check yourself
- What's the difference between `docker ps` and `docker ps -a`?
- How do you open a shell inside a container that's already running?
