---
title: Marp
version: 1.0.0
theme: laravel
header: Pemrograman Web (Minggu 2)
footer: https://github.com/universitas-ibbi/ibbi-si-v-m1
paginate: true
marp: true
---

## Struktur Direktori Laravel

Berikut penjelasan beberapa folder utama:

- app/
- config/
- database/
- public/
- resources/
- routes/
- storage/
- vendor/

---

##  app/

Berisi semua logika aplikasi seperti controller, middleware, dan model.

---

## config/

Berisi file konfigurasi untuk berbagai komponen Laravel.

----

## database/

Berisi file terkait database seperti migrasi dan seeder.

----

## public/

Berisi file yang dapat diakses publik seperti file CSS, JavaScript, dan gambar.

----

## resources/

Berisi view dan asset seperti CSS dan JavaScript sebelum diproses.

----

## routes/

Berisi file yang mengatur routing aplikasi.

----

## storage/

Tempat penyimpanan file sementara seperti cache, log, dan file yang di-upload.

----

## vendor/

Berisi semua dependensi yang diinstal melalui Composer.

----

## Routing Dasar dan Pengenalan ke Controller

Routing di Laravel menghubungkan URL yang diakses pengguna dengan logika yang ada di Controller.

---

## Membuat Route Dasar

File konfigurasi routing utama terletak di routes/web.php. Di dalamnya, Anda dapat mendefinisikan route yang merespon permintaan HTTP. Contoh route dasar:

```php
Route::get('/halo', function () {
    return 'Halo, Dunia!';
});
```

---

## Mengenalkan Controller

Controller adalah kelas yang mengelola logika aplikasi. Untuk membuat controller, gunakan perintah Artisan:

```php
php artisan make:controller NamaController
```

---

## 

Setelah controller dibuat, Anda bisa menambahkan metode untuk menangani permintaan. Contoh controller sederhana:

```php
class HaloController extends Controller {
    public function index() {
        return view('halo');
    }
}
```

--- 

## 

Kemudian, hubungkan controller dengan route:
```php
Route::get('/halo', [HaloController::class, 'index']);
```