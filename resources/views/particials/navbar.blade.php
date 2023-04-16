{{-- <div class="container-fluid mb-0 d-flex align-items-center" style="padding:10px 0px 10px 0px;background-color:#063b7b;">
    <div class="container text-white">
        <ul class="nav justify-content-center">
            <li style="font-size: 18px;" class="nav-item">
                Information Center :
                <a style="color:white;"
                    href="https://wa.me/6282114622223?text=Halo Bu Rika!, Saya ingin bertanya perihal booking ruang rapat."
                    target="_blank">
                    <i style="font-size: 18px; " class="fab fa-whatsapp"> +62 821-1462-2223</i>
                </a>
            </li>
            <div style=" border-left: 1px solid rgba(255, 255, 255, 0.822);margin-right:10px;margin-left:10px"></div>
            <li style="font-size: 18px; " class="nav-item">
                <a style="color:white;" href="https://www.instagram.com/jmtm.official/" target="_blank">
                    <i style="font-size: 18px; " class="fab fa-instagram"> JMTM Official</i>
                </a>
            </li>
        </ul>
    </div>
</div> --}}

<nav class="navbar navbar-expand-lg mt-0 sticky-top" style="background-color:#FBDC9E;">
    <div class="container-fluid" style="padding-left: 30px;padding-right: 30px;">
        <a class="navbar-brand" href=""><img src="{{ asset('assets/img-jmtm/jmtmpng.png') }}" width="180px"></a>
        <!-- <a class="navbar-brand" href=""><img src="assets/img-jmtm/bumn.png" width="180px"></a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="{{ route('home') }}">Home</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('admin.perijinan') }}">Perijinan</a>
                    </li>
                @endif
            </ul>
            @if (Auth::check())
                <a class="btn text-white" style="border-radius:20px;background-color:#FF588E;"
                    href="{{ route('home.logout.do') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i> Logout</a>
            @else
                <a class="btn text-white" style="border-radius:20px;background-color:#873FFD;"
                    href="{{ route('home.login') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
            @endif
        </div>
    </div>
</nav>
