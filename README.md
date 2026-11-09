# Barangay Bulletin - Purok Flores

**Student Name:** Kauri Lorraine Flores  
**Repository:** LabActivity10-Flores  

---

## 📌 Personalized Parameters
- **Author:** Kagawad Kauri Lorraine Flores (`kagawad.flores@bulletin.test`)
- **Site Title:** Barangay Bulletin - Purok Flores
- **Pinned Post:** Purok Flores Clean-up Drive (Scheduled on 2026-02-04)
- **Custom Category:** Youth & Sports
- **Pagination Number:** 6 posts per page (Last name "Flores" contains 6 letters)

---

## 🚀 How to Run Locally

1. **Clone repository:**
   ```bash
   git clone [https://github.com/klbflores/LabActivity10-Flores.git](https://github.com/klbflores/LabActivity10-Flores.git)
   cd LabActivity10-Flores

2. **Install PHP and Node dependencies:**
    ```bash
    composer install
    npm install

3. **Configure Environment:**
    ```bash
    cp .env.example .env
    php artisan key:generate

    Configure MySQL in ```.env:
    ```DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=barangay_bulletin_db
    DB_USERNAME=root
    DB_PASSWORD=

4. **Run Migrations & Seeders:**
    ```bash
    php artisan migrate:fresh --seed

5. **Start Dev Server:**
    ```bash
    php artisan serve
