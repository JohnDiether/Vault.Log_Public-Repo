# Vault.Log | Source Code Mockup
> **A representation of [vaultlogapp.cu.ma] architecture.**

This repository serves as a functional **mockup and architectural blueprint** for the Vault.Log platform. Designed as a strict, developer-only but accessible environment, it is built for a closed, friends-only network rather than a full-scale public social application. This mockup demonstrates how the system's layers—from session security to UI interaction—operate within a "barebones" environment, allowing for exploration without exposing production-grade configurations.

### ⚙️ Architecture: The Shell & The Core
To maintain strict security and adhere to the principle that privacy is the baseline, the application utilizes a **shell architecture**. 
* **The Public Shell:** The web root (`public_domain`) acts only as a gateway. Files like `app.php` serve as the frontend shell, handling the user interface and basic requests.
* **The Protected Core:** The actual main application, API logic (`api.php`, `vault.php`), and configurations managing the database and link storage (`db.php`, `aws.phar`) reside entirely in the `modules/` directory **outside of public access**. The backend securely processes data and sends it to the frontend shell, preventing direct unauthorized file execution.

### 🛠️ Key Features
* **Session Guard:** Concept logic for automated 1-hour inactivity timeouts and activity heartbeat tracking.
* **Signal Integrity:** A JavaScript-based "Offline Lock" mechanism that simulates real-time connectivity detection and service restoration.
* **V.A. (Vault Aesthetics) Engine:** The structural CSS/JS framework for handling "Glassmorphism," terminal animations, and low-latency performance modes.
* **Centralized Storage UI:** Frontend components pre-structured for S3-compatible object storage and secure file-pathing logic.
* **Modular API Blueprint:** Structural examples of how the platform handles asynchronous requests (AJAX) for public logs and administrative tasks.

### ⚠️ Operational Disclaimers & Guidelines
Because Vault.Log is currently a limited-resource, strictly developmental project running on free hosting, the following realities apply:
* **Data Security:** While built with a privacy-first mindset, this environment is *not* secured at an enterprise or commercial company level. **We strongly recommend using "DIY" or dummy data for exploration.** Do not upload or input real, sensitive personal information.
* **Service & Uptime:** As we are operating on free hosting and do not have the resources to commit to this as a full-time application, we cannot guarantee full uptime or continuous service.
* **Liability:** We assume no liability for data loss, breaches, or service interruptions. 
* **Zero Tolerance Policy:** Absolutely no illegal content or activity whatsoever is permitted on this platform.

### 🔐 Security & Privacy Note
This is a **Public Mirror and Mockup**. To maintain our baseline of "Privacy as a Standard," sensitive backend logic has been abstracted. However, some static and media components (like `fail/`, `ico/`, `sw.js`) are preserved as is, as they do not affect the core application logic.

The following have been abstracted for security:
* Production-specific database schemas and credentials.
* Private directory structures located outside the public web root.
* Specific S3 bucket identifiers and access keys.
* Production-level administrative security flags.

### 🌐 Website Preview
The following screenshots shows the live files:
* Homepage `index.php`
<img width="1920" height="1080" alt="Screenshot 2026-05-08 123508" src="https://github.com/user-attachments/assets/95fcec84-09f2-4eab-80a8-6942a0dd7c9c" />

---
* Login `index.php`
<img width="1920" height="1080" alt="Screenshot 2026-05-08 123520" src="https://github.com/user-attachments/assets/917e49ae-1f07-4380-a3b3-2699ed95cbdd" />

---
* Redirect `redirect.php`
<img width="1920" height="1080" alt="Screenshot 2026-05-08 123538" src="https://github.com/user-attachments/assets/2545fa57-a12e-488d-9017-7d0c91b0fd1f" />

---
* Application `app.php` & `vault.php`
> **`app.php` is the shell as discussed its job is just to give input and output for `vault.php`**
<img width="1920" height="1080" alt="Screenshot 2026-05-08 123557" src="https://github.com/user-attachments/assets/34daf1b0-ca40-40d4-8013-cff7cea38633" />





### 📂 Directory Structure Blueprint
```text
webroot/
├── public_domain/            # Public Section
│   ├── fail/                 # Error pages
│   ├── ico/                  # Favicon and icons
│   ├── app.php               # Frontend shell / access point of vault.php
│   ├── index.php             # Home/login page
│   ├── redirect.php          # Redirects to app.php
│   ├── sw.js                 # Service worker
│   └── [other media files]
└── modules/                  # The Protected Core (Outside public access)
    ├── app/
    │   ├── api.php           # Core backend logic
    │   └── vault.php         # Main application
    └── configs/
        ├── db.php            # Database management
        ├── aws.phar          # S3 configs
        └── config.php        # Link storage configs
```
