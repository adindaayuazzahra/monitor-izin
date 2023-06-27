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
                            <div class="d-flex gap-1 mb-3 align-items-center">
                                <a href="{{ route('akta') }}" class="btn btn-secondary rounded-pill">
                                    <i class="fa-solid fa-arrow-left"></i> Kembali
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
                                    <button type="button"
                                        class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover link-body-emphasis"
                                        data-bs-toggle="modal" data-bs-target="#inputToken{{ $akta->id }}">
                                        Lihat
                                        Dokumen <i class="fa-solid fa-arrow-up-right-from-square"></i></button>
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



    {{-- modal input token Download Doc Akta --}}
    <div class="modal fade" id="inputToken{{ $akta->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title"><strong>Unduh Dokumen</strong>
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row d-flex justify-content-center align-items-center p-0 m-0">
                        <h4 class="text-center my-3">
                            <strong>Token Akses User</strong>
                        </h4>
                        <p class="text-center">Masukkan Token yang diberikan oleh admin :</p><br>
                        <form action="{{ route('pdf.akta', ['id' => $akta->id]) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="mb-1">
                                    <input autocomplete="off" type="text"
                                        class="form-control-lg form-control @error('token') is-invalid @enderror"
                                        id="token" name="token">
                                    @error('token')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex gap-2 my-3 align-items-center justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn text-white kirim"
                                    style="background-color: #873FFD">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
