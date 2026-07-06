# Lab 3 — Build Your First Image (Dockerfile)

**Objective:** Package a shell script into your own image using a Dockerfile, then run it.

Files in this folder: `script.sh`, `Dockerfile`.

## Steps

```bash
docker build -t myscript:1.0 .
docker run -it myscript:1.0
```

## Expected result
The container prints `Enter something:`, waits for you to type, and echoes it back. You built and ran your own image.

**Concepts:** each Dockerfile instruction (`FROM`, `WORKDIR`, `COPY`, `RUN`, `CMD`) adds a cached layer. The trailing dot in `docker build` is the *build context* — the folder sent to the daemon. `CMD` is the default command run when the container starts.

## Watch out
Run this one with `-it`: the script reads from STDIN, so without an interactive terminal it exits immediately. The Dockerfile must be named exactly `Dockerfile` unless you pass `-f`.

## Check yourself
- What does each instruction in a Dockerfile create?
- What does the `.` at the end of `docker build` mean?
