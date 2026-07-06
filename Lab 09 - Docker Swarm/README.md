# Lab 9 — Docker Swarm

**Objective:** Turn Docker into an orchestrator: deploy a service with several replicas, scale it, watch it self-heal, and roll out an update with no downtime.

## Initialise the swarm & deploy a service

```bash
docker swarm init                 # this machine becomes a manager
docker node ls

docker service create --name web -p 8080:80 --replicas 3 nginx
docker service ls                 # desired vs running replicas
docker service ps web             # the 3 individual tasks
# open http://localhost:8080 — Swarm load-balances across the replicas
```

Multi-node (reference): the manager runs `docker swarm init --advertise-addr <MANAGER-IP>` and prints a join command; each worker runs `docker swarm join --token <TOKEN> <MANAGER-IP>:2377`. A single-node swarm is enough to learn every concept here.

## Scale & self-heal

```bash
docker service scale web=5
docker service ps web             # now 5 tasks

docker ps                         # copy ONE web container's ID
docker rm -f <container_id>       # kill a replica
docker service ps web             # Swarm has already started a replacement
```

You declared a desired state (5 replicas). When you killed one, Swarm started a new task to get back to 5, with no action from you. That self-healing is the whole point of an orchestrator.

## Rolling update & rollback

```bash
docker service update --image nginx:1.27 \
  --update-parallelism 1 --update-delay 10s web
docker service ps web             # tasks update a batch at a time
docker service rollback web       # undo to the previous image
```

## Cleanup

```bash
docker service rm web
docker swarm leave --force        # leave the single-node swarm
```

## Watch out
`docker run` does NOT use the swarm — it always starts a plain local container. Orchestrated work uses `docker service` (and `docker stack` for Compose-style files).

## Check yourself
- What's the difference between a service and a task?
- You set 4 replicas and kill one container — what does Swarm do, and why?
- Which command performs a rolling update, and how do you undo it?
