---
title: Factory, Seeder and Pagination
version: 1.0.0
theme: laravel
header: Pemrograman Web (Minggu 6)
footer: https://github.com/universitas-ibbi/ibbi-si-v-m1
paginate: true
marp: true
---

<!-- 
_class: lead 
_paginate: skip
-->

# Factory, Seeder and Pagination

---

## Pengantar Factory dan Seeder di Laravel

Factory dan Seeder di Laravel adalah fitur yang memudahkan kita untuk menyiapkan data buatan (dummy data) secara otomatis untuk keperluan pengembangan dan pengujian aplikasi.

---

## Factory 

digunakan untuk membuat data tiruan yang dapat kita tentukan sendiri.

---

## Seeder 

digunakan untuk mengisi tabel database dengan data awal atau data tetap yang akan sering digunakan, seperti daftar peran atau kategori.

---

## Pembuatan dan Penggunaan Factory

Factory di Laravel dibuat sebagai kelas yang mendefinisikan atribut model dengan nilai acak atau default. Setiap model dapat memiliki satu factory, dan Factory ini menggunakan `Faker` untuk membuat data acak.

Cara Membuat Factory:
```bash
php artisan make:factory UserFactory --model=User
```

Kode di atas akan menghasilkan `UserFactory` di `database/factories`. 

---

Contoh kode pada factory:

```php
namespace Database\Factories;
 
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
 
class UserFactory extends Factory
{
    protected static ?string $password;
 
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
```
---

## Penggunaan Faker untuk Data Buatan

Faker adalah pustaka di Laravel yang digunakan oleh Factory untuk menghasilkan data acak seperti nama, alamat, email, dan nomor telepon.

[https://github.com/FakerPHP/Faker](https://github.com/FakerPHP/Faker)

---

Contoh Penggunaan Faker:
```php
class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->productName(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(1000, 100000),
        ];
    }
}
```

---

Dengan penggunaan Faker, kita bisa membuat data buatan yang lebih realistis untuk keperluan pengujian.

---

Menggunakan Factory:
```php
// Membuat satu user
User::factory()->create();

// Membuat 10 user
User::factory()->count(10)->create();
```

---

## Menjalankan Factory dengan Seeder

Seeder dibuat untuk mengisi database dengan data awal atau data tertentu. Seeder dapat menggunakan Factory untuk mengisi data dengan skala besar.

---

Cara Membuat Seeder:
```bash
php artisan make:seeder UserSeeder
```

---

Isi dari `UserSeeder`:

```php
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)->create();
    }
}
```

---

Menjalankan Seeder:
```bash
php artisan db:seed --class=UserSeeder
```

Atau jika ingin menjalankan semua seeder yang terdaftar di `DatabaseSeeder`:
```bash
php artisan db:seed
```

---

## Menggunakan Database Seeders untuk Pengisian Awal Database

Seeder dapat diatur agar saling memanggil, memungkinkan kita mengisi beberapa tabel dalam satu kali eksekusi.

---

Contoh `DatabaseSeeder`:
```php
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ProductSeeder::class,
            CategorySeeder::class,
        ]);
    }
}
```

---

Menjalankan Seeder Utama:
```bash
php artisan db:seed
```

Perintah ini akan menjalankan semua seeder yang ada di `DatabaseSeeder`.

---

## Studi Kasus: Mengisi Database dengan Data Awal

Sebagai contoh, kita ingin mengisi tabel `users` dan `posts` dengan data awal.

1. UserSeeder: Membuat 10 data user.
2. PostSeeder: Membuat 20 data post dan mengaitkannya dengan data user.

---

```php
use App\Models\User;
use App\Models\Post;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)->create();
    }
}

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::factory()->count(20)->create([
            'user_id' => User::all()->random()->id,
        ]);
    }
}
```

---

## Pengantar Pagination di Laravel

*Pagination* adalah cara membagi data menjadi beberapa halaman untuk meningkatkan kecepatan akses data dan kenyamanan pengguna dalam membaca data yang banyak. Laravel menyediakan fitur pagination bawaan untuk menangani pembagian data ini.

Contoh kasus umum pagination adalah menampilkan daftar produk, di mana setiap halaman hanya menampilkan 10 produk.

---

## Pagination pada Eloquent ORM

Pada Eloquent, pagination dilakukan dengan metode `paginate()` langsung pada model.

**Contoh:**
```php
$posts = Post::paginate(5);
```

---

## Custom Pagination dengan `simplePaginate`

`simplePaginate()` mirip dengan `paginate()` tetapi hanya memberikan link navigasi untuk halaman berikutnya dan sebelumnya, tanpa informasi jumlah halaman total, yang berguna untuk menghemat sumber daya.

**Contoh:**
```php
$posts = Post::simplePaginate(10);
```

Pagination ini cocok untuk data yang terus bertambah, seperti log aktivitas atau notifikasi.

---

## Menampilkan Link Pagination di View
Untuk menampilkan link pagination di view, kita bisa menggunakan `$data->links()` pada Blade template.

**Contoh dalam Blade:**
```php
@foreach ($posts as $post)
    <p>{{ $post->title }}</p>
@endforeach

{{ $posts->links() }}
```

`$posts->links()` secara otomatis membuat link navigasi untuk halaman.

