@extends('index')
@section('content')
    <div class=" d-flex align-items-center justify-content-center" style="height:200px;background-color:#0288F6;">
        {{-- <div class="overlay" style="opacity: 0.5"></div> --}}
        <div class="text-white text-center">
            <h2 class="text-center">{{ $perijinan->nama_perizinan }}</h2>
            {{-- <p style="font-size:16pt;">Pada halaman ini anda dapat menambahkan, menyunting dan menghapus perijinan.</p> --}}
        </div>
    </div>
    <section style="margin:-80px 30px 50px 30px;">
        {{-- card detail --}}
        <div class="card mb-4 shadow mt-5" style="border-radius: 36px;border:none;">
            <div class="d-flex align-items-center justify-content-between text-white"
                style="margin:10px;border-radius:35px;padding:15px;background-color:#342073;">
                <div class="d-flex align-items-center ">
                    <i class="fas fa-search text-white"></i>
                    <h5 style="margin-left: 10px;">Detail Perijinan</h5>
                </div>
                {{-- <div class="d-flex gap-1 align-items-center">
                    <button class="btn btn-danger rounded-circle" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                    <a href="{{ route('admin.perijinan.edit', ['id' => $perijinan->id]) }}"
                        class="btn btn-warning rounded-circle">
                        <i class="fa-solid fa-marker"></i>
                    </a>
                    <a href="{{ route('admin.perijinan') }}" class="btn btn-secondary rounded-circle">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div> --}}
            </div>
            <div class="card" style="margin:30px 30px 30px 30px; background-color: transparent;border: none;">
                <div class="row g-0">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_gtbdf5vn.json"
                            background="transparent" speed="1" style="width: 350px;" loop autoplay></lottie-player>
                    </div>
                    <div class="col-md-8 d-flex align-items-center">
                        <div class="card-body">
                            @if (session('message'))
                                {{-- <div class="alert alert-{{ Session::get('message-class', 'warning') }}" role="alert">
                                    {{ session('message') }}
                                </div> --}}
                            @endif
                            <div class="d-flex gap-1 mb-3 align-items-center">
                                <button class="btn btn-danger rounded-circle" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <a href="{{ route('admin.perijinan.edit', ['id' => $perijinan->id]) }}"
                                    class="btn btn-warning rounded-circle">
                                    <i class="fa-solid fa-marker"></i>
                                </a>
                                <a href="{{ route('admin.perijinan') }}" class="btn btn-secondary rounded-circle">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </a>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <h6 class="card-title"><i class="fa-solid fa-file-contract"></i> Nama Perizinan</h6>
                                </div>
                                <div class="col">
                                    <p class="card-text">{{ $perijinan->nama_perizinan }}</p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <h6 class="card-title"><i class="fa-solid fa-location-dot"></i> Lokasi</h6>
                                </div>
                                <div class="col">
                                    <p class="card-text">{{ $perijinan->lokasi }}</p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <h6 class="card-title"><i class="fa-solid fa-building-columns"></i> Instansi Terkait
                                    </h6>
                                </div>
                                <div class="col">
                                    <p class="card-text">{{ $perijinan->instansi_terkait }}</p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <h6 class="card-title"><i class="fa-regular fa-clock"></i> Perkiraan Proses</h6>
                                </div>
                                <div class="col">
                                    <p class="card-text">{{ $perijinan->perkiraan_proses }} Hari</p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <h6 class="card-title"><i class="fa-solid fa-circle-info"></i> Status</h6>
                                </div>
                                <div class="col">
                                    @if ($perijinan->status == 0)
                                        <span class="rounded-pill badge text-bg-success">Aktif</span>
                                    @else
                                        <span class=" rounded-pill badge text-bg-danger">Non-Aktif</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-2 d-flex align-items-start justify-content-end">
                        <a href="" class="btn btn-primary">Perpanjangan</a>
                    </div> --}}
                </div>
            </div>
        </div>


        {{-- perpanjangan aktif --}}
        <div class="card mb-4 shadow mt-5" style="border-radius: 36px;border:none;">
            <div class="d-flex align-items-center justify-content-between text-white"
                style="margin:10px;border-radius:35px;padding:15px;background-color:#342073;">
                <div class="d-flex align-items-center ">
                    <i class="fas fa-search text-white"></i>
                    <h5 style="margin-left: 10px;">Perpanjangan Aktif</h5>
                </div>
                {{-- @if (!$perpanjangan_stat)
                    <div class="d-flex gap-1 align-items-center">
                        <a href="{{ route('admin.perpanjangan.add', ['id' => $perijinan->id]) }}"
                            class="btn btn rounded-pill text-white" style="background-color: #873FFD;"><i
                                class="fa-solid fa-plus"></i> Perpanjangan</a>
                    </div>
                @else
                    <div class="d-flex gap-1 align-items-center @if ($perpanjangan_stat->status_perpanjangan == 0) invisible @endif">
                        <a href="{{ route('admin.perpanjangan.add', ['id' => $perijinan->id]) }}"
                            class="btn btn rounded-pill text-white" style="background-color: #873FFD;"><i
                                class="fa-solid fa-plus"></i> Perpanjangan</a>
                    </div>
                @endif --}}
            </div>
            <div class="card " style="margin:25px 30px 30px 30px; background-color: transparent;border: none;">
                <div class="row g-0 d-flex align-items-center ">
                    @if ($perpanjangan_aktif->isEmpty())
                        <div class="col p-0">
                            <div class="row-sm-12 row-md-6 d-flex justify-content-center align-items-center">
                                <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_mxuufmel.json"
                                    background="transparent" speed="1" style="width: 300px;" loop autoplay>
                                </lottie-player>
                            </div>
                            <div class="row-sm-12 row-md-6 d-flex mb-4 justify-content-center align-items-center">
                                <h2 class="text-center" style="">Ops.. Belum ada perpanjangan, Tambah dulu dong ...
                                </h2>
                            </div>
                            <div class="row-sm-12 row-md-6 d-flex  justify-content-center align-items-center">
                                <a href="{{ route('admin.perpanjangan.add', ['id' => $perijinan->id]) }}"
                                    class="btn btn-lg rounded-pill text-white" style="background-color: #873FFD;"><i
                                        class="fa-solid fa-plus"></i> Perpanjangan</a>
                            </div>
                        </div>
                    @else
                        {{-- <div class="col-md-2 d-flex justify-content-center align-items-center">
                            <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_i1mvXDRPV0.json"
                                background="transparent" speed="1"  loop autoplay></lottie-player>
                        </div> --}}
                        @foreach ($perpanjangan_aktif as $pa)
                            {{-- @dd($pa) --}}
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="card-body">
                                    {{-- <div class="d-flex align-items-center mb-2">
                                        <button class="btn btn-dark rounded-pill" data-bs-toggle="modal"
                                            data-bs-target="#nonaktifModal{{ $pa->id }}">
                                            <i class="fa-solid fa-ban"></i> Non-Aktifkan
                                        </button>
                                    </div> --}}
                                    <div class="d-flex gap-1 mb-3 align-items-center">
                                        @if (!$perpanjangan_stat)
                                            <a href="{{ route('admin.perpanjangan.add', ['id' => $perijinan->id]) }}"
                                                class="btn btn rounded-pill text-white" style="background-color: #873FFD;">
                                                Perpanjang</a>
                                        @else
                                            <a href="{{ route('admin.perpanjangan.add', ['id' => $perijinan->id]) }}"
                                                class="btn btn rounded-pill text-white  @if ($perpanjangan_stat->status_perpanjangan == 0) d-none @endif"
                                                style="background-color: #873FFD;">
                                                Perpanjang</a>
                                        @endif
                                        <a href="{{ route('admin.perpanjangan.edit', ['id' => $pa->id_perizinan, 'id_perpanjangan' => $pa->id]) }}"
                                            class="btn btn-warning rounded-circle">
                                            <i class="fa-solid fa-marker"></i>
                                        </a>
                                        <button class="btn btn-danger rounded-circle" data-bs-toggle="modal"
                                            data-bs-target="#">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        {{-- <a href="{{ route('admin.perijinan') }}"
                                            class="btn btn-secondary rounded-circle">
                                            <i class="fa-solid fa-arrow-left"></i>
                                        </a> --}}
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <h6 class="card-title"><i class="fa-solid fa-file-contract"></i> Jenis
                                                Perpanjangan
                                            </h6>
                                        </div>
                                        <div class="col">
                                            @if ($pa->status_perpanjangan == 0)
                                                <span class="rounded-pill badge  text-bg-success">Non-Periodik</span>
                                            @else
                                                <span class=" rounded-pill badge text-bg-warning">Periodik</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <h6 class="card-title"><i class="fa-solid fa-calendar-check"></i> Tanggal
                                                Registrasi
                                            </h6>
                                        </div>
                                        <div class="col">
                                            <p class="card-text">
                                                {{ Carbon::make($pa->tanggal_registrasi)->format('d/m/Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <h6 class="card-title"><i class="fa-solid fa-calendar-xmark"></i> Tanggal
                                                Berakhir
                                            </h6>
                                        </div>
                                        <div class="col">
                                            @if ($pa->status_perpanjangan == 0)
                                                <p class="card-text">Selama Perusahaan Menjalankan Usaha</p>
                                            @else
                                                <p class="card-text">
                                                    {{ Carbon::make($pa->tanggal_berakhir)->format('d/m/Y') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <h6 class="card-title"><i class="fa-regular fa-clock"></i></i> Masa
                                                Berlaku
                                            </h6>
                                        </div>
                                        <div class="col">
                                            @if ($pa->status_perpanjangan == 0)
                                                <p class="card-text">Selama Perusahaan Menjalankan Usaha</p>
                                            @else
                                                <p class="card-text">{{ $pa->masa_berlaku }}</p>
                                            @endif
                                            alokasi
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <h6 class="card-title"><i class="fa-regular fa-note-sticky"></i> Catatan
                                                Khusus</h6>
                                        </div>
                                        <div class="col">
                                            @if ($pa->catatan == 0)
                                                <p>-</p>
                                            @else
                                                <p>{{ $pa->catatan }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <h6 class="card-title"><i class="fa-solid fa-sack-dollar"></i></i> Estimasi
                                                Biaya
                                            </h6>
                                        </div>
                                        <div class="col">
                                            <p>{{ $pa->alokasi_biaya }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{-- tabel file arsip --}}
                        <div class="col-md-6 justify-content-center align-items-center">
                            <div class="card w-100 d-flex p-3" style="border:#0288F6 solid 1px;">
                                <div class="mb-1 d-flex justify-content-between align-items-center">
                                    <h5>Dokumen yang dibutuhkan </h5>
                                    {{-- <a href="{{ route('admin.perpanjangan.add', ['id' => $perijinan->id]) }}"
                                        class="btn btn rounded-pill text-white" style="background-color: #873FFD;"><i
                                            class="fa-solid fa-plus"></i> Tambah</a> --}}
                                    <button data-bs-toggle="modal" data-bs-target="#pdfmodal{{ $pa->id }}"
                                        class="btn btn rounded-pill text-white" style="background-color: #873FFD;"><i
                                            class="fa-solid fa-plus"></i> Tambah</button>
                                </div>
                                <hr class="p-0 my-1">
                                <table id="example" class="table">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($perpanjangan_aktif as $perpanjangan)
                                            @foreach ($dok_aktif[$perpanjangan->id] as $dokumen) --}}
                                        @php $i = 1; @endphp
                                        @foreach ($dok_aktif as $da)
                                            @foreach ($da as $dokumen)
                                                <tr>
                                                    <td>{{ $i }}</td> @php $i++ @endphp
                                                    <td><a target="_blank"
                                                            class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-body-emphasis"
                                                            href="{{ route('admin.pdf.view', ['id' => $dokumen->id]) }}">{{ $dokumen->doc }}</a>
                                                    </td>
                                                    <td>
                                                        <div class="gap-1">
                                                            <button class="btn btn-danger rounded-circle"
                                                                data-bs-toggle="modal" data-bs-target="#pdfDelete">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                            {{-- <a href="{{ route('admin.perpanjangan.edit', ['id' => $pa->id_perizinan, 'id_perpanjangan' => $pa->id]) }}"
                                                        class="btn btn-warning rounded-circle">
                                                        <i class="fa-solid fa-marker"></i>
                                                    </a> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    {{-- <div class="col-md-2 d-flex align-items-start justify-content-end">
                        <a href="" class="btn btn-primary">Perpanjangan</a>
                    </div> --}}
                </div>
            </div>
        </div>


        {{-- Riwayat Perpanjangan --}}
        <div class="card mb-3 shadow mt-5  @if ($perpanjangan->isEmpty()) d-none @endif"
            style="border-radius:4px;padding:15px;background-color:#342073;">
            <div class="d-flex align-items-center justify-content-center text-white">
                {{-- <i class="fas fa-search text-white"></i> --}}
                <h5>Riwayat Perpanjangan</h5>
            </div>
        </div>
        {{-- @else --}}
        @php
            $i = 1;
        @endphp
        @foreach ($perpanjangan as $pr)
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne{{ $pr->id }}" aria-expanded="false"
                            aria-controls="collapseOne{{ $pr->id }}">
                            Perpanjangan {{ Carbon::make($pr->tanggal_berakhir)->format('d/m/Y') }}
                        </button>
                    </h2>
                    <div id="collapseOne{{ $pr->id }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body p-5">
                            <div class="row-md-12 d-flex align-items-center">
                                <div class="col-md-6 align-items-center">
                                    {{-- <div class="d-flex align-items-center mb-3 gap-1">
                                        <button class="btn btn-success rounded-pill" data-bs-toggle="modal"
                                            data-bs-target="#aktifModal{{ $pr->id }}">
                                            <i class="fa-regular fa-circle-check"></i> Aktifkan
                                        </button>
                                        <button class="btn btn-danger rounded-circle" data-bs-toggle="modal"
                                            data-bs-target="#">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div> --}}
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <h6 class="card-title"><i class="fa-solid fa-file-contract"></i> Jenis
                                                Perpanjangan
                                            </h6>
                                        </div>
                                        <div class="col">
                                            @if ($pr->status_perpanjangan == 0)
                                                <span class="rounded-pill badge  text-bg-success">Non-Periodik</span>
                                            @else
                                                <span class=" rounded-pill badge text-bg-warning">Periodik</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <h6 class="card-title"><i class="fa-solid fa-calendar-check"></i> Tanggal
                                                Registrasi
                                            </h6>
                                        </div>
                                        <div class="col">
                                            <p class="card-text">
                                                {{ Carbon::make($pr->tanggal_registrasi)->format('d/m/Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <h6 class="card-title"><i class="fa-solid fa-calendar-xmark"></i> Tanggal
                                                Berakhir
                                            </h6>
                                        </div>
                                        <div class="col">
                                            @if ($pr->status_perpanjangan == 0)
                                                <p class="card-text">Selama Perusahaan Menjalankan Usaha</p>
                                            @else
                                                <p class="card-text">
                                                    {{ Carbon::make($pr->tanggal_berakhir)->format('d/m/Y') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <h6 class="card-title"><i class="fa-regular fa-clock"></i></i> Masa
                                                Berlaku
                                            </h6>
                                        </div>
                                        <div class="col">
                                            @if ($pr->status_perpanjangan == 0)
                                                <p class="card-text">Selama Perusahaan Menjalankan Usaha</p>
                                            @else
                                                <p class="card-text">{{ $pr->masa_berlaku }}</p>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <h6 class="card-title"><i class="fa-regular fa-note-sticky"></i> Catatan
                                                Khusus</h6>
                                        </div>
                                        <div class="col">
                                            @if ($pr->catatan == 0)
                                                <p>-</p>
                                            @else
                                                <p>{{ $pr->catatan }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <h6 class="card-title"><i class="fa-solid fa-sack-dollar"></i></i> Alokasi
                                                Biaya
                                            </h6>
                                        </div>
                                        <div class="col">
                                            <p>{{ $pr->alokasi_biaya }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 justify-content-center align-items-center">
                                    <div class="card w-100 d-flex p-3" style="border:#0288F6 solid 1px;">
                                        <div class="mb-1 d-flex justify-content-between align-items-center">
                                            <h5>Dokumen </h5>
                                            {{-- <a href="{{ route('admin.perpanjangan.add', ['id' => $perijinan->id]) }}"
                                                class="btn btn rounded-pill text-white" style="background-color: #873FFD;"><i
                                                    class="fa-solid fa-plus"></i> Tambah</a> --}}
                                            {{-- <button data-bs-toggle="modal" data-bs-target="#pdfmodal{{ $pa->id }}"
                                                class="btn btn rounded-pill text-white" style="background-color: #873FFD;"><i
                                                    class="fa-solid fa-plus"></i> Tambah</button> --}}
                                        </div>
                                        <hr class="p-0 my-1">
                                        <table id="riwayat" class="table table_1" width="100%">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nama</th>
                                                    {{-- <th scope="col">Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- @foreach ($perpanjangan_aktif as $perpanjangan)
                                                    @foreach ($dok_aktif[$perpanjangan->id] as $dokumen) --}}
                                                @php $i = 1; @endphp
                                                @foreach ($dok_noaktif as $da)
                                                    @foreach ($da as $dokumen)
                                                        <tr>
                                                            <td>{{ $i }}</td> @php $i++ @endphp
                                                            <td><a target="_blank"
                                                                    class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-body-emphasis"
                                                                    href="{{ route('admin.pdf.view', ['id' => $dokumen->id]) }}">{{ $dokumen->doc }}</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php $i++ @endphp
                </div>
            </div>
        @endforeach

    </section>



    {{-- Modal Konfirmasi Delete --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <h4 class="modal-title" id="confirmDeleteLabel"><strong>Hapus Perizinan</strong></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> --}}
                <div class="modal-body">
                    <div class="row d-flex justify-content-center align-items-center p-0 m-0">
                        <lottie-player src="https://assets.lottiefiles.com/packages/lf20_Tkwjw8.json"
                            background="transparent" speed="1" style="width: 300px;padding:0;margin:0;" loop
                            autoplay></lottie-player>
                        <p class="text-center"> Apakah anda yakin akan menghapus Perijinan ini?<br>
                            <strong>Semua data mengenai perizinan ini akan hilang.</strong>
                        </p>
                        <div class="d-flex gap-2 my-3 align-items-center justify-content-center">
                            <button type="button" class="btn btn-lg btn-secondary"
                                data-bs-dismiss="modal">Tidak</button>
                            <a href="{{ route('admin.perijinan.delete.do', ['id' => $perijinan->id]) }}"
                                class="btn btn-lg btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <a href="{{ route('admin.perijinan.delete.do', ['id' => $perijinan->id]) }}"
                        class="btn btn-danger">Hapus</a>
                </div> --}}
            </div>
        </div>
    </div>

    {{-- modal konfirmasi Delete PDF --}}
    @foreach ($dok_aktif as $da)
        @foreach ($da as $dokumen)
            <div class="modal fade" id="pdfDelete" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="row d-flex justify-content-center align-items-center p-0 m-0">
                                <lottie-player class="my-1"
                                    src="https://assets2.lottiefiles.com/private_files/lf30_ilvzxix1.json"
                                    background="transparent" speed="1" style="width: 300px;padding:0;margin:0;" loop
                                    autoplay></lottie-player>
                                <p class="text-center"> Apakah anda yakin akan menghapus PDF Perpanjangan ini?<br>
                                    <strong>File PDF akan hilang dan tidak bisa dikembalikan.</strong>
                                </p>
                                <div class="d-flex gap-2 my-3 align-items-center justify-content-center">
                                    <button type="button" class="btn btn-lg btn-secondary"
                                        data-bs-dismiss="modal">Tidak</button>
                                    <a href="{{ route('admin.pdf.delete.do', ['id' => $perijinan->id, 'id_doc' => $dokumen->id]) }}"
                                        class="btn btn-lg btn-danger">Hapus</a>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <a href="{{ route('admin.perijinan.delete.do', ['id' => $perijinan->id]) }}"
                        class="btn btn-danger">Hapus</a>
                </div> --}}
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach


    {{-- Modal non-aktif --}}
    @foreach ($perpanjangan_aktif as $pa)
        <div class="modal fade" id="nonaktifModal{{ $pa->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="confirmDeleteLabel"><strong>Non-Aktifkan Perpanjangan</strong></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin akan menonaktifkan perpanjangan ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <a href="{{ route('admin.perpanjangan.nonaktif.do', ['id' => $pa->id_perizinan, 'id_perpanjangan' => $pa->id]) }}"
                            class="btn btn-danger "> Non-Aktif</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Modal Aktif --}}
    @foreach ($perpanjangan as $pr)
        <div class="modal fade" id="aktifModal{{ $pr->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="confirmDeleteLabel"><strong>Aktifkan Perpanjangan</strong></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin akan mengaktifkan perpanjangan ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                        <a href="{{ route('admin.perpanjangan.aktif.do', ['id' => $pr->id_perizinan, 'id_perpanjangan' => $pr->id]) }}"
                            class="btn btn-success"> Aktif</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- modal tambah pdf --}}
    @foreach ($perpanjangan_aktif as $pa)
        <div class="modal fade" id="pdfmodal{{ $pa->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h6 class="modal-title"><strong>Tambah Dokumen</strong></h6>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form
                        action="{{ route('admin.pdf.add.do', ['id' => $pa->id_perizinan, 'id_perpanjangan' => $pa->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama_file" class="form-label"><strong>Nama File</strong><span
                                        class="text-danger">*</span></label>
                                <input autocomplete="off" type="text"
                                    class="form-control @error('nama_file') is-invalid @enderror" id="nama_file"
                                    name="nama_file" value="{{ old('nama_file') }}">
                                @error('nama_file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="file_pdf" class="form-label"><strong>Pilih file PDF</strong><span
                                        class="text-danger">*</span></label>
                                <input class="form-control @error('file_pdf') is-invalid @enderror" type="file"
                                    id="file_pdf" name="file_pdf" value="{{ old('file_pdf') }}">
                                <small class="fst-italic">*Maks. 10Mb</small>
                                @error('file_pdf')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            {{-- <a href="{{ route('admin.perpanjangan.nonaktif.do', ['id' => $pa->id_perizinan, 'id_perpanjangan' => $pa->id]) }}"
                                class="btn btn-danger "> Tambah</a> --}}
                            <button type="submit" class="btn text-white"
                                style="background-color: #873FFD">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


@endsection

@section('alert')
    {{-- modal add PDF --}}
    @if ($errors->any())
        <script>
            $(document).ready(function() {
                $('#pdfmodal{{ $pa->id }}').modal('show');
            });
        </script>
    @endif
@endsection
