@extends('index')
@section('content')
    <div class="hero-container" style="background-image: url({{ asset('assets/img-jmtm/gambar1.jpg') }})">
        <div class="overlay" style="opacity: 0.5"></div>
        <div class="container align-items-center justify-content-center d-flex" style="padding-top: 90px; ">
            <div class="text-white text-center">
                <h1>Pengelolaan Dokumen Akta</h1>
                <p>Pada halaman ini anda dapat menambahkan, menyunting dan menghapus dokumen akta perusahaan.</p>
            </div>
        </div>
    </div>

    <section style="margin:-80px 30px 50px 30px;">
        <div class="card shadow mt-5" style="border-radius: 36px;border:none;">
            <div class="d-flex align-items-center  text-white"
                style="margin:10px;border-radius:35px;padding:18px;background-color:#342073;">
                <i class="fas fa-search text-white" style="font-size: 12pt;"></i>
                <h5 style="margin-left: 10px;">Daftar Dokumen Akta</h5>
            </div>

            <div class="card" style="margin:10px 30px 30px 30px; background-color: transparent;border: none;">
                <div class="d-flex justify-content-md-end justify-content-xs-center">
                    <a href="" type="button" class="btn mb-2 text-white"
                        style="background: #873FFD;border-radius:30px;">
                        <i class="fa-solid fa-folder-plus" style="margin-right: 5px"></i>
                        Tambah Akta</a>
                </div>
                <table id="my_table" class="my_table table w-100">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Ijin</th>
                            <th scope="col" style="width:12%">Tanggal Berakhir</th>
                            <th scope="col">Instansi Terkait</th>
                            {{-- <th scope="col" style="width:10%">Proses (Hari)</th> --}}
                            <th scope="col" style="width:7%">Status</th>
                            <th scope="col" style="width:9%">Sisa Hari</th>
                            {{-- <th scope="col">Aksi</th> --}}
                            <th scope="col" style="width:10%">Detail</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
@endsection
