<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Monitoring Perijinan | JMTM </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <style>
        body {
            background-color: #212121;
            max-width: 80vw;
            /* Maksimum 80% lebar viewport */
            max-height: 80vh;
            /* Maksimum 80% tinggi viewport */
            margin: 0 auto;
            /* Pusatkan elemen di tengah */
        }

        .loading span {
            font-size: 22px;
            font-family: 'Courier New', Courier, monospace;
            font-weight: 600;
            animation: blur 3s linear infinite;
            line-height: 20px;
            transition: all 0.5s;
            letter-spacing: 0.2em;
        }

        @keyframes blur {

            0%,
            90% {
                filter: blur(0);
            }

            50% {
                filter: blur(10px);
            }
        }

        .loader {
            width: 160px;
            height: 185px;
            position: relative;
            background: #fff;
            border-radius: 100px 100px 0 0;
        }

        .loader:after {
            content: "";
            position: absolute;
            width: 100px;
            height: 125px;
            left: 50%;
            top: 25px;
            transform: translateX(-50%);
            background-image: radial-gradient(circle, #000 48%, transparent 55%),
                radial-gradient(circle, #000 48%, transparent 55%),
                radial-gradient(circle, #fff 30%, transparent 45%),
                radial-gradient(circle, #000 48%, transparent 51%),
                linear-gradient(#000 20px, transparent 0),
                linear-gradient(#cfecf9 60px, transparent 0),
                radial-gradient(circle, #cfecf9 50%, transparent 51%),
                radial-gradient(circle, #cfecf9 50%, transparent 51%);
            background-repeat: no-repeat;
            background-size: 16px 16px, 16px 16px, 10px 10px, 42px 42px, 12px 3px,
                50px 25px, 70px 70px, 70px 70px;
            background-position: 25px 10px, 55px 10px, 36px 44px, 50% 30px, 50% 85px,
                50% 50px, 50% 22px, 50% 45px;
            animation: faceLift 3s linear infinite alternate;
        }

        .loader:before {
            content: "";
            position: absolute;
            width: 140%;
            height: 125px;
            left: -20%;
            top: 0;
            background-image: radial-gradient(circle, #fff 48%, transparent 50%),
                radial-gradient(circle, #fff 48%, transparent 50%);
            background-repeat: no-repeat;
            background-size: 65px 65px;
            background-position: 0px 12px, 145px 12px;
            animation: earLift 3s linear infinite alternate;
        }

        @keyframes faceLift {
            0% {
                transform: translateX(-60%);
            }

            100% {
                transform: translateX(-30%);
            }
        }

        @keyframes earLift {
            0% {
                transform: translateX(10px);
            }

            100% {
                transform: translateX(0px);
            }
        }
    </style>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center" style="height:100vh;">
        <lottie-player src="https://assets2.lottiefiles.com/packages/lf20_zjihqths.json" background="transparent"
            speed="1" style="width: 500px;" loop autoplay></lottie-player>
    </div>

    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script>
        // Tambahkan skrip JavaScript untuk mengarahkan pengguna ke halaman home setelah selesai loading
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                window.location.href = '/home';
            }, 3000);
        });
        // Tambahkan skrip JavaScript untuk mengarahkan pengguna ke halaman home setelah selesai loading
        // setTimeout(function() {
        //     window.location.href = '/home';
        // }, 3000); // Timer 5 detik (5000 milidetik)
    </script>
</body>

</html>



{{-- @extends('index')
@section('content')
    <div class="loading-container">
        <h1 class="loading-text">Loading...</h1>
    </div>
@endsection
@section('alert')
    <script>
        // Tambahkan skrip JavaScript untuk mengarahkan pengguna ke halaman home setelah selesai loading
        // document.addEventListener('DOMContentLoaded', function() {
        //     window.location.href = '/home';
        // });
        // Tambahkan skrip JavaScript untuk mengarahkan pengguna ke halaman home setelah selesai loading
        setTimeout(function() {
            window.location.href = '/home';
        }, 3000); // Timer 5 detik (5000 milidetik)
    </script>
@endsection --}}
