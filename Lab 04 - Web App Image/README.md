# Lab 4 — Build a Web App Image (env vars + custom port)

**Objective:** Containerize a small PHP page whose background colour is set by an environment variable, served by Apache on a custom port (5000).

Files in this folder: `index.php`, `Dockerfile`.

## Steps

```bash
docker build -t colorapp:1.0 .
docker run -d -p 8080:5000 -e BACKGROUND_COLOR=blue --name colorapp colorapp:1.0
# open http://localhost:8080  -> blue background

# change the colour without rebuilding:
docker rm -f colorapp
docker run -d -p 8080:5000 -e BACKGROUND_COLOR=green --name colorapp colorapp:1.0
```

## Why it matters
`EXPOSE` documents the port the app listens on inside the container; `-p` actually publishes it to the host. `-e` passes an environment variable the app reads at runtime — the same image produces different output with no rebuild.

> Note: the container port is **5000** here, so the mapping is `8080:5000` (not `8080:80`).

## Check yourself
- What's the difference between `EXPOSE` in the Dockerfile and `-p` at run time?
- How did you change the page colour without rebuilding the image?
