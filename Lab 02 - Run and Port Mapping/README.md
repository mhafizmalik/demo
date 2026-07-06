# Lab 2 — Docker Run & Port Mapping

**Objective:** Run a web server in the background and reach it from your browser by mapping a host port to the container's port.

## Steps

```bash
docker run -d -p 8080:80 --name web nginx
docker ps                       # STATUS shows it running
# open http://localhost:8080 in your browser
docker logs web                 # see the access log
```

Flags: `-d` runs detached (background); `--name web` gives a friendly name; `-p 8080:80` maps host port 8080 to container port 80 — the order is **host:container**.

Run a second copy on a different host port, then clean up:

```bash
docker run -d -p 8081:80 --name web2 nginx
# both http://localhost:8080 and http://localhost:8081 work
docker rm -f web web2
```

## Watch out
Two containers cannot share the same host port. `port is already allocated` means 8080 is taken — pick another host port (e.g. `8081:80`). Host port first, container port second.

## Check yourself
- In `-p 8080:80`, which number is the host and which is the container?
- Why can't two containers both publish host port 8080?
