@extends('index')
@section('content')
    <div class=" d-flex align-items-center justify-content-center" style="height:200px;background-color:#0288F6;">
        <div class="text-white text-center">
            <h2 class="text-center">{{ $akta->nama_akta }}</h2>
        </div>
    </div>

    <section style="margin:-80px 30px 50px 30px;">

        <div class="row d-flex justify-content-center align-items-start">

            <div class="col-md-5">
                <div class="card mb-4 shadow mt-5" style="border-radius: 5px;border:none;">
                    <div class="d-flex align-items-center justify-content-between text-white"
                        style="margin:0;border-radius:5px;padding:15px;background-color:#342073;">
                        <div class="d-flex align-items-center ">
                            <i class="fas fa-search text-white"></i>
                            <h5 style="margin-left: 10px;">Detail Akta</h5>
                        </div>
                    </div>
                    <div class="card" style="margin:10px 30px 10px 30px; background-color: transparent;border: none;">
                        <div class="row g-0 py-4 px-3">
                            <div class="d-flex gap-1 mb-4 align-items-center">
                                <button class="btn btn-danger rounded-circle" data-bs-toggle="modal"
                                    data-bs-target="#delakta{{ $akta->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                                <a href="{{ route('admin.akta.edit', ['id' => $akta->id]) }}"
                                    class="btn btn-warning rounded-circle">
                                    <i class="fa-solid fa-marker"></i>
                                </a>
                                <a href="{{ route('admin.akta') }}" class="btn btn-secondary rounded-circle">
                                    <i class="fa-solid fa-arrow-left"></i>
                                </a>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <h6 class="card-title"><i class="fa-solid fa-file-contract"></i> Nama Akta</h6>
                                </div>
                                <div class="col">
                                    <p class="card-text">{{ $akta->nama_akta }}</p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <h6 class="card-title"><i class="fa-solid fa-hashtag"></i> Nomor Akta
                                    </h6>
                                </div>
                                <div class="col">
                                    <p class="card-text">{{ $akta->nomor_akta }}</p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <h6 class="card-title"><i class="fa-regular fa-calendar"></i> Tahun</h6>
                                </div>
                                <div class="col">
                                    <p class="card-text">{{ $akta->tahun }}</p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <h6 class="card-title"><i class="fa-solid fa-scale-balanced"></i> Nama Notaris
                                    </h6>
                                </div>
                                <div class="col">
                                    <p class="card-text">{{ $akta->nama_notaris }}</p>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <h6 class="card-title"><i class="fa-regular fa-file-pdf"></i> Dokumen Akta
                                    </h6>
                                </div>
                                <div class="col">
                                    <a target="_blank"
                                        class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-body-emphasis"
                                        href="{{ route('admin.pdf.view.akta', ['id' => $akta->id]) }}">Lihat
                                        Dokumen <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                    <br>
                                    <button type="button" class="btn btn-primary rounded-circle btn-sm mt-1"
                                        data-bs-toggle="modal" data-bs-target="#docakta{{ $akta->id }}">
                                        <i class="fa-solid fa-key"></i>
                                    </button>
                                    <button type="button" class="btn btn-success rounded-circle btn-sm mt-1"
                                        data-bs-toggle="modal" data-bs-target="#newToken{{ $akta->id }}">
                                        <i class="fa-solid fa-rotate"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card mb-4 shadow mt-5" style="border-radius: 5px;border:none;">
                    <div class="d-flex align-items-center justify-content-between text-white"
                        style="margin:0;border-radius:5px;padding:15px;background-color:#342073;">
                        <div class="d-flex align-items-center ">
                            <i class="fas fa-search text-white"></i>
                            <h5 style="margin-left: 10px;">Keterangan Akta</h5>
                        </div>
                    </div>
                    <div class="card" style="margin:10px 30px 10px 30px; background-color: transparent;border: none;">
                        <div class="row g-0 py-4 px-5">
                            {!! trim($akta->keterangan, '{}') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Modal Token akta --}}
    <div class="modal fade" id="docakta{{ $akta->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"><strong>Token</strong>
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center align-items-center p-0 m-0">
                        <h4 class="text-center my-3">
                            <strong>Token Akses User</strong>
                        </h4>
                        <p class="text-center">Berikut adalah token untuk mengakses dokumen akta :<br>
                        </p>
                        <h5 class="text-center"><strong>{{ $akta->token }}</strong></h5>
                        <div class="d-flex gap-2 my-3 align-items-center justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- modal generate token akta --}}
    <div class="modal fade" id="newToken{{ $akta->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row d-flex justify-content-center align-items-center p-0 m-0">
                        <h4 class="text-center mt-3">
                            <strong>Memperbaharui Token</strong>
                        </h4>
                        <lottie-player class="my-1" src="https://assets8.lottiefiles.com/packages/lf20_j0qjOHEesX.json"
                            background="transparent" speed="1" style="width: 300px;padding:0;margin:0;" loop
                            autoplay></lottie-player>
                        <p class="text-center"> Apakah anda yakin akan memperbaharui Token?<br>
                            <strong>Token akan berubah setelah melakukan pembaharuan, harap informasikan ulang
                                kepada user.</strong>
                        </p>
                        <div class="d-flex gap-2 my-3 align-items-center justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                            <a href="{{ route('admin.generate.token.akta', ['id' => $akta->id]) }}"
                                class="btn btn-success"> Lanjutkan</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    {{-- Modal Konfirmasi Delete Akta --}}
    <div class="modal fade" id="delakta{{$akta->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row d-flex justify-content-center align-items-center p-0 m-0">
                        <h4 class="text-center mt-3">
                            <strong>Hapus Akta</strong>
                        </h4>
                        <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_khh1znj5.json"
                            background="transparent" speed="1" style="width: 300px;padding:0;margin:0;" loop
                            autoplay></lottie-player>
                        <p class="text-center"> Apakah anda yakin akan menghapus Akta ini?<br>
                            <strong>Semua data mengenai akta ini akan hilang.</strong>
                        </p>
                        <div class="d-flex gap-2 my-3 align-items-center justify-content-center">
                            <button type="button" class="btn btn-lg btn-secondary"
                                data-bs-dismiss="modal">Tidak</button>
                            <a href="{{ route('admin.akta.delete.do', ['id' => $akta->id]) }}"
                                class="btn btn-lg btn-danger">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
