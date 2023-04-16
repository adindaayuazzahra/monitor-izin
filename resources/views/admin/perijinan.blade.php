@extends('index')
@section('content')
    {{-- <section style="height:250px;background-color:#0288F6;">
        <div class="align-items-start justify-content-center d-flex pt-5">
            <div class="text-white text-center ">
                <h1 style="font-size:26pt;">Mengelola Perijinan</h1>
                <p style="font-size:16pt;">Pada halaman ini anda dapat menambahkan, menyunting dan menghpaus perizinan</p>
            </div>
        </div>
    </section> --}}
    <div class="hero-container" style="background-image: url({{ asset('assets/img-jmtm/gambar1.jpg') }})">
        <div class="overlay" style="opacity: 0.5"></div>
        <div class="container align-items-center justify-content-center d-flex" style="padding-top: 90px; ">
            <div class="text-white text-center">
                <h1>Mengelola Perijinan</h1>
                <p>Pada halaman ini anda dapat menambahkan, menyunting dan menghapus perijinan.</p>
            </div>
        </div>
    </div>

    <section style="margin-left:30px; margin-right:30px; margin-top:-80px; margin-bottom:50px;">
        <div class="card shadow mt-5" style="border-radius: 36px;border:none;">
            <div class="d-flex align-items-center  text-white"
                style="margin:10px;border-radius:35px;padding:18px;;background-color:#342073;">
                <i class="fas fa-search text-white" style="font-size: 12pt;"></i>
                <h5 style="margin-left: 10px;">Daftar Perijinan</h5>
                {{-- <div class="d-flex">
                    <i class="fas fa-search text-white" style="font-size: 12pt;"></i>
                    <h5 style="margin-left: 10px;">Daftar Perijinan</h5>
                </div>
                <div class="">
                    <a href="" type="button" class="btn px-3  text-white" style="background: #873FFD;border-radius:30px;">
                        <i class="fa-solid fa-folder-plus" style="margin-right: 5px"></i>
                    </a>
                </div> --}}
            </div>
            <div class="card" style="margin:10px 30px 30px 30px; background-color: transparent;border: none;">
                <div class="d-flex justify-content-md-end justify-content-xs-center">

                    <a href="{{ route('admin.perijinan.add') }}" type="button" class="btn mb-2 text-white"
                        style="background: #873FFD;border-radius:30px;">
                        <i class="fa-solid fa-folder-plus" style="margin-right: 5px"></i>
                        Tambah Perijinan</a>
                </div>
                <table id="my_table" class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Ijin</th>
                            <th scope="col">Tanggal Berkahir</th>
                            <th scope="col">Instansi Terkait</th>
                            {{-- <th scope="col" style="width:10%">Proses (Hari)</th> --}}
                            <th scope="col" style="width:7%">Status</th>
                            {{-- <th scope="col">Aksi</th> --}}
                            <th scope="col" style="width:12%">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($perijinans as $p)
                            <tr
                                class="
                                    @if (!$p->tanggal_berakhir) ''
                                    @else
                                        {{ Carbon::now()->startOfDay()->diffInMonths($p->tanggal_berakhir, false) <= 3? 'bg-warning': '' }} @endif
                                ">
                                <td>{{ $i }}</td> @php $i++ @endphp
                                <td>
                                    {{ $p['nama_perizinan'] }}
                                </td>
                                <td>
                                    @if (!$p->tanggal_berakhir)
                                        <p>-</p>
                                    @else
                                    {{ Carbon::make($p->tanggal_berakhir)->format('d/m/Y') ?? '-' }}
                                    @endif
                                </td>
                                <td>
                                    {{ $p['instansi_terkait'] }}
                                </td>
                                {{-- <td>
                                    {{ $p['perkiraan_proses'] }}
                                </td> --}}
                                <td>
                                    @if ($p->status == 0)
                                        <span class="rounded-pill badge text-bg-success">Aktif</span>
                                    @else
                                        <span class=" rounded-pill badge text-bg-danger">Non-Aktif</span>
                                    @endif
                                </td>
                                {{-- <td>
                                    <a href="" class="btn btn-danger" >Lihat Detail <i class="fa-solid fa-up-right-from-square"></i></a>
                                </td> --}}
                                <td>
                                    <a href="{{ route('admin.perijinan.detail', ['id' => $p->id]) }}" class="detail">Lihat
                                        Detail <i class="fa-solid fa-up-right-from-square"></i></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
