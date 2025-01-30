---
title: Blade Templating dan Migration
version: 1.0.0
theme: laravel
header: Pemrograman Web (Minggu 4)
footer: https://github.com/universitas-ibbi/ibbi-si-v-m1
paginate: true
marp: true
---

<!-- _class: lead -->

# Blade Templating dan Migration

---

## Pengenalan Blade Templating

- `Blade` adalah template engine bawaan Laravel yang menyediakan sintaks sederhana untuk membuat tampilan.
- Fitur `Blade` meliputi inheritance, loops, conditionals, dan komponen yang memungkinkan pengembangan tampilan yang efisien.
- File `Blade` menggunakan ekstensi .blade.php.

---

## Sintaks Dasar Blade

Menampilkan Data:
```php
{{ $variable }}
```

Blade secara otomatis melindungi aplikasi dari XSS (Cross-Site Scripting) dengan escaping output secara default.

```php
{!! $variable !!}
```

---

## Komentar di Blade
Komentar di dalam file Blade tidak akan tampil di HTML yang dihasilkan:

```php
{{-- Ini adalah komentar di Blade --}}
```

---

## Inheritance dan Template Layout

Konsep inheritance dalam Blade memungkinkan pembuatan template induk yang bisa diwariskan ke halaman lain.


---

## Membuat Layout Utama

```html
<!-- resources/views/layouts/main.blade.php -->
<html>
<head>
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
</body>
</html>
```

---

## Menggunakan Layout 

```php
@extends('layouts.main')

@section('title', 'Judul Halaman')

@section('content')
    <p>Ini adalah konten halaman.</p>
@endsection
```

---

## Control Structures

Blade mendukung berbagai struktur kontrol seperti `if`, `for`, `foreach`, `while`.

```php
@if($user)
    <p>Selamat datang, {{ $user->name }}</p>
@else
    <p>Silakan login</p>
@endif
```

Looping dengan Foreach:
```php
@foreach($items as $item)
    <p>{{ $item }}</p>
@endforeach
```

---


## Include

Blade mendukung penggunaan include untuk memisahkan bagian-bagian tampilan yang berulang.

```php
@include('partials.header')
```

---

## Blade dan PHP

Kamu bisa menggunakan kode PHP murni dalam template Blade dengan directive @php:

```php
@php
    $value = 10;
@endphp

<p>Nilai: {{ $value }}</p>
```


--- 

## Blade Loops

Blade menyediakan fitur tambahan dalam loop seperti `@break`, `@continue`, dan variabel loop seperti `$loop` untuk mendapatkan informasi tambahan selama iterasi:

```php
@foreach($items as $item)
    @if($loop->first)
        <p>Ini adalah item pertama</p>
    @endif

    @if($loop->last)
        <p>Ini adalah item terakhir</p>
    @endif
@endforeach
```

---

## Pengenalan Migration di Laravel

- Migration adalah cara untuk mengelola versi dan perubahan skema basis data secara terstruktur dan terkontrol.
- Migration memberikan cara yang efisien untuk membuat tabel, mengubah kolom, dan menghapus tabel tanpa harus menulis query SQL manual.
- Semua migrasi disimpan di direktori `database/migrations`.

---

## Membuat Migration

Untuk membuat migration baru, gunakan perintah artisan:

```sh
php artisan make:migration create_users_table
```

---

## Contoh struktur file migration:

```php
Schema::create('users', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamps();
});

```

---

## Menjalankan Migration

Menjalankan semua migration yang ada menggunakan perintah berikut:

```sh
php artisan migrate
```

Rollback Migration (kembali ke migrasi sebelumnya):
```sh
php artisan migrate:rollback
```

---

## Modifikasi Tabel Menggunakan Migration

Migration juga bisa digunakan untuk memodifikasi struktur tabel yang sudah ada:

```sh
php artisan make:migration add_profile_photo_to_users_table --table=users
```

Contoh menambahkan kolom baru:
```php
Schema::table('users', function (Blueprint $table) {
    $table->string('profile_photo')->nullable();
});
```

---

## Pengenalan Eloquent ORM

- Eloquent adalah ORM (Object-Relational Mapping) di Laravel yang menyediakan cara untuk berinteraksi dengan basis data menggunakan model dan objek, bukan query SQL.
- Setiap tabel di basis data memiliki model Eloquent yang terkait, yang bertanggung jawab untuk berinteraksi dengan tabel tersebut.

---

## Membuat Model Eloquent

Membuat model baru menggunakan Artisan:

```sh
php artisan make:model User
```

Model User secara default akan terhubung dengan tabel users di basis data.

---

<!-- 
_class: lead 
_paginate: skip
-->

# Operasi Dasar Menggunakan Eloquent


---

## Menyimpan Data

```php
$user = new User;
$user->name = 'John Doe';
$user->email = 'john@example.com';
$user->save();
```

## Mengambil Data

```php
$user = User::find(1); // Menemukan user dengan id 1
$allUsers = User::all(); // Mengambil semua data user
```

---

## Mengupdate Data

```php
$user = User::find(1);
$user->email = 'newemail@example.com';
$user->save();
```

## Menghapus Data

```php
$user = User::find(1);
$user->delete();
```

---

## Filtering Data:

```php
$users = User::where('status', 'active')->get();
```

## Mengambil Data Tertentu

```php
$users = User::select('name', 'email')->get();
```

--- 

##  Mass Assignment
Laravel mendukung mass assignment, yang memungkinkan kamu mengisi beberapa atribut model sekaligus:

```php
User::create([
    'name' => 'Jane Doe',
    'email' => 'jane@example.com'
]);
```

Agar mass assignment berfungsi, kamu perlu mendefinisikan kolom mana yang boleh diisi menggunakan properti $fillable pada model:
```php
protected $fillable = ['name', 'email', 'password'];
```
