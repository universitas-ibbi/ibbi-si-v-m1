---
title: Marp
version: 1.0.0
theme: laravel
header: Pemrograman Web (Minggu 2)
footer: https://github.com/universitas-ibbi/ibbi-si-v-m1
paginate: true
marp: true
---

<!-- _class: lead
_paginate: skip -->

# Pendahuluan HTML

--- 

## Definisi dan Fungsi HTML 

HTML (HyperText Markup Language) adalah bahasa markup standar untuk membuat halaman web. HTML digunakan untuk membangun struktur halaman web dengan menggunakan elemen-elemen seperti paragraf, gambar, dan tautan.

---

## Sejarah HTML dan Perkembangannya

HTML pertama kali dibuat oleh Tim Berners-Lee pada 1991 dan terus berkembang hingga HTML5, yang membawa banyak fitur baru seperti video, audio, dan elemen 
semantik.

---

## Struktur Dasar Dokumen HTML

HTML terdiri dari elemen-elemen yang dikelilingi oleh **tag**. Setiap dokumen HTML memiliki struktur dasar sebagai berikut:

---

## Contoh Struktur Dasar Dokumen HTML

```html
<!DOCTYPE html>
<html>
    <head>
    <title>Judul Halaman</title>
    </head>
    <body>
    <h1>Selamat Datang di Website</h1>
    <p>Ini adalah paragraf pertama.</p>
    </body>
</html>
```

---

## Penjelasan Elemen Dasar Dokumen HTML

- **DOCTYPE**: Mendeklarasikan tipe dokumen.
- **`<html>`**: Tag pembungkus utama dari seluruh elemen HTML.
- **`<head>`**: Bagian ini berisi metadata, seperti judul halaman (`<title>`) dan link ke file CSS atau skrip.
- **`<body>`**: Di sinilah konten yang terlihat oleh pengguna ditempatkan, seperti teks, gambar, dan lainnya.

---

## Elemen Teks dan Paragraf

Elemen teks digunakan untuk menampilkan teks di halaman web.

--- 

## Heading

Heading digunakan untuk judul atau subjudul pada halaman.

 ```html
 <h1>Judul Besar</h1>
 <h2>Subjudul</h2>
 <p>Ini adalah paragraf biasa.</p>
 ```

--- 

## Pemformatan Teks

- **Bold**: `<strong>teks tebal</strong>`
- **Italic**: `<em>teks miring</em>`

 ```html
 <p><strong>Ini teks tebal</strong> dan <em>ini teks miring</em>.</p>
 ```

---

## Elemen Daftar (List)

HTML mendukung dua jenis daftar: berurut dan tidak berurut.

--- 

# Unordered List (daftar tidak berurut)
  
```html
<ul>
  <li>Item 1</li>
  <li>Item 2</li>
</ul>
```

---

## Ordered List (daftar berurut)

```html
<ol>
  <li>Item pertama</li>
  <li>Item kedua</li>
</ol>
```

--- 

## Elemen Tautan (Link)

Hyperlink memungkinkan pengguna menavigasi antara halaman atau situs yang berbeda. Tautan dibuat dengan tag `<a>`.

```html
<a href="https://example.com" target="_blank">Kunjungi Situs</a>
```

- **Atribut `href`**: Menentukan URL tujuan.
- **Atribut `target="_blank"`**: Membuka tautan di tab baru.

---

## Elemen Gambar
Elemen `<img>` digunakan untuk menampilkan gambar di halaman web. Atribut `src` menentukan sumber gambar.

```html
<img src="gambar.jpg" alt="Deskripsi gambar" width="300" height="200">
```

- **`alt`**: Deskripsi alternatif untuk aksesibilitas dan SEO.
- **`width` dan `height`**: Menentukan ukuran gambar.

---

## Elemen Media

**Video**:
  ```html
  <video controls>
    <source src="video.mp4" type="video/mp4">
  </video>
  ```

**Audio**:
  ```html
  <audio controls>
    <source src="audio.mp3" type="audio/mpeg">
  </audio>
  ```

Atribut `controls` menampilkan kontrol play, pause, dan volume.

---

## Formulir HTML (HTML Forms)

Formulir digunakan untuk menerima input dari pengguna. Tag `<form>` berfungsi sebagai wadah, sementara elemen input seperti tombol dan kotak teks ada di dalamnya.

```html
<form action="/submit" method="POST">
    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama">
    <button type="submit">Kirim</button>
</form>
```

- **`action`**: URL yang menerima data.
- **`method`**: Menentukan metode HTTP (GET atau POST).

--- 

## Tabel HTML
Tabel digunakan untuk menampilkan data dalam bentuk baris dan kolom.

```html
<table border="1">
  <tr>
    <th>Nama</th>
    <th>Usia</th>
  </tr>
</table>
```

- **`<th>`**: Kolom heading.
- **`<td>`**: Sel untuk data.

---

## 10. Atribut Global pada HTML

Atribut global dapat digunakan pada hampir semua elemen HTML.

- **`class`**: Menentukan kelas CSS untuk styling.
- **`id`**: Identifier unik untuk elemen, berguna untuk seleksi dan manipulasi.
- **`style`**: Menyisipkan gaya CSS secara inline.

```html
<p id="intro" class="highlight" style="color: blue;">Ini teks dengan atribut global.</p>
```

---

## Elemen Blok vs. Elemen Inline
- **Elemen Blok**: Mengambil seluruh lebar layar (seperti `<div>`, `<p>`, `<h1>`). Contoh:
 ```html
 <div>Ini elemen blok.</div>
 ```

- **Elemen Inline**: Hanya mengambil ruang yang dibutuhkan (seperti `<span>`, `<a>`, `<img>`). Contoh:
 ```html
 <span>Ini elemen inline.</span>
 ```

---

## 12. Semantic HTML

Elemen semantik memberikan makna yang lebih spesifik pada konten, sehingga lebih mudah dibaca oleh mesin pencari dan membantu aksesibilitas.

```html
<article>
  <header>
    <h1>Judul Artikel</h1>
  </header>
  <p>Ini adalah isi artikel.</p>
</article>
```

--- 

## Atribut Aksesibilitas (Accessibility)
   
Aksesibilitas penting untuk pengguna dengan kebutuhan khusus. Menggunakan atribut `alt` pada gambar dan atribut `aria-*` untuk komponen interaktif membantu aksesibilitas.

```html
<img src="gambar.jpg" alt="Deskripsi gambar untuk pembaca layar">
```

---

## HTML Entities
HTML entities digunakan untuk menampilkan karakter khusus yang tidak bisa ditulis langsung, seperti simbol atau tanda kutip.

```html
&copy; &amp; &lt; &gt;
```
Output: © & < >

---

## HTML5 API dan Fitur Baru
HTML5 memperkenalkan elemen dan API baru seperti:

- **Form Validation**:
  ```html
  <input type="email" required>
  ```

- **Local Storage** (untuk menyimpan data secara lokal di browser):
  ```html
  localStorage.setItem('username', 'JohnDoe');
  ```

---

## Penggunaan Iframe

Iframe memungkinkan penyisipan halaman web lain di dalam halaman web.

```html
<iframe src="https://example.com" width="600" height="400"></iframe>
```

---

## Komentar dalam HTML
Komentar digunakan untuk menambahkan catatan dalam kode HTML tanpa ditampilkan di halaman.

```html
<!-- Ini adalah komentar -->
```

---

## Optimisasi dan Best Practices dalam HTML
Beberapa praktik terbaik dalam menulis HTML:

- Gunakan elemen semantik untuk meningkatkan SEO.
- Gunakan komentar untuk mendokumentasikan kode.
- Pastikan kode HTML terstruktur dengan rapi dan bersih.
