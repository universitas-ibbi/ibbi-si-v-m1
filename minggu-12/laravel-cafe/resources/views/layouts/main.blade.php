<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Cafe</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous'/>
</head>

<body>
    <header class="bg-light">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#">Cafe Delight</a>
                <button class="navbar-toggler" type="button
                " data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{  route("about") }}">Tentang Kami</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{  route("contact") }}">Hubungi Kami</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <section class="text-center bg-dark text-white py-5 h-75" style="background: url('images/cafe.jpeg') no-repeat center center/cover;">
        <div class="d-flex flex-column justify-content-center align-items-center h-100">
            <h2>Selamat Datang di Cafe Delight</h2>
            <p>Tempat yang sempurna untuk menikmati kopi dan makanan lezat.</p>
            <a href="#menu" class="btn btn-primary">Lihat Menu</a>
        </div>
    </section>


    <section id="menu" class="py-5">
        @yield('content')
    </section>
</body>

</html>
