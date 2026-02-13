# Laravel Admin User Management System

A professional **AdminLTE-style User Management System** built with **Laravel**, featuring authentication, role-based access, AJAX search, status management, and CSV export. This project is portfolio-ready and suitable for real-world admin panels.

---

## 🚀 Features

* 🔐 Authentication (Laravel Breeze)
* 👤 Admin-only User Management
* 🔍 Live AJAX Search (No page reload)
* 📊 Dashboard Cards (Total / Active / Inactive Users)
* 🔄 User Status Toggle (Active / Inactive)
* ✏ Edit & 🗑 Delete Users
* ⬇ Export Users to CSV
* 📄 Pagination
* 🎨 Clean AdminLTE-style UI (Bootstrap)

---

## 🛠 Tech Stack

* **Laravel** (Backend Framework)
* **Blade** (Templating Engine)
* **Bootstrap 5** (UI)
* **AJAX / jQuery** (Live Search)
* **MySQL** (Database)

---

## 📂 Project Setup

### 1️⃣ Clone Repository

```bash
git clone https://github.com/your-username/laravel-admin-user-management.git
cd laravel-admin-user-management
```

### 2️⃣ Install Dependencies

```bash
composer install
npm install && npm run dev
```

### 3️⃣ Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

Configure `.env` database credentials.

### 4️⃣ Migrate Database

```bash
php artisan migrate
```

### 5️⃣ Run Project

```bash
php artisan serve
```

Visit: **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

---

## 🔐 Admin Access

* Login with an **Admin account**
* Non-admin users are restricted
* Admin middleware protects routes

---

## 📸 Screenshots

*Add screenshots here (Dashboard, User Table, Search, Export)*

---

## 📦 Export Feature

* Export all users as **CSV file**
* Accessible from Admin panel

---

## 🧠 Learning Outcomes

* Laravel authentication & middleware
* AJAX integration with Laravel
* Clean admin UI design
* Real-world CRUD operations

---

## 📌 Future Improvements

* Bulk delete users
* Role & permission management
* SweetAlert confirmations
* Server-side DataTables

---

## 👤 Author

**Samina Parveen**
Laravel Developer

---

## ⭐ Support

If you like this project, give it a ⭐ on GitHub!
