@extends('index')
@section('content')
    {{-- <div class="align-items-start justify-content-center d-flex pt-5"
        style="height:300px;padding-left: 35px;padding-right: 30px;background-color:#0288F6;">
        <div class="text-white text-center ">
            <h1 style="font-size:26pt;">Monitoring Perijinan</h1>
            <p style="font-size:16pt;">Selamat datang di aplikasi <strong>Monitoring Perijinan PT Jasamarga
                    Tollroad Maintenance</strong></p>
        </div>
    </div> --}}
    <div class="hero-container" style="background-image: url({{ asset('assets/img-jmtm/gambar1.jpg')}})">
        <div class="overlay" style="opacity: 0.5"></div>
        <div class="container align-items-center justify-content-center d-flex" style="padding-top: 90px; ">
            <div class="text-white text-center">
                <h1 >Monitoring Perijinan</h1>
            <p>Selamat datang di aplikasi <strong>Monitoring Perijinan PT Jasamarga
                    Tollroad Maintenance</strong></p>
            </div>
        </div>
    </div>


    <div style="margin-top:-70px;margin-left: 30px;margin-right: 30px;">
        <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md text-center mt-4">
                <div class="card shadow py-3 " style="border-radius:20px;">
                    <i class="fi fi-tr-file-signature text-success" style="font-size:30pt;margin:0;padding:0;"></i>
                    <h5> Lifetime</h5>
                        <p><strong>6</strong> perizinan</p>
                </div>
            </div>
            <div class="col-sm-12 col-md text-center mt-4">
                <div class="card shadow py-3 " style="border-radius:20px;">
                    <i class="fi fi-tr-license text-primary" style="font-size:30pt;margin:0;padding:0;"></i>
                    <h5> Lisensi</h5>
                        <p><strong>6</strong> perizinan</p>
                </div>
            </div>
            <div class="col-sm-12 col-md text-center mt-4">
                <div class="card shadow py-3 " style="border-radius:20px;">
                    <i class="fi fi-tr-tally" style="font-size:30pt;margin:0;padding:0;"></i>
                    <h5>Total</h5>
                        <p><strong>6</strong> perizinan</p>
                </div>
            </div>
            <div class="col-sm-12 col-md text-center mt-4">
                <div class="card shadow py-3 " style="border-radius:20px;">
                    <i class="fi fi-tr-triangle-warning text-warning" style="font-size:30pt;margin:0;padding:0;"></i>
                    <h5>Perpanjang</h5>
                        <p><strong>6</strong> perizinan</p>
                </div>
            </div>
            <div class="col-sm-12 col-md text-center mt-4">
                <div class="card shadow py-3 " style="border-radius:20px;">
                    <i class="fi fi-tr-rectangle-xmark text-danger" style="font-size:30pt;margin:0;padding:0;"></i>
                    <h5>Non-Aktif</h5>
                        <p><strong>6</strong> perizinan</p>
                </div>
            </div>
        </div>

    </div>

    {{-- <div class="card mb-4 shadow"
        style="margin-top:-80px;;margin-left: 30px;margin-right: 30px; border-radius: 35px 35px 35px 35px;border:none;">
        <div class="row p-4 d-flex justify-content-center">
            <div class="col-md-4 text-center border-end border-3" style="border-color: #FF588E  !important;">
                <i class="fi fi-tr-file-signature" style="font-size:30pt;margin:0;padding:0;"></i>
                <h4>Perijinan Lifetime</h3>
                    <p>6 perizinan</p>
            </div>
            <div class="col-md-4 border-end border-3 d-flex justify-content-center"
                style="border-color: #FF588E  !important;">
                <h1>xcqjcx</h1>
            </div>
            <div class="col-md-4 d-flex justify-content-center">
                <h1>xcqjcx</h1>
            </div>
            <div class="col-md-4 border-end border-3 d-flex justify-content-center mt-5"
                style="border-color: #FF588E  !important;">
                <h1>xcqjcx</h1>
            </div>
            <div class="col-md-4 d-flex justify-content-center mt-5">
                <h1>xcqjcx</h1>
            </div>
        </div>
    </div> --}}

    <div class="card shadow"
        style="margin-top:40px;margin-left: 30px;margin-right: 30px; margin-bottom:50px; border-radius: 35px 35px 35px 35px;border:none;">
        <div class="d-flex align-items-center text-white" style="border-radius:35px;padding:17px;background-color:#342073;">
            <i class="fas fa-search text-white" style="font-size: 12pt;"></i>
            <h5 style="margin-left: 10px;">Daftar Perijinan</h5>
        </div>
        <div class="card " style="margin:10px 30px 30px 30px; background-color: transparent;border: none;">
            <table id="my_table" class="table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <% data.forEach(function(row){ %> --}}
                    <tr>
                        <td>
                            Dadang sunandang
                        </td>
                        <td>
                            dadang@gmail.com
                        </td>
                    </tr>
                    {{-- <% }); %> --}}
                </tbody>
            </table>
        </div>
    </div>
@endsection
