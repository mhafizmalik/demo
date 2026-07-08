# Lab 6 — Data Persistence with Volumes

**Objective:** See that container data is disposable by default, then make it survive with a named volume, and share host files with a bind mount.

## Data is lost without a volume

```bash
docker run -d --name db1 -e MYSQL_ROOT_PASSWORD=secret mysql:8
# wait ~20s for MySQL to finish starting (check with: docker logs db1)

# open a shell inside the container and create a sample database
docker exec -it db1 /bin/bash

mysql -uroot -psecret

mysql> show databases;

mysql> create database lab6;

mysql> exit
exit    # leave the container shell

# now destroy the container — its writable layer (and MySQL's data) goes with it
docker rm -f db1

# run a "new" container with the same name and check again
docker run -d --name db1 -e MYSQL_ROOT_PASSWORD=secret mysql:8

docker exec -it db1 mysql -uroot -psecret -e "show databases;"

# lab6 is gone — this is a fresh container with a fresh writable layer
```

## Keep data with a named volume

```bash
docker volume create mysqldata
docker run -d --name db2 -e MYSQL_ROOT_PASSWORD=secret -v mysqldata:/var/lib/mysql mysql:8
# ... MySQL now writes its data into the volume ...

docker exec -it db2 /bin/bash

# using mysql create sample
mysql -uroot -psecret

mysql> show databases;

mysql> create database lab6;

docker rm -f db2     # container is gone, but the volume survives

# ... recreate with the SAME volume:
docker run -d --name db2 -e MYSQL_ROOT_PASSWORD=secret -v mysqldata:/var/lib/mysql mysql:8

docker exec -it db2 /bin/bash

mysql -uroot -psecret

mysql> show databases;

# ... lab6 is still there — the volume outlived the container
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
