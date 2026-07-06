# Pre-Training Installation Guide

**Please complete this BEFORE the training day.** The course is fully hands-on and starts at
9:00 am — Docker must already be working on your laptop. Follow the section for **your**
operating system; you do not need both. Takes about 30–45 minutes and needs admin rights + internet.

---

## Part A — Windows: Docker Desktop

**Requirements:** Windows 10 (64-bit, 21H2+) or Windows 11, hardware virtualization enabled, admin rights.

1. **Install WSL 2.** Open **PowerShell as Administrator** and run, then **restart** your PC:

   ```powershell
   wsl --install
   ```

2. **Download Docker Desktop** from <https://www.docker.com> (Products → Docker Desktop).
3. **Run the installer** (`Docker Desktop Installer.exe`). Keep **"Use WSL 2 instead of Hyper-V"** checked. Finish and restart if asked.
4. **Start Docker Desktop** from the Start menu, accept the agreement, and wait until the whale icon shows **"Engine running"**.
5. **Verify** in PowerShell or a WSL Ubuntu terminal:

   ```bash
   docker --version
   docker run hello-world
   ```

*If it goes wrong:* a WSL 2 / virtualization error means you need to re-run step 1, restart, and
enable virtualization in the BIOS (look for "Intel VT-x", "AMD-V", or "SVM").

---

## Part B — Ubuntu: Convenience Script

1. **Update your system:**

   ```bash
   sudo apt update && sudo apt upgrade -y
   ```

2. **Download and run the official convenience script:**

   ```bash
   curl -fsSL https://get.docker.com -o get-docker.sh
   sudo sh ./get-docker.sh
   ```

3. **Run Docker without sudo** (then log out/in, or run `newgrp docker`):

   ```bash
   sudo usermod -aG docker $USER
   newgrp docker
   ```

4. **Verify:**

   ```bash
   docker --version
   docker run hello-world
   ```

*If it goes wrong:* "permission denied while trying to connect to the Docker daemon socket"
means the group change hasn't taken effect — log out and back in (or reboot), then try again.

---

## Part C — Verify & Try a Few Commands (both platforms)

```bash
docker --version                 # the installed version
docker run hello-world           # prints "Hello from Docker!"

# run a real web server, then open http://localhost:8080
docker run -d -p 8080:80 --name web nginx
docker ps                        # see it running
docker stop web && docker rm web # clean up
```

| Command | In plain English |
|---|---|
| `docker run <image>` | Download (if needed) and start a container |
| `docker ps` | Show containers running now |
| `docker images` | Show images stored on your machine |
| `docker stop <name>` | Stop a running container |
| `docker rm <name>` | Delete a stopped container |

## Pre-Training Checklist
- [ ] `docker --version` shows a version number
- [ ] `docker run hello-world` prints "Hello from Docker!"
- [ ] `docker run -d -p 8080:80 --name web nginx` works and http://localhost:8080 shows the Nginx page
- [ ] Free Docker Hub account created at <https://hub.docker.com>
- [ ] A code editor installed (VS Code recommended)

See you at the training!
