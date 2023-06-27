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
                    <a href="{{ route('admin.akta.add') }}" type="button" class="btn mb-2 text-white"
                        style="background: #873FFD;border-radius:30px;">
                        <i class="fa-solid fa-folder-plus" style="margin-right: 5px"></i>
                        Tambah Akta</a>
                </div>
                <table class="my_table table w-100">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" style="width:3%">No</th>
                            <th scope="col">Nama Akta</th>
                            <th scope="col">No. Akta</th>
                            <th scope="col">Tahun</th>
                            <th scope="col" style="width:12%">Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1; @endphp
                        @foreach ($aktas as $akta)
                            <tr>
                                <td>{{ $no }}</td> @php $no++; @endphp
                                <td>{{ $akta->nama_akta }}</td>
                                <td>{{ $akta->nomor_akta }}</td>
                                <td>{{ $akta->tahun }}</td>
                                <td>
                                    <a class="link-offset-2 link-body-emphasis link-underline link-underline-opacity-0 icon-link icon-link-hover"
                                        style="--bs-icon-link-transform: translate3d(0, -.200rem, 0);"
                                        href="{{ route('admin.akta.detail', ['id'=>$akta->id]) }}">Lihat
                                        Detail <i class="bi bi-arrow-up-right-square"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
