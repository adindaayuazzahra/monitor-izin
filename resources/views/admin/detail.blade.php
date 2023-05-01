@extends('index')
@section('content')
    <div class=" d-flex align-items-center justify-content-center" style="height:200px;background-color:#0288F6;">
        {{-- <div class="overlay" style="opacity: 0.5"></div> --}}
        <div class="text-white text-center">
            <h2 class="text-center">{{ $perijinan->nama_perizinan }}</h2>
            {{-- <p style="font-size:16pt;">Pada halaman ini anda dapat menambahkan, menyunting dan menghapus perijinan.</p>
        --}}
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
            <div class="card" style="margin:30px 40px 40px 40px; background-color: transparent;border: none;">
                <div class="row g-0">
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
                        <div class="col-md-3 d-flex justify-content-center align-items-center">
                            <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_i1mvXDRPV0.json"
                                background="transparent" speed="1" style="width: 300px;" loop autoplay></lottie-player>
                        </div>
                        @foreach ($perpanjangan_aktif as $pa)
                            {{-- @dd($pa) --}}
                            <div class="col-md-4 d-flex align-items-center">
                                <div class="card-body">
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
                                        <button class="btn btn-danger rounded-circle" data-bs-toggle="modal"
                                            data-bs-target="#">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <a href="{{ route('admin.perpanjangan.edit', ['id' => $pa->id_perizinan, 'id_perpanjangan' => $pa->id]) }}"
                                            class="btn btn-warning rounded-circle">
                                            <i class="fa-solid fa-marker"></i>
                                        </a>
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
                                                <span class="rounded-pill badge  text-bg-success">Lifetime</span>
                                            @else
                                                <span class=" rounded-pill badge text-bg-warning">Lisensi</span>
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
                                                Berkahir
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

                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-5">
                                            <h6 class="card-title"><i class="fa-regular fa-note-sticky"></i> Catatan</h6>
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
                                            <h6 class="card-title"><i class="fa-solid fa-sack-dollar"></i></i> Alokasi
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

                        <div class="col-md-5  justify-content-center align-items-center">
                            <div class="card w-100 d-flex p-3" style="border:#0288F6 solid 1px;">
                                <div class="mb-1 d-flex justify-content-between align-items-center">
                                    <h5>Dokumen </h5>
                                    <a href="{{ route('admin.perpanjangan.add', ['id' => $perijinan->id]) }}"
                                        class="btn btn rounded-pill text-white" style="background-color: #873FFD;"><i
                                            class="fa-solid fa-plus"></i> Tambah</a>
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
                                        <tr>
                                            <td>1</td>
                                            <td>Ini nama dokumen</td>
                                            <td>
                                                <div class="gap-1">
                                                    <button class="btn btn-danger rounded-circle" data-bs-toggle="modal"
                                                        data-bs-target="#">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                    {{-- <a href="{{ route('admin.perpanjangan.edit', ['id' => $pa->id_perizinan, 'id_perpanjangan' => $pa->id]) }}"
                                                        class="btn btn-warning rounded-circle">
                                                        <i class="fa-solid fa-marker"></i>
                                                    </a> --}}
                                                </div>
                                            </td>
                                        </tr>

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
                            Perpanjangan Ke - {{ $i }}
                        </button>

                    </h2>
                    <div id="collapseOne{{ $pr->id }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body p-5">
                            <div class="row mb-2">
                                <div class="col-md-2">
                                    <h6 class="card-title"><i class="fa-solid fa-file-contract"></i> Jenis
                                        Perpanjangan
                                    </h6>
                                </div>
                                <div class="col">
                                    @if ($pr->status_perpanjangan == 0)
                                        <span class="rounded-pill badge  text-bg-success">Lifetime</span>
                                    @else
                                        <span class=" rounded-pill badge text-bg-warning">Lisensi</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-2">
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
                                <div class="col-md-2">
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
                                <div class="col-md-2">
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
                                <div class="col-md-2">
                                    <h6 class="card-title"><i class="fa-regular fa-note-sticky"></i> Catatan</h6>
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
                                <div class="col-md-2">
                                    <h6 class="card-title"><i class="fa-solid fa-sack-dollar"></i></i> Alokasi Biaya
                                    </h6>
                                </div>
                                <div class="col">
                                    <p>{{ $pr->alokasi_biaya }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @php $i++ @endphp
                </div>
            </div>
        @endforeach
        {{-- @endif --}}

    </section>



    <!-- Modal Konfirmasi Delete -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="confirmDeleteLabel"><strong>Hapus Perizinan</strong></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin akan menghapus Perijinan ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <a href="{{ route('admin.perijinan.delete.do', ['id' => $perijinan->id]) }}"
                        class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
@endsection
