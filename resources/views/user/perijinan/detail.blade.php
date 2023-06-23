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
            </div>
            <div class="card" style="margin:30px 30px 30px 30px; background-color: transparent;border: none;">
                <div class="row g-0">
                    <div class="col-md-4 d-flex py-3 justify-content-center align-items-center">
                        <lottie-player src="https://assets8.lottiefiles.com/private_files/lf30_rsT9V2.json"
                            background="transparent" speed="1" style="width: 350px;" loop autoplay></lottie-player>
                    </div>
                    <div class="col-md-8 d-flex align-items-center">
                        <div class="card-body">
                            <div class="d-flex gap-1 mb-3 align-items-center">
                                <a href="{{ route('home') }}" class="btn btn-secondary rounded-pill">
                                    <i class="fa-solid fa-arrow-left"></i> Kembali
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
                            @foreach ($perpanjangan_aktif as $pa)
                                @if ($pa->tanggal_registrasi)
                                    <div class="row mb-2">
                                        <div class="col-md-3">
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
                                @endif
                                @if ($pa->tanggal_berakhir)
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <h6 class="card-title"><i class="fa-solid fa-calendar-xmark"></i> Tanggal
                                                Berakhir
                                            </h6>
                                        </div>
                                        <div class="col">
                                            @if ($pa->status_perpanjangan == 0)
                                                <p class="card-text">Selama Perusahaan Menjalankan Usaha</p>
                                            @elseif($pa->status_perpanjangan == 1)
                                                <p class="card-text">
                                                    {{ Carbon::make($pa->tanggal_berakhir)->format('d/m/Y') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                @if ($pa->masa_berlaku == '-')
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <h6 class="card-title"><i class="fa-regular fa-clock"></i></i> Masa
                                                Berlaku
                                            </h6>
                                        </div>
                                        <div class="col">
                                            <p class="card-text">Selama Perusahaan Menjalankan Usaha</p>
                                        </div>
                                    </div>
                                @elseif($pa->masa_berlaku != 'n')
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <h6 class="card-title"><i class="fa-regular fa-clock"></i></i> Masa
                                                Berlaku
                                            </h6>
                                        </div>
                                        <div class="col">
                                            <p class="card-text">{{ $pa->masa_berlaku }}</p>
                                        </div>
                                    </div>
                                @endif
                                @if ($pa->confirm == 1)
                                    @foreach ($dok_aktif_result as $ds)
                                        @foreach ($ds as $dokumen)
                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <h6 class="card-title"><i class="fa-regular fa-file-pdf"></i> Surat
                                                        Perijinan
                                                    </h6>
                                                </div>
                                                <div class="col-md-5">
                                                    {{-- <a 
                                                        class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-body-emphasis"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#doceditresult{{ $pa->id }}" >Lihat Dokumen <i class="fa-solid fa-arrow-up-right-from-square"></i></a> --}}
                                                    {{-- <a target="_blank"
                                                        class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-body-emphasis"
                                                        href="{{ route('pdf.view', ['id' => $dokumen->id]) }}">Lihat
                                                        Dokumen <i class="fa-solid fa-arrow-up-right-from-square"></i></a> --}}
                                                    <button type="button"
                                                        class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-body-emphasis"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#inputToken{{ $dokumen->id }}">
                                                        Lihat
                                                        Dokumen <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                @else
                                    @foreach ($dok_aktif_result as $ds)
                                        @foreach ($ds as $dokumen)
                                            <div class="row mb-2">
                                                <div class="col-md-3">
                                                    <h6 class="card-title"><i class="fa-regular fa-file-pdf"></i> Surat
                                                        Ket.Proses
                                                    </h6>
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="button"
                                                        class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-body-emphasis"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#inputToken{{ $dokumen->id }}">
                                                        Lihat
                                                        Dokumen <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                        {{-- <a target="_blank"
                                                        class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-body-emphasis"
                                                        href="{{ route('pdf.view', ['id' => $dokumen->id]) }}">Lihat
                                                        Dokumen <i class="fa-solid fa-arrow-up-right-from-square"></i></a> --}}
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                @endif
                            @endforeach
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <h6 class="card-title"><i class="fa-solid fa-circle-info"></i> Status</h6>
                                </div>
                                <div class="col">
                                    @if ($perijinan->status == 0)
                                        <span class="rounded-pill badge text-bg-success">Aktif</span>
                                    @elseif($perijinan->status == 1)
                                        <span class=" rounded-pill badge text-bg-danger">Non-Aktif</span>
                                    @else
                                        <span class=" rounded-pill badge text-bg-primary">Sedang Proses</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{-- perpanjangan aktif dan riwayatnya --}}
        <div class="row d-flex justify-content-center align-items-start">

            {{-- perpanjangan aktif --}}
            <div class="col-md-5">
                <div class="card mb-4 shadow mt-5" style="border-radius: 5px;border:none;">
                    <div class="d-flex align-items-center justify-content-between text-white"
                        style="margin:0;border-radius:5px;padding:15px;background-color:#342073;">
                        <div class="d-flex align-items-center ">
                            <i class="fas fa-search text-white"></i>
                            <h5 style="margin-left: 10px;">Perpanjangan Aktif</h5>
                        </div>
                    </div>
                    <div class="card" style="margin:10px 30px 10px 30px; background-color: transparent;border: none;">
                        <div class="row g-0 d-flex align-items-center">
                            @if ($perpanjangan_aktif->isEmpty())
                                <div class="col p-0">
                                    <div class="row-sm-12 row-md-6 d-flex justify-content-center align-items-center">
                                        <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_mxuufmel.json"
                                            background="transparent" speed="1" style="width: 300px;" loop autoplay>
                                        </lottie-player>
                                    </div>
                                    <div class="row-sm-12 row-md-6 d-flex mb-4 justify-content-center align-items-center">
                                        <h2 class="text-center" style="">Ops.. Admin belum membuat perpanjangan.
                                        </h2>
                                    </div>
                                </div>
                            @else
                                @foreach ($perpanjangan_aktif as $pa)
                                    {{-- <div class="col-md-12"> --}}
                                    <div class="card-body">
                                        {{-- <div class="d-flex gap-1 mb-3 align-items-center"> --}}
                                        {{-- @if ($pa->confirm == 0)
                                                    <button class="btn btn-success rounded-pill" data-bs-toggle="modal"
                                                        data-bs-target="#confirmModal{{ $pa->id }}">
                                                        <i class="fa-regular fa-circle-check"></i> Konfirmasi Selesai
                                                    </button>
                                                @endif
                                                @if ($perpanjangan_stat->status_perpanjangan == 0)
                                                    @if ($perijinan->status == 0)
                                                        <div class="d-flex align-items-center mb-2">
                                                            <button class="btn btn-dark rounded-pill" data-bs-toggle="modal"
                                                                data-bs-target="#nonaktifModal{{ $pa->id }}">
                                                                <i class="fa-solid fa-ban"></i> Non-Aktifkan
                                                            </button>
                                                        </div>
                                                    @elseif ($perijinan->status == 1)
                                                        <div class="d-flex align-items-center mb-2">
                                                            <button class="btn btn-success rounded-pill" data-bs-toggle="modal"
                                                                data-bs-target="#aktifModal{{ $pa->id }}">
                                                                <i class="fa-regular fa-circle-check"></i> Aktifkan
                                                            </button>
                                                        </div>
                                                    @endif
                                                @endif --}}
                                        {{-- @if ($perpanjangan_stat->tanggal_berakhir != null)
                                                    <a href="{{ route('admin.perpanjangan.add', ['id' => $perijinan->id]) }}"
                                                        class="btn btn rounded-pill text-white  @if ($perpanjangan_stat->status_perpanjangan == 0 || $perpanjangan_stat->confirm == 0) d-none @endif"
                                                        style="background-color: #873FFD;"><i class="fa-solid fa-plus"></i>
                                                        Perpanjangan</a>
                                                @endif --}}

                                        {{-- <a href="{{ route('admin.perpanjangan.edit', ['id' => $pa->id_perizinan, 'id_perpanjangan' => $pa->id]) }}"
                                                    class="btn btn-warning rounded-circle @if ($perpanjangan_stat->confirm == 1) d-none @endif">
                                                    <i class="fa-solid fa-marker"></i>
                                                </a> --}}
                                        {{-- </div> --}}
                                        <div class="row d-flex align-items-center mb-4">
                                            @if ($pa->confirm == 1)
                                                <p style="font-size: 14pt;"><i
                                                        class="fa-solid fa-circle-check text-success"></i><small> Proses
                                                        Mengurus Perpanjangan
                                                        Sudah Selesai</small>
                                                </p>
                                            @else
                                                <p style="font-size: 14pt;"><i
                                                        class="fa-solid fa-triangle-exclamation text-warning"></i>
                                                    <small> Perpanjangan masih dalam proses</small>
                                                </p>
                                            @endif
                                        </div>
                                        <div class="row mb-2 mt-5">
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
                                                <h6 class="card-title"><i class="fa-regular fa-clock"></i> Perkiraan
                                                    Proses
                                                </h6>
                                            </div>
                                            <div class="col">
                                                <p class="card-text">{{ $pa->perkiraan_proses }} Hari</p>
                                            </div>
                                        </div>
                                        {{-- @if ($pa->tanggal_registrasi)
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
                                        @endif
                                        @if ($pa->tanggal_berakhir)
                                            <div class="row mb-2">
                                                <div class="col-md-5">
                                                    <h6 class="card-title"><i class="fa-solid fa-calendar-xmark"></i> Tanggal
                                                        Berakhir
                                                    </h6>
                                                </div>
                                                <div class="col">
                                                    @if ($pa->status_perpanjangan == 0)
                                                        <p class="card-text">Selama Perusahaan Menjalankan Usaha</p>
                                                    @elseif($pa->status_perpanjangan == 1)
                                                        <p class="card-text">
                                                            {{ Carbon::make($pa->tanggal_berakhir)->format('d/m/Y') }}
                                                        </p>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                        @if ($pa->masa_berlaku == '-')
                                            <div class="row mb-2">
                                                <div class="col-md-5">
                                                    <h6 class="card-title"><i class="fa-regular fa-clock"></i></i> Masa
                                                        Berlaku
                                                    </h6>
                                                </div>
                                                <div class="col">
                                                    <p class="card-text">Selama Perusahaan Menjalankan Usaha</p>
                                                </div>
                                            </div>
                                        @elseif($pa->masa_berlaku != 'n')
                                            <div class="row mb-2">
                                                <div class="col-md-5">
                                                    <h6 class="card-title"><i class="fa-regular fa-clock"></i></i> Masa
                                                        Berlaku
                                                    </h6>
                                                </div>
                                                <div class="col">
                                                    <p class="card-text">{{ $pa->masa_berlaku }}</p>
                                                </div>
                                            </div>
                                        @endif --}}
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
                                                <h6 class="card-title"><i class="fa-solid fa-sack-dollar"></i></i>
                                                    Estimasi
                                                    Biaya
                                                </h6>
                                            </div>
                                            <div class="col">
                                                <p>{{ $pa->alokasi_biaya }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- </div> --}}
                                @endforeach

                                {{-- tabel file arsip --}}
                                {{-- <div class="col-md-6"> --}}
                                {{-- <lottie-player src="https://assets8.lottiefiles.com/private_files/lf30_gwiwd1mq.json" background="transparent" speed="1" style="width: 300px;" loop autoplay>
                                    </lottie-player> --}}
                                {{-- <div class="card w-100 d-flex p-3" style="border:#0288F6 solid 1px;">
                                        <div class="mb-1 d-flex justify-content-between align-items-center">
                                            <h5>Dokumen yang dibutuhkan </h5>
                                        </div>
                                        <hr class="p-0 my-1">
                                        <table id="example" class="example table">
                                            <thead class="table-primary">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i = 1; @endphp
                                                @foreach ($dok_aktif as $da)
                                                    @foreach ($da as $dokumen)
                                                        <tr>
                                                            <td>{{ $i }}</td> @php $i++ @endphp
                                                            <td><a target="_blank"
                                                                    class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-body-emphasis"
                                                                    href="{{ route('pdf.view', ['id' => $dokumen->id]) }}">{{ $dokumen->doc }}</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div> --}}
                                {{-- </div> --}}
                            @endif
                            {{-- <div class="col-md-2 d-flex align-items-start justify-content-end">
                            <a href="" class="btn btn-primary">Perpanjangan</a>
                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>


            {{-- Riwayat Perpanjangan --}}
            <div class="col" class="@if ($perpanjangan->isEmpty()) d-none @endif">
                <div class="card mb-2 shadow mt-5" style="border-radius:4px;padding:15px;background-color:#342073;">
                    <div class="d-flex align-items-center justify-content-center text-white">
                        {{-- <i class="fas fa-search text-white"></i> --}}
                        <h5>Riwayat Perpanjangan</h5>
                    </div>
                </div>
                @if ($perpanjangan->isEmpty())
                    <div class="card mb-3 shadow" style="border-radius:4px;padding:15px;">
                        <div class="d-flex align-items-center justify-content-center">
                            {{-- <i class="fas fa-search text-white"></i> --}}
                            <p>Belum ada riwayat perpanjangan</p>
                        </div>
                    </div>
                @endif
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
                                <div class="accordion-body" style="padding: 45px;">
                                    <div class="row">
                                        {{-- <div class="col-md-8"> --}}
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
                                        @if ($pr->tanggal_registrasi)
                                            <div class="row mb-2">
                                                <div class="col-md-5">
                                                    <h6 class="card-title"><i class="fa-solid fa-calendar-check"></i>
                                                        Tanggal
                                                        Registrasi
                                                    </h6>
                                                </div>
                                                <div class="col">
                                                    <p class="card-text">
                                                        {{ Carbon::make($pr->tanggal_registrasi)->format('d/m/Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <h6 class="card-title"><i class="fa-solid fa-calendar-xmark"></i> Tanggal
                                                    Berakhir</h6>
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
                                                <h6 class="card-title"><i class="fa-solid fa-sack-dollar"></i></i>
                                                    Estimasi
                                                    Biaya
                                                </h6>
                                            </div>
                                            <div class="col">
                                                <p>{{ $pr->alokasi_biaya }}</p>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-md-5">
                                                <h6 class="card-title"><i class="fa-regular fa-file-pdf"></i> Surat
                                                    Perijinan
                                                </h6>
                                            </div>
                                            <div class="col">
                                                @foreach ($dok_noaktif_result as $dns)
                                                    @foreach ($dns as $dokumen)
                                                        @if ($dokumen->id_perpanjangan == $pr->id)
                                                            <button type="button"
                                                                class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-body-emphasis"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#inputToken{{ $dokumen->id }}">
                                                                Lihat
                                                                Dokumen <i
                                                                    class="fa-solid fa-arrow-up-right-from-square"></i>
                                                            </button>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>


    {{-- modal input token aktif --}}
    @foreach ($dok_aktif_result as $ds)
        @foreach ($ds as $dokumen)
            <div class="modal fade" id="inputToken{{ $dokumen->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title"><strong>Unduh Dokumen</strong>
                            </h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row d-flex justify-content-center align-items-center p-0 m-0">
                                <h4 class="text-center my-3">
                                    <strong>Token Akses User</strong>
                                </h4>
                                <p class="text-center">Masukkan Token yang diberikan oleh admin :</p><br>
                                <form action="{{ route('pdf.view', ['id' => $dokumen->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="mb-1">
                                            <input autocomplete="off" type="text"
                                                class="form-control-lg form-control @error('token') is-invalid @enderror"
                                                id="token" name="token" value="{{ $pa->token }}">
                                            @error('token')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2 my-3 align-items-center justify-content-center">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn text-white kirim"
                                            style="background-color: #873FFD">Kirim</button>
                                    </div>
                                </form>
                                {{-- <p class="text-center">* Token hanya bisa digunakan untuk satu kali download</p><br>
                                <h5 class="text-center"><strong>{{ $dokumen->token }}</strong></h5> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach

    {{-- modal input token no aktif --}}
    @foreach ($dok_noaktif_result as $dns)
        @foreach ($dns as $dokumen)
            <div class="modal fade" id="inputToken{{ $dokumen->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title"><strong>Unduh Dokumen</strong>
                            </h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row d-flex justify-content-center align-items-center p-0 m-0">
                                <h4 class="text-center my-3">
                                    <strong>Token Akses User</strong>
                                </h4>
                                <p class="text-center">Masukkan Token yang diberikan oleh admin :</p><br>
                                <form action="{{ route('pdf.view', ['id' => $dokumen->id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="modal-body">
                                        <div class="">
                                            <input autocomplete="off" type="text"
                                                class="form-control-lg form-control @error('token') is-invalid @enderror"
                                                id="token" name="token" value="{{ $pa->token }}">
                                            @error('token')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="d-flex gap-2 my-3 align-items-center justify-content-center">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn text-white kirim"
                                                style="background-color: #873FFD">Kirim</button>
                                        </div>
                                    </div>
                                </form>
                                {{-- <p class="text-center">* Token hanya bisa digunakan untuk satu kali download</p><br> --}}
                                {{-- <h5 class="text-center"><strong>{{ $dokumen->token }}</strong></h5> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
@endsection
