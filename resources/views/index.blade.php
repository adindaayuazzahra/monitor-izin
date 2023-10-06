<!DOCTYPE html>
<html lang="en">

<head>
    @include('particials/header')
</head>

<body style="background-color: #f9f9f9">
    @include('particials.navbar')
    @yield('content')
    {{-- <footer class="bg-dark text-white py-4 mt-auto">
        <div class="container">
            <div class="row mt-1">
                <div class="col text-center">
                    <a href="https://wa.me/6281288668996?text=Halo Pak Rusdi, Saya ingin mendapatkan token download Aplikasi Web e-Legal." class="btn btn-success" target="_blank">Klik untuk Mendapatkan Token</a>
                </div>
            </div>
        </div>
    </footer> --}}
    @include('particials/assetJs')
    @yield('alert')
</body>

</html>
