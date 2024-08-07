    <nav class="navbar navbar-expand-lg navbar-light text-white" id="pages">
        <div class="container">
            <a class="navbar-brand" href="#">Aplikasi Tracer Study Informatika</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('welcome/about') ?>">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('register/daftar') ?>">Registrasi</a>
                    </li>
                    <li class="nav-item login">
                        <a class="nav-link login" href="<?= base_url('login/login')?>">Login</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>