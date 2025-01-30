---
title: Relationships
version: 1.0.0
theme: laravel
header: Relationships
footer: https://github.com/universitas-ibbi/ibbi-si-v-m1
paginate: true
marp: true
---

<!-- 
_class: lead 
_paginate: skip
-->

# Relationships

---

## Pengantar Relationships

- Laravel Eloquent menyediakan cara mudah untuk mengatur hubungan antar tabel database, seperti *one-to-one*, *one-to-many*, dan lainnya.
- Relationship membantu query data antar tabel yang saling berhubungan.

Contoh:
- Tabel `users` memiliki hubungan dengan tabel `profiles` (One-to-One).
- Tabel `posts` memiliki banyak `comments` (One-to-Many).

---

## One-to-One Relationship

Hubungan *one-to-one* adalah ketika satu baris di tabel pertama hanya memiliki satu baris yang terkait di tabel kedua.

---

Contoh:
Model `User` dan `Profile`:
```php
// Model User
public function profile()
{
    return $this->hasOne(Profile::class);
}

// Model Profile
public function user()
{
    return $this->belongsTo(User::class);
}
```
---

Penggunaan:
```php
// Mendapatkan profile dari user
$user = User::find(1);
$profile = $user->profile;

// Membuat profile untuk user
$user->profile()->create([
    'bio' => 'This is a bio.',
]);
```

---

## One-to-Many Relationship

Hubungan *one-to-many* adalah ketika satu entitas memiliki banyak entitas terkait.

Contoh:
Model `Post` dan `Comment`:
```php
// Model Post
public function comments()
{
    return $this->hasMany(Comment::class);
}

// Model Comment
public function post()
{
    return $this->belongsTo(Post::class);
}
```

---

Penggunaan:
```php
// Mendapatkan semua komentar untuk sebuah post
$post = Post::find(1);
$comments = $post->comments;

// Menambahkan komentar ke post
$post->comments()->create([
    'content' => 'This is a comment.',
]);
```

---

## Many-to-Many Relationship

Hubungan *many-to-many* melibatkan tabel pivot untuk menghubungkan dua entitas.

Contoh:
Model `User` dan `Role`:
```php
// Model User
public function roles()
{
    return $this->belongsToMany(Role::class);
}

// Model Role
public function users()
{
    return $this->belongsToMany(User::class);
}
```

---

Migration tabel pivot `role_user`:
```php
Schema::create('role_user', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->foreignId('role_id')->constrained()->onDelete('cascade');
    $table->timestamps();
});
```

---

Penggunaan:
```php
// Menambahkan role ke user
$user = User::find(1);
$user->roles()->attach([1, 2]);

// Mendapatkan roles dari user
$roles = $user->roles;
```

---