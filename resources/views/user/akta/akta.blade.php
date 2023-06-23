@extends('index')
@section('content')
    <div class="hero-container" style="background-image: url({{ asset('assets/img-jmtm/gambar1.jpg') }})">
        <div class="overlay" style="opacity: 0.5"></div>
        <div class="container align-items-center justify-content-center d-flex" style="padding-top: 90px; ">
            <div class="text-white text-center">
                <h1>e-Legal</h1>
                <p>Selamat datang di aplikasi <strong>e-Legal PT Jasamarga
                        Tollroad Maintenance</strong></p>
            </div>
        </div>
    </div>
    <section style="margin-left:30px; margin-right:30px; margin-top:-80px; margin-bottom:50px;">
        <div class="card shadow mt-5" style="border-radius: 36px;border:none;">
            <div class="d-flex align-items-center  text-white"
                style="margin:10px;border-radius:35px;padding:18px;background-color:#342073;">
                <i class="fas fa-search text-white" style="font-size: 12pt;"></i>
                <h5 style="margin-left: 10px;">Daftar Dokumen Akta</h5>
            </div>
            <div class="card" style="margin:10px 30px 30px 30px; background-color: transparent;border: none;">
                <table class="my_table table w-100">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" style="width:3%">No</th>
                            <th scope="col">Nama Akta</th>
                            <th scope="col">No. Akta</th>
                            <th scope="col">Tahun</th>
                            {{-- <th scope="col" style="width:10%">Proses (Hari)</th> --}}
                            {{-- <th scope="col" style="width:7%">Status</th>
                            <th scope="col" style="width:9%">Sisa Hari</th> --}}
                            {{-- <th scope="col">Aksi</th> --}}
                            {{-- @if (Auth::check() && Auth::user()->akses_level == 1) --}}
                                <th scope="col" style="width:12%">Detail</th>
                            {{-- @endif --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        <tr>
                            <td>{{ $no }}</td> @php $no++; @endphp
                            <td>{{ $no }}</td> @php $no++; @endphp
                            <td>{{ $no }}</td> @php $no++; @endphp
                            <td>{{ $no }}</td> @php $no++; @endphp
                            <td>{{ $no }}</td> @php $no++; @endphp
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
