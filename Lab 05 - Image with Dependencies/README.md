# Lab 5 — Build an Image with Dependencies

**Objective:** Build a more realistic image that installs system packages and PHP extensions during the build — the kind of Dockerfile a real app needs.

Files in this folder: `index.php`, `Dockerfile`.

## Steps

```bash
docker build -t phpapp:1.0 .
docker run -d -p 8080:80 --name phpapp phpapp:1.0
# open http://localhost:8080
```

## Watch out
Use **straight** double quotes in `ENTRYPOINT`: `["apache2-foreground"]`. Curly/smart quotes (from copying out of a word processor) are invalid JSON and the build or start will fail.

## Why it matters
Put slow, rarely-changing steps (`apt-get install`, `docker-php-ext-install`) **before** `COPY`ing your code. Docker caches each layer, so when you change only `index.php`, the dependency layers are reused and the rebuild is fast.

## Check yourself
- Why install dependencies before copying application code?
- What kind of quotes must `ENTRYPOINT` use, and why?
