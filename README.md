# ClassXpert

## Introduction

ClassXpert adalah platform pembelajaran dinamis yang membantu pengguna untuk mempelajari IT, coding, dan UI/UX design. Setiap kelas dirancang dengan materi berbentuk video pembelajaran yang menarik, kuis interaktif, dan kesempatan untuk mendapatkan sertifikat setelah berhasil menyelesaikan suatu kelas.

Dengan ClassXpert, pengguna dapat belajar kapan saja dan di mana saja, sehingga lebih mudah untuk menyesuaikan pembelajaran dengan jadwal pengguna. Untuk meningkatkan pengalaman pengguna, ClassXpert juga menyediakan berbagai artikel yang terkait dengan topik kursus. Artikel-artikel ini memberikan wawasan dan pengetahuan praktis yang berharga untuk mendukung pertumbuhan dan pemahaman skill.

## ClassXpert Documentation

[ClassXpert Documentation](https://youtu.be/VEqdzHgNepw)

## ClassXpert Website

[ClassXpert Website](https://dev.unimasoft.id/ClassXpert/public)

## Installation

Make sure you have Laravel 11 installed

### Step 1: Clone the Repository

```bash
git clone https://github.com/dimas551/ClassXpert.git ClassXpert
cd ClassXpert
```

### Step 2: Install Dependencies

```bash
composer install
```

### Step 3: Set Up Environment File

```bash
php -r "file_exists('.env') || copy('.env.example', '.env');"
```

### Step 4: Configure the Database

Open the `.env` file and update the database connection settings:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=classXpert
DB_USERNAME=root
DB_PASSWORD=
```

### Step 5: Generate Application Key

```bash
php artisan key:generate
```

### Step 6: Run Database Migrations

```bash
php artisan migrate
```

### Step 7: Seed the Database

```bash
php artisan db:seed
```

### Step 8: Link data from storage

```bash
php artisan storage:link
```

### Step 9: Start the Development Server

```bash
php artisan serve
```

Your ClassXpert application should now be up and running. You can access it at `http://127.0.0.1:8000`.

### Step 10: Tes Login

```bash
Email: admin@example.com
Password: 12345678
```
