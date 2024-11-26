---
title: Authentication
version: 1.0.0
theme: laravel
header: Authentication
footer: https://github.com/universitas-ibbi/ibbi-si-v-m1
paginate: true
marp: true
---

<!-- 
_class: lead 
_paginate: skip
-->

# Authentication

---

## Pengantar Autentikasi di Laravel

Autentikasi adalah proses verifikasi identitas pengguna sebelum memberikan akses ke sistem. Laravel menyediakan sistem autentikasi bawaan yang dapat diimplementasikan dengan mudah menggunakan package `laravel/ui`. 

---

Fitur yang disediakan meliputi: 
- Login: Mengautentikasi pengguna berdasarkan kredensial.  
- Register: Menambahkan pengguna baru ke database.  
- Reset Password: Mengirimkan tautan reset password melalui email.

---

## Instalasi `laravel/ui`

Instal package:
```bash
composer require laravel/ui
```

---

Generate scaffold autentikasi:
```bash
php artisan ui bootstrap --auth
npm install && npm run build
```

---

## File yang dihasilkan:
- Views: `resources/views/auth/` (login, register, passwords).  
- Controller: `Auth\LoginController`, `Auth\RegisterController`, dll.  
- Routing: Ditambahkan di `routes/web.php`.

---

## Auth Route

Setelah scaffold, rute bawaan akan ditambahkan:
```php
Auth::routes();
```

---

## Contoh Rute:
- `/login` – Form login.  
- `/register` – Form register.  
- `/password/reset` – Form reset password.

---

## Proteksi Halaman dengan Middleware

Tambahkan middleware `auth` di rute:
```php
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');
```

Jika pengguna belum login, mereka akan diarahkan ke `/login`.

---

## Mendapatkan Data Pengguna yang Terautentikasi

```php
use Illuminate\Support\Facades\Auth;
 
// Retrieve the currently authenticated user...
$user = Auth::user();
 
// Retrieve the currently authenticated user's ID...
$id = Auth::id();
```

---

## Menentukan Apakah Pengguna Saat Ini Sudah Login

```php
use Illuminate\Support\Facades\Auth;
 
if (Auth::check()) {
    // The user is logged in...
}
```