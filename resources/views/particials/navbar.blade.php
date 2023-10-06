<div class="container-fluid mb-0 d-flex align-items-center" style="padding:10px 0px 10px 0px;background-color:#063b7b;">
    <div class="container text-white">
        <ul class="nav justify-content-center">
            <li style="font-size: 18px;" class="nav-item text-center">
                Information Center :
                <a style="color:white;text-decoration:none;" href="https://wa.me/6281288668996?text=Halo Admin, Saya ingin mendapatkan infromasi dan token download pada Aplikasi Web e-Legal." target="_blank">
                    <i style="font-size: 18px; " class="fab fa-whatsapp"></i>
                    +62 812-8866-8996 (Admin)
                </a>
            </li>
            {{-- <div style=" border-left: 1px solid rgba(255, 255, 255, 0.822);margin-right:10px;margin-left:10px"></div>
            <li style="font-size: 18px; " class="nav-item">
                <a style="color:white;" href="https://www.instagram.com/jmtm.official/" target="_blank">
                    <i style="font-size: 18px; " class="fab fa-instagram"> JMTM Official</i>
                </a>
            </li> --}}
        </ul>
    </div>
</div>

<nav class="navbar navbar-expand-lg mt-0 sticky-top" style="background-color:#FBDC9E;">
    <div class="container-fluid" style="padding-left: 30px;padding-right: 30px;">
        <a class="navbar-brand" href=""><img src="{{ asset('assets/img-jmtm/logojmtm.png') }}" width="180px"></a>
        <!-- <a class="navbar-brand" href=""><img src="assets/img-jmtm/bumn.png" width="180px"></a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('home') }}">Perijinan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('akta') }}">Dokumen</a>
                </li>
                @if (Auth::check() && Auth::user()->akses_level == 0)
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mengelola Data
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('admin.perijinan') }}">Perijinan</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.akta') }}">Akta</a></li>
                    </ul>
                </li>
                @endif
            </ul>
            <img src="{{ asset('assets/img-jmtm/logoelegal.png') }}" class="navbar-brand" width="150px">
            @if (Auth::check())
            <a class="btn text-white" style="border-radius:20px;background-color:#FF588E;" href="{{ route('home.logout.do') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i> Logout</a>
            @else
            <a class="btn text-white" style="border-radius:20px;background-color:#873FFD;" href="{{ route('home.login') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
            @endif
        </div>
    </div>
</nav>
