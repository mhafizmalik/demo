# Lab 6 — Data Persistence with Volumes

**Objective:** See that container data is disposable by default, then make it survive with a named volume, and share host files with a bind mount.

## Data is lost without a volume

```bash
docker run -d --name db1 -e MYSQL_ROOT_PASSWORD=secret mysql:8
# ... MySQL writes its data inside the container ...

docker exec -it db1 /bin/bash

# using mysql create sample
mysql -uroot -psecret

mysql> show databases;

mysql> create database lab6;

docker rm -f db1     # data is gone with the container

# ... optional rerun mysql container
docker run -d --name db1 -e MYSQL_ROOT_PASSWORD=secret mysql:8

# ... database gone
```

## Keep data with a named volume

```bash
docker volume create mysqldata
docker run -d --name db2 -e MYSQL_ROOT_PASSWORD=secret \
  -v mysqldata:/var/lib/mysql mysql:8

# remove the container, recreate with the SAME volume:
docker rm -f db2
docker run -d --name db2 -e MYSQL_ROOT_PASSWORD=secret \
  -v mysqldata:/var/lib/mysql mysql:8
# the database is still there — the volume outlived the container
```

## Bind-mount a host folder (live files)

```bash
mkdir -p site && echo '<h1>Hello from a bind mount</h1>' > site/index.html
docker run -d -p 8080:80 -v $(pwd)/site:/usr/share/nginx/html:ro nginx
# open http://localhost:8080 — edit site/index.html and refresh
```

| Type | Stored where | Best for |
|---|---|---|
| Named volume | Managed by Docker on the host | Databases, persistent app data |
| Bind mount | A folder you choose on the host | Local dev — live file editing |

> Windows: from WSL use Linux-style paths like `$(pwd)/site`; from PowerShell use `${PWD}/site`.

## Check yourself
- Where does data go when you remove a container that has no volume?
- When would you use a bind mount instead of a named volume?
