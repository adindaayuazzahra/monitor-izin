<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Monitoring Perijinan | JMTM </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img-jmtm/logojmtm.ico') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ovo&family=Work+Sans:wght@500;600;700;800&display=swap"
        rel="stylesheet">
    {{-- sweetalert --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fee440;
            font-family: 'Ovo', serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Work Sans', sans-serif;
            font-weight: 500;
            margin: 0;
            /* line-height: 1; */
        }

        p {
            font-family: 'Ovo', serif;
            margin: 0;
        }

        svg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
        }

        .links {
            position: fixed;
            bottom: 20px;
            right: 20px;
            font-size: 18px;
            font-family: sans-serif;
        }

        a {
            text-decoration: none;
            color: black;
            margin-left: 1em;
        }

        a:hover {
            text-decoration: underline;
        }

        a img.icon {
            display: inline-block;
            height: 1em;
            margin: 0 0 -0.1em 0.3em;
        }

        button.btn-sub:hover {
            /* opacity: 80%; */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }
    </style>
</head>

<body class="gradient">
    <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" viewBox="0 0 100 100">
        <defs>
            <style>
                @keyframes rotate {
                    100% {
                        transform: rotate(360deg);
                    }
                }

                .out-top {
                    animation: rotate 20s linear infinite;
                    transform-origin: 13px 25px;
                }

                .in-top {
                    animation: rotate 10s linear infinite;
                    transform-origin: 13px 25px;
                }

                .out-bottom {
                    animation: rotate 25s linear infinite;
                    transform-origin: 84px 93px;
                }

                .in-bottom {
                    animation: rotate 15s linear infinite;
                    transform-origin: 84px 93px;
                }
            </style>
        </defs>
        <path fill="#9b5de5" class="out-top"
            d="M37-5C25.1-14.7,5.7-19.1-9.2-10-28.5,1.8-32.7,31.1-19.8,49c15.5,21.5,52.6,22,67.2,2.3C59.4,35,53.7,8.5,37-5Z" />
        <path fill="#f15bb5" class="in-top"
            d="M20.6,4.1C11.6,1.5-1.9,2.5-8,11.2-16.3,23.1-8.2,45.6,7.4,50S42.1,38.9,41,24.5C40.2,14.1,29.4,6.6,20.6,4.1Z" />
        <path fill="#00bbf9" class="out-bottom"
            d="M105.9,48.6c-12.4-8.2-29.3-4.8-39.4.8-23.4,12.8-37.7,51.9-19.1,74.1s63.9,15.3,76-5.6c7.6-13.3,1.8-31.1-2.3-43.8C117.6,63.3,114.7,54.3,105.9,48.6Z" />
        <path fill="#00f5d4" class="in-bottom"
            d="M102,67.1c-9.6-6.1-22-3.1-29.5,2-15.4,10.7-19.6,37.5-7.6,47.8s35.9,3.9,44.5-12.5C115.5,92.6,113.9,74.6,102,67.1Z" />
    </svg>

    {{-- <div class="links">
        <a href="https://www.youtube.com/watch?v=0yp9-_NKPC0&t" target="_blank">video tutorial<img class="icon" src="https://ksenia-k.com/img/icons/link.svg"></a>
        <a href="https://dev.to/uuuuuulala/making-background-blob-animation-in-just-15kb-step-by-step-guide-2482" target="_blank">text version<img class="icon" src="https://ksenia-k.com/img/icons/link.svg"></a>
    </div> --}}

    <div class="container d-flex align-items-center justify-content-center" style="height:100vh;">
        <div class="card px-4 py-5 shadow-lg" style="max-width:90vh;width:50vh;border-radius:20px;">
            {{-- @if (session('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif --}}
            {{-- <div class="d-flex justify-content-center">
                <img src="{{asset('assets/img-jmtm/login.gif')}}" width="300px;" alt="" class="mb-4">
            </div> --}}
            <div class="d-flex justify-content-center" style="margin-bottom:10px;">
                <img src="{{ asset('assets/img-jmtm/jmtmpng.png') }}" width="200px;">
            </div>
            {{-- <hr> --}}
            <div class="d-flex justify-content-center">
                <h4><strong>Monitoring Perijinan</strong></h4>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <p><strong>Halaman Login</strong></p>
                {{-- <p>Halaman Login</p> --}}
            </div>

            <form action="{{ route('home.login.do') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-floating mb-3 d-block">
                    <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username"
                        name="username" placeholder="Username" autocomplete="off">
                    <label for="username">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control  @error('password') is-invalid @enderror"
                        id="floatingPassword" name="password" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-lg btn-sub"
                        style="background-color:#873ffd;color:white;">Login</button>
                </div>
            </form>
            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('home') }}" class="text-primary"><span>Kembali Ke Halaman
                        Utama</span></a>
            </div>

        </div>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
    {{-- sweetalert --}}
    <script src="
        https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js
        "></script>
    @if (session('message'))
        <script nonce="YXN1YmFuZ2V0MTIzNGhmaGZoZmpzb3ht">
            Swal.fire({
                timer: 2000,
                // imgeUrl: 'https://assets6.lottiefiles.com/packages/lf20_s2lryxtd.json',
                icon: '{{ session('icon') }}',
                title: '{{ session('title') }}',
                text: '{{ session('message') }}',
                // footer: '<a href="">Why do I have this issue?</a>'
            });
        </script>
    @endif
</body>

</html>
