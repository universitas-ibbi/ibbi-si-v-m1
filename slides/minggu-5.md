---
title: Validation
version: 1.0.0
theme: laravel
header: Pemrograman Web (Minggu 5)
footer: https://github.com/universitas-ibbi/ibbi-si-v-m1
paginate: true
marp: true
---

<!-- 
_class: lead 
_paginate: skip
-->

# Validation

---

## Pengenalan Validasi di Laravel

---

### Apa itu validasi?  

Validasi adalah proses memastikan bahwa data yang diterima dari pengguna sesuai dengan aturan yang ditentukan sebelum disimpan ke dalam database atau diproses lebih lanjut.

---

### Mengapa validasi penting dalam aplikasi web?  

Validasi sangat penting untuk menjaga keamanan aplikasi dan mencegah kesalahan data yang dapat merusak sistem. Dengan validasi, data yang masuk bisa dipastikan valid dan sesuai ekspektasi.

---

### Konsep validasi di Laravel  

Laravel menyediakan mekanisme validasi yang kuat dan mudah digunakan melalui metode built-in seperti `validate()` dan Form Request. Validasi bisa diterapkan di controller, Form Request, atau bahkan secara manual.

---

## Metode Validasi pada Laravel

---

### Validasi menggunakan objek `Request`  

Laravel memungkinkan validasi langsung melalui objek `Request` yang dikirimkan ke controller. Kamu bisa memanfaatkan `$request->validate()` untuk memvalidasi input.

---

### Validasi menggunakan metode `validate()`  

Metode `validate()` adalah metode yang paling sering digunakan di Laravel. Kamu bisa mendefinisikan aturan validasi langsung di dalam controller. Contoh:
```php
$validated = $request->validate([
    'email' => 'required|email',
    'password' => 'required|min:6'
]);
```

---


## Aturan Validasi Bawaan Laravel

Laravel memiliki banyak aturan validasi bawaan seperti:
- `required`: Wajib diisi.
- `email`: Harus format email.
- `unique`: Data harus unik di database.
- `min`, `max`: Batas minimum dan maksimum panjang karakter atau nilai angka.

---

Contoh penggunaan:
```php
$request->validate([
    'username' => 'required|unique:users|min:5',
    'age' => 'required|numeric|min:18',
]);
```

---

## Pesan Error Validasi

--- 

### Cara menampilkan pesan error validasi  

Laravel secara otomatis menampilkan pesan error jika validasi gagal. Kamu bisa mengakses pesan tersebut di view dengan menggunakan `@error` directive atau metode `withErrors()`.

---

```php
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
```

---

### The `@error` Directive

```php
@error('title')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
```

---

### Repopulating Forms

```php
<input type="text" name="title" value="{{ old('title') }}">
```

---

### Kustomisasi pesan error  

Kamu dapat mengubah pesan error default Laravel dengan menambahkan pesan spesifik di file `lang/en/validation.php` atau langsung di dalam metode `validate()`:

```php
$request->validate([
    'email' => 'required|email',
], [
    'email.required' => 'Email wajib diisi!',
    'email.email' => 'Format email tidak valid!',
]);
```

---

## Validasi dengan Array dan Objek Kompleks

---

### Cara memvalidasi input array  

Laravel mendukung validasi terhadap array input. Misalnya, untuk memvalidasi beberapa item dalam array:
```php
$request->validate([
    'items.*.name' => 'required',
    'items.*.price' => 'required|numeric',
]);
```
